<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessment;
use App\Models\Result;
use App\Models\UserAnswer;
use Illuminate\Support\Facades\Auth;

class KandidatController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $assessments = Assessment::withCount('questions')->latest()->get();

        return view('dashboard', compact('user', 'assessments'));
    }

    public function verifyToken(Request $request, $id)
    {
        $request->validate([
            'token' => 'required|string|max:10'
        ]);

        $assessment = Assessment::findOrFail($id);

        if (strtoupper($request->token) === strtoupper($assessment->test_code)) {
            session(['verified_assessment_' . $id => true]);
            return redirect()->route('kandidat.kerjakan_tes', $id)->with('success', 'Token valid, selamat mengerjakan!');
        }

        return back()->withErrors(['token' => 'Token Akses yang Anda masukkan salah.']);
    }

    public function kerjakanTes($id)
    {
        if (!session('verified_assessment_' . $id)) {
            return redirect()->route('dashboard')->withErrors(['token' => 'Silakan masukkan token akses terlebih dahulu.']);
        }

        $assessment = Assessment::with('questions')->findOrFail($id);

        return view('kerjakan_tes', compact('assessment'));
    }

    public function submitTes(Request $request, $id)
    {
        $assessment = Assessment::with('questions')->findOrFail($id);
        $answers = $request->input('answers', []);

        $totalScore = 0;
        $userId = Auth::id();

        foreach ($assessment->questions as $question) {
            if (isset($answers[$question->id])) {
                $userAnswer = $answers[$question->id];
                $isCorrect = null;

                if ($assessment->category === 'Cognitive') {
                    if ($userAnswer === $question->correct_answer) {
                        $totalScore += $question->points;
                        $isCorrect = true;
                    } else {
                        $isCorrect = false;
                    }
                } else {
                    $totalScore += (int)$userAnswer;
                }

                UserAnswer::updateOrCreate(
                    [
                        'user_id' => $userId,
                        'assessment_id' => $id,
                        'question_id' => $question->id
                    ],
                    [
                        'answer_value' => $userAnswer,
                        'is_correct' => $isCorrect
                    ]
                );
            }
        }

        Result::updateOrCreate(
            [
                'user_id' => $userId,
                'assessment_id' => $id
            ],
            [
                'score' => $totalScore,
                'result_label' => $assessment->category === 'Cognitive' ? null : 'Menunggu Analisis',
                'cheat_count' => $request->input('cheat_count', 0),
                'status' => 'Selesai'
            ]
        );

        $request->session()->forget('verified_assessment_' . $id);

        return redirect()->route('dashboard')->with('success', 'Ujian selesai! Jawaban Anda telah berhasil dikirim dan dinilai oleh sistem.');
    }
}
