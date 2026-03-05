<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessment;
use App\Models\Result;
use App\Models\Question;
use Illuminate\Support\Facades\Mail;
use App\Mail\AssessmentInvitation;
use App\Models\User;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    // ==========================================
    // 1. DASHBOARD & DAFTAR KANDIDAT
    // ==========================================

    public function index()
    {
        // 1. DATA MODUL & KANDIDAT
        $totalModul = \App\Models\Assessment::count();
        $assessments = \App\Models\Assessment::latest()->get();

        $totalKandidat = \App\Models\User::where('role', 'kandidat')->count();
        $recentCandidates = \App\Models\User::where('role', 'kandidat')
                                ->latest()
                                ->take(5)
                                ->get();

        // ==========================================
        // 2. SINKRONISASI DATA HASIL TES (REAL-TIME)
        // ==========================================

        // Menghitung total seluruh tes yang sudah dikerjakan (masuk ke tabel results)
        $tesSelesai = \App\Models\Result::count();

        // Mengambil 5 aktivitas tes terbaru, sekalian menarik data relasi 'user' dan 'assessment'
        $recentResults = \App\Models\Result::with(['user', 'assessment'])
                                ->latest()
                                ->take(5)
                                ->get();

        return view('admin.dashboard', compact(
            'totalModul',
            'assessments',
            'totalKandidat',
            'recentCandidates',
            'tesSelesai',
            'recentResults'
        ));
    }

    public function daftarKandidat()
    {
        $totalModul = \App\Models\Assessment::count();

        // 1. Ambil kandidat beserta hitungan total undangan dan undangan yang berstatus 'Selesai'
        $kandidat = User::where('role', 'kandidat')
                        ->withCount([
                            'invitations as total_undangan',
                            'invitations as undangan_selesai' => function($query) {
                                $query->where('status', 'Selesai');
                            }
                        ])
                        ->latest()
                        ->get();

        // 2. Logika Cerdas: Tentukan status akhir kandidat
        foreach ($kandidat as $user) {
            // Jika belum pernah diundang sama sekali
            if ($user->total_undangan == 0) {
                $user->status_ujian = 'Belum Ada Undangan';
                $user->badge_color  = 'bg-gray-100 text-gray-600 border-gray-200';
            }
            // Jika jumlah undangan yang selesai SAMA DENGAN total undangan
            elseif ($user->total_undangan == $user->undangan_selesai) {
                $user->status_ujian = 'Selesai';
                $user->badge_color  = 'bg-green-100 text-green-700 border-green-200';
            }
            // Jika baru mengerjakan sebagian (atau belum sama sekali tapi sudah diundang)
            else {
                $user->status_ujian = 'Belum Selesai';
                $user->badge_color  = 'bg-yellow-100 text-yellow-700 border-yellow-200';
            }

            // Format teks progress (Contoh output: "2/3 Tes")
            $user->progress_text = $user->undangan_selesai . '/' . $user->total_undangan . ' Tes';
        }

        return view('admin.daftar_kandidat', compact('kandidat', 'totalModul'));
    }

    public function detailKandidat($id)
    {
        $kandidat = \App\Models\User::findOrFail($id);

        // Ambil semua hasil tes dari kandidat ini
        $results = \App\Models\Result::where('user_id', $id)->get();

        // Hitung total pelanggaran (Alt+Tab) dari semua tes yang dikerjakannya
        $totalCheats = $results->sum('cheat_count');

        // Ambil SEMUA modul assessment yang ada di sistem
        $allAssessments = \App\Models\Assessment::withCount('questions')->get();

        // Gabungkan data modul dengan hasil tes kandidat
        $assesmentData = $allAssessments->map(function($assessment) use ($results) {
            $result = $results->where('assessment_id', $assessment->id)->first();

            return (object) [
                'id'              => $assessment->id,
                'module_id'       => $assessment->module_id,
                'title'           => $assessment->title,
                'test_code'       => $assessment->test_code,
                'category'        => $assessment->category,
                'questions_count' => $assessment->questions_count,

                // Data Status & Score
                'status'          => $result ? $result->status : 'Belum Selesai',
                'cheat_count'     => $result ? $result->cheat_count : 0,

                // --- BAGIAN INI YANG KEMARIN HILANG ---
                // Kita kirimkan data JSON log kecurangan ke View
                'cheat_details'   => $result ? $result->cheat_details : null,
                // --------------------------------------
            ];
        });

        return view('admin.detail_kandidat', compact('kandidat', 'assesmentData', 'totalCheats'));
    }

    // ==========================================
    // 2. KELOLA ASSESSMENT (MODUL UJIAN)
    // ==========================================

    // Menyimpan Assessment Baru
    public function storeAssessment(Request $request)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'duration'    => 'required|numeric',
            'category'    => 'required',
            'description' => 'required'
        ]);

        $prefix = 'GEN';
        switch ($request->category) {
            case 'Cognitive':   $prefix = 'COG'; break;
            case 'Personality': $prefix = 'PRS'; break;
            case 'Attitude':    $prefix = 'ATT'; break;
            case 'Interest':    $prefix = 'INT'; break;
        }

        $latestAssessment = Assessment::where('module_id', 'like', "$prefix-%")
                            ->orderBy('id', 'desc')
                            ->first();

        $number = 1;
        if ($latestAssessment) {
            $parts = explode('-', $latestAssessment->module_id);
            $number = intval(end($parts)) + 1;
        }

        $autoModuleId = $prefix . '-' . str_pad($number, 2, '0', STR_PAD_LEFT);
        $randomTestCode = strtoupper(Str::random(6));

        $assessment = Assessment::create([
            'title'       => $request->title,
            'module_id'   => $autoModuleId,
            'test_code'   => $randomTestCode,
            'duration'    => $request->duration,
            'category'    => $request->category,
            'description' => $request->description
        ]);

        return redirect()->route('admin.buat_pertanyaan', ['id' => $assessment->id])
                         ->with('success', 'Modul berhasil dibuat! Silakan tambah pertanyaan.');
    }

    // Menampilkan Halaman Edit Assessment
    public function editAssessment($id)
    {
        $assessment = Assessment::findOrFail($id);

        // Arahkan ke buat_assesment, tapi bawa data $assessment
        return view('admin.buat_assesment', compact('assessment'));
    }

    // Menyimpan Perubahan Edit Assessment
    // Menyimpan Perubahan Edit Assessment
    public function updateAssessment(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title'       => 'required|max:255',
            'duration'    => 'required|numeric',
            'category'    => 'required',
            'description' => 'nullable'
        ]);

        $assessment = Assessment::findOrFail($id);

        // ==========================================
        // LOGIKA BACKEND: CEK PERUBAHAN KATEGORI
        // ==========================================
        $kategoriLama = $assessment->category;
        $kategoriBaru = $request->category;

        // Apakah awalnya Kognitif? (true/false)
        $awalnyaKognitif = ($kategoriLama === 'Cognitive');
        // Apakah yang diinputkan Kognitif? (true/false)
        $sekarangKognitif = ($kategoriBaru === 'Cognitive');

        // Jika status Kognitif-nya berubah (menyeberang dari Skala ke Kognitif atau sebaliknya)
        if ($awalnyaKognitif !== $sekarangKognitif) {
            return redirect()->back()
                ->withInput() // Mengembalikan ketikan admin sebelumnya agar tidak hilang
                ->withErrors(['category' => 'GAGAL: Modul Kognitif (Pilihan Ganda) tidak boleh diubah menyilang ke tipe Skala, begitu pun sebaliknya!']);
        }
        // ==========================================

        // Jika lolos pengecekan, baru di-update
        $assessment->update($validatedData);

        return redirect()->route('admin.dashboard')->with('success', 'Modul berhasil diperbarui!');
    }

    // Menghapus Assessment
    public function destroyAssessment($id)
    {
        $assessment = Assessment::findOrFail($id);
        $assessment->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Modul assessment berhasil dihapus!');
    }

    // ==========================================
    // 3. KELOLA PERTANYAAN (SOAL)
    // ==========================================

    // Menampilkan Halaman Kelola Pertanyaan
    public function buatPertanyaan($id)
    {
        $assessment = Assessment::findOrFail($id);
        $questions = Question::where('assessment_id', $id)->latest()->get();
        return view('admin.buat_pertanyaan', compact('assessment', 'questions'));
    }

    public function storeQuestion(Request $request, $id)
    {
        $type = $request->type;
        $assessment = \App\Models\Assessment::findOrFail($id);

        // Aturan dasar validasi
        $rules = [
            'question_text' => 'required',
            'type'          => 'required',
        ];

        // 1. Jika tes Kognitif, Poin wajib diisi
        if ($assessment->category === 'Cognitive') {
            $rules['points'] = 'required|numeric';

            // Aturan untuk Kognitif (Pilihan Ganda)
            if ($type == 'multiple_choice') {
                $rules['option_a'] = 'required';
                $rules['option_b'] = 'required';
                $rules['option_c'] = 'required';
                $rules['option_d'] = 'required';
                $rules['correct_answer'] = 'required';
            }
        }

        $request->validate($rules);

        // 2. Simpan ke database
        \App\Models\Question::create([
            'assessment_id' => $id,
            'question_text' => $request->question_text,
            'type'          => $request->type,
            // Jika Poin kosong (karena disembunyikan), otomatis set ke 0
            'points'        => $request->points ?? 0,
            'option_a'      => $request->option_a,
            'option_b'      => $request->option_b,
            'option_c'      => $request->option_c,
            'option_d'      => $request->option_d,
            'correct_answer'=> $request->correct_answer,
        ]);

        return redirect()->back()->with('success', 'Pertanyaan berhasil ditambahkan!');
    }

    // Menghapus Pertanyaan
    public function destroyQuestion($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return back()->with('success', 'Pertanyaan berhasil dihapus!');
    }

    public function reviewAssessment($user_id, $assessment_id)
    {
        $kandidat = User::findOrFail($user_id);
        $assessment = \App\Models\Assessment::with('questions')->findOrFail($assessment_id);

        $result = \App\Models\Result::where('user_id', $user_id)
                                    ->where('assessment_id', $assessment_id)
                                    ->firstOrFail();

        $userAnswers = \App\Models\UserAnswer::where('user_id', $user_id)
                                    ->where('assessment_id', $assessment_id)
                                    ->get()
                                    ->keyBy('question_id');

        // ==========================================
        // LOGIKA PEMANGGILAN GEMINI AI (API KEY HARDCODED)
        // ==========================================
        $aiError = null;

        // Cek apakah data kosong ATAU datanya bukan format JSON yang valid (gagal)
if (empty($result->ai_analysis) || !is_array(json_decode($result->ai_analysis, true))) {

            $promptContext = "Kamu adalah HR Expert Senior. Analisis hasil tes kandidat ini. Nama Tes: {$assessment->title}. Total Skor: {$result->score}. Berikut adalah riwayat jawaban kandidat:\n\n";

            foreach($assessment->questions as $q) {
                $ans = $userAnswers->get($q->id);
                $dijawab = $ans ? $ans->answer_value : 'Tidak dijawab';
                $promptContext .= "- Pertanyaan: {$q->question_text} | Dijawab: {$dijawab}\n";
            }

            $promptContext .= "\nBerdasarkan jawaban tersebut, berikan analisis dalam format JSON ketat (Hanya JSON, jangan ada teks markdown ```json). Format JSON harus persis memiliki key berikut:
            {
                \"ringkasan\": \"Ringkasan profil kandidat (1 paragraf)\",
                \"kekuatan\": \"Kekuatan utama kandidat (1 kalimat)\",
                \"pengembangan\": \"Area pengembangan / kelemahan (1 kalimat)\",
                \"rekomendasi\": \"Rekomendasi posisi atau tugas (1 kalimat)\",
                \"wawancara\": \"Panduan pertanyaan wawancara lanjutan (1 paragraf)\"
            }";

            try {
                /** @var \Illuminate\Http\Client\Response $response */
                $response = \Illuminate\Support\Facades\Http::withoutVerifying()
                    ->withHeaders([
                        'Content-Type' => 'application/json',
                    ])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=' . env('GEMINI_API_KEY'), [
                    'contents' => [
                        ['parts' => [['text' => $promptContext]]]
                    ],
                    'generationConfig' => [
                        'response_mime_type' => 'application/json',
                    ]
                ]);

                if ($response->successful()) {
                    $geminiOutput = $response->json('candidates.0.content.parts.0.text');
                    $geminiOutput = str_replace(['```json', '```JSON', '```'], '', $geminiOutput);
                    $geminiOutput = trim($geminiOutput);

                    // Simpan hasil JSON ke database (akan menimpa data gagal sebelumnya)
                    $result->update(['ai_analysis' => $geminiOutput]);
                } else {
                    $aiError = $response->json('error.message') ?? 'API Key salah atau ditolak oleh Google.';
                }
            } catch (\Exception $e) {
                $aiError = "Koneksi ke server Google terputus: " . $e->getMessage();
            }
        }

        return view('admin.review_assesment', compact('kandidat', 'assessment', 'result', 'userAnswers', 'aiError'));
    }


    // FUNGSI MENGIRIM EMAIL UNDANGAN & MENYIMPAN KE DATABASE
    public function kirimUndangan($user_id, $assessment_id)
    {
        $kandidat = User::findOrFail($user_id);
        $assessment = \App\Models\Assessment::findOrFail($assessment_id);

        // 1. Simpan ke database terlebih dahulu (Wajib ditaruh di atas return)
        \App\Models\Invitation::updateOrCreate(
            ['user_id' => $user_id, 'assessment_id' => $assessment_id],
            ['status' => 'Belum dikerjakan']
        );

        // 2. Kirim Email (Jika ini error, data minimal sudah tersimpan di database)
        try {
            Mail::to($kandidat->email)->send(new AssessmentInvitation($kandidat, $assessment));
            return redirect()->back()->with('success', 'Undangan berhasil masuk ke Dashboard Kandidat & Email terkirim!');
        } catch (\Exception $e) {
            // Jika email gagal terkirim (misal karena .env belum disetting),
            // setidaknya data undangan tetap masuk ke Dashboard Kandidat.
            return redirect()->back()->with('warning', 'Undangan berhasil masuk ke Dashboard, namun pengiriman Email gagal: ' . $e->getMessage());
        }
    }

    // ==========================================
    // FUNGSI RESET UJIAN (KESEMPATAN KEDUA)
    // ==========================================
    public function resetUjian($user_id, $assessment_id)
    {
        // 1. Hapus nilai akhir (Result)
        \App\Models\Result::where('user_id', $user_id)
            ->where('assessment_id', $assessment_id)
            ->delete();

        // 2. Hapus seluruh riwayat jawaban (UserAnswers)
        \App\Models\UserAnswer::where('user_id', $user_id)
            ->where('assessment_id', $assessment_id)
            ->delete();

        // 3. Kembalikan status undangan menjadi "Belum dikerjakan"
        \App\Models\Invitation::where('user_id', $user_id)
            ->where('assessment_id', $assessment_id)
            ->update(['status' => 'Belum dikerjakan']);

        return redirect()->back()->with('success', 'Ujian berhasil di-reset! Kandidat sekarang dapat mengakses dan mengerjakan ulang tes tersebut dari Dashboard-nya.');
    }


}
