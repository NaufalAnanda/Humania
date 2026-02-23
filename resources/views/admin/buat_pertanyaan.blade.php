<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pertanyaan - Humania Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-[#F3F4F6]">

    @php
        // Cek Kategori Assessment
        $isCognitive = $assessment->category === 'Cognitive';

        // Tentukan Tipe Soal (Otomatis)
        $fixedType = $isCognitive ? 'multiple_choice' : 'scale';

        // Label untuk ditampilkan ke Admin
        $typeLabel = $isCognitive ? 'Pilihan Ganda (A/B/C/D)' : 'Skala Likert';
    @endphp

    <div class="flex min-h-screen">

        <aside class="w-64 bg-[#2563EB] text-white flex flex-col fixed h-full left-0 top-0 z-50">
            <div class="p-8">
                <div class="flex items-center gap-2">
                    <h1 class="text-2xl font-bold tracking-wide">Humania</h1>
                    <span class="bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Admin</span>
                </div>
                <p class="text-blue-200 text-sm mt-1">TalentMap</p>
            </div>

            <nav class="flex-1 px-4 space-y-2 mt-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali Dashboard
                </a>
            </nav>
        </aside>

        <main class="flex-1 ml-64 p-8">

            <div class="flex items-center gap-4 mb-8">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-sm text-blue-600 font-bold text-lg">
                    {{ substr($assessment->title, 0, 1) }}
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Kelola Pertanyaan</h1>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-gray-500">{{ $assessment->title }} ({{ $assessment->test_code }})</span>
                        <span class="bg-gray-200 text-gray-600 text-[10px] font-bold px-2 py-0.5 rounded uppercase">
                            Kategori: {{ $assessment->category }}
                        </span>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6 border border-green-200 font-medium flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6 border border-red-200 text-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-bold text-lg text-gray-800">
                            Daftar Pertanyaan ({{ $questions->count() }})
                        </h3>
                    </div>

                    <div class="space-y-4">
                        @forelse($questions as $q)
                            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition">
                                <div class="flex justify-between items-start mb-3">
                                    <div class="flex items-center gap-2">
                                        @if($q->type == 'multiple_choice')
                                            <span class="bg-blue-100 text-blue-700 text-[10px] font-bold px-2 py-1 rounded uppercase">Pilihan Ganda</span>
                                        @else
                                            <span class="bg-purple-100 text-purple-700 text-[10px] font-bold px-2 py-1 rounded uppercase">Skala </span>
                                        @endif
                                    </div>
                                    <span class="text-xs font-bold text-gray-500 bg-gray-100 px-2 py-1 rounded">
                                        {{ $q->points }} Poin
                                    </span>
                                </div>

                                <p class="font-bold text-gray-800 mb-4 text-base">{{ $q->question_text }}</p>

                                @if($q->type == 'multiple_choice')
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-sm">
                                        <div class="p-2 rounded border {{ $q->correct_answer == 'a' ? 'bg-green-50 border-green-300 text-green-800' : 'bg-gray-50 border-gray-100 text-gray-600' }}">
                                            <span class="font-bold mr-1">A.</span> {{ $q->option_a }}
                                        </div>
                                        <div class="p-2 rounded border {{ $q->correct_answer == 'b' ? 'bg-green-50 border-green-300 text-green-800' : 'bg-gray-50 border-gray-100 text-gray-600' }}">
                                            <span class="font-bold mr-1">B.</span> {{ $q->option_b }}
                                        </div>
                                        <div class="p-2 rounded border {{ $q->correct_answer == 'c' ? 'bg-green-50 border-green-300 text-green-800' : 'bg-gray-50 border-gray-100 text-gray-600' }}">
                                            <span class="font-bold mr-1">C.</span> {{ $q->option_c }}
                                        </div>
                                        <div class="p-2 rounded border {{ $q->correct_answer == 'd' ? 'bg-green-50 border-green-300 text-green-800' : 'bg-gray-50 border-gray-100 text-gray-600' }}">
                                            <span class="font-bold mr-1">D.</span> {{ $q->option_d }}
                                        </div>
                                    </div>
                                @else
                                    <div class="flex justify-between items-center px-4 py-2 bg-gray-50 rounded-lg border border-gray-100">
                                        <div class="text-xs text-gray-400 font-bold">Sangat Tidak Setuju</div>
                                        <div class="flex gap-3">
                                            @for($i=1; $i<=5; $i++)
                                            <span class="w-6 h-6 rounded-full border border-gray-300 flex items-center justify-center text-xs text-gray-400">{{ $i }}</span>
                                            @endfor
                                        </div>
                                        <div class="text-xs text-gray-400 font-bold">Sangat Setuju</div>
                                    </div>
                                @endif

                                <div class="mt-4 pt-3 border-t border-gray-100 flex justify-end">
                                    <form onsubmit="return confirm('Hapus pertanyaan ini?');" action="{{ route('admin.question.destroy', $q->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 text-xs font-bold hover:text-red-700 flex items-center gap-1">
                                            Hapus Soal
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="bg-gray-200 border-2 border-dashed border-gray-300 rounded-xl h-64 flex flex-col items-center justify-center text-gray-500">
                                <p>Belum ada Pertanyaan</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-200 flex justify-between items-center bg-white p-6 rounded-xl shadow-sm border">
                        <div class="flex-1">
                            <h4 class="font-bold text-gray-800">Selesai Membuat Soal?</h4>
                            <p class="text-sm text-gray-500 mt-1">
                                Pertanyaan tersimpan otomatis. Tekan tombol ini untuk kembali ke dashboard.
                            </p>
                        </div>
                        <a href="{{ route('admin.dashboard') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg shadow-green-100 flex items-center gap-2 transition transform hover:-translate-y-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Selesai
                        </a>
                    </div>

                </div>

                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 sticky top-4">
                        <h3 class="font-bold text-lg text-gray-900 flex items-center gap-2 mb-6">
                            <span class="text-blue-600 text-2xl">+</span> Tambah Pertanyaan
                        </h3>

                        <form action="{{ route('admin.question.store', $assessment->id) }}" method="POST">
                            @csrf

                            <input type="hidden" name="type" value="{{ $fixedType }}">

                            <div class="mb-4">
                                <label class="text-xs font-bold text-gray-400 uppercase tracking-wide mb-2 block">Teks Pertanyaan</label>
                                <textarea name="question_text" required rows="3" class="w-full bg-gray-100 border-none rounded-lg p-3 text-sm focus:ring-2 focus:ring-blue-500" placeholder="Masukan Pertanyaan...."></textarea>
                            </div>

                            <div class="grid grid-cols-1 gap-3 mb-4">
                                <div>
                                    <label class="text-xs font-bold text-gray-400 uppercase tracking-wide mb-2 block">Tipe Soal (Otomatis)</label>
                                    <input type="text" value="{{ $typeLabel }}" disabled class="w-full bg-gray-200 border-none rounded-lg p-3 text-sm font-bold text-gray-600 cursor-not-allowed">
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-400 uppercase tracking-wide mb-2 block">Poin</label>
                                    <input type="number" name="points" value="5" required class="w-full bg-gray-100 border-none rounded-lg p-3 text-sm">
                                </div>
                            </div>

                            @if($isCognitive)
                                <div class="space-y-3 mb-6">
                                    <label class="text-xs font-bold text-gray-400 uppercase tracking-wide block">Opsi Jawaban</label>

                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded font-bold flex items-center justify-center">A</div>
                                        <input type="text" name="option_a" required class="flex-1 bg-gray-100 border-none rounded-lg p-2 text-sm" placeholder="Opsi A">
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded font-bold flex items-center justify-center">B</div>
                                        <input type="text" name="option_b" required class="flex-1 bg-gray-100 border-none rounded-lg p-2 text-sm" placeholder="Opsi B">
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded font-bold flex items-center justify-center">C</div>
                                        <input type="text" name="option_c" required class="flex-1 bg-gray-100 border-none rounded-lg p-2 text-sm" placeholder="Opsi C">
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded font-bold flex items-center justify-center">D</div>
                                        <input type="text" name="option_d" required class="flex-1 bg-gray-100 border-none rounded-lg p-2 text-sm" placeholder="Opsi D">
                                    </div>

                                    <div class="mt-4">
                                        <label class="text-xs font-bold text-green-600 uppercase tracking-wide block mb-2">Kunci Jawaban Benar:</label>
                                        <select name="correct_answer" class="w-full bg-green-50 border border-green-200 rounded-lg p-2 text-sm text-green-700 font-bold">
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>
                                        </select>
                                    </div>
                                </div>
                            @else
                                <div class="mb-6 bg-purple-50 text-purple-700 p-4 rounded-lg text-xs border border-purple-200">
                                    <p class="font-bold mb-1 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        Mode Skala Likert
                                    </p>
                                    <p>Karena kategori ini adalah <b>{{ $assessment->category }}</b>, maka format jawaban otomatis menggunakan Skala  (Sangat Tidak Setuju - Sangat Setuju).</p>
                                </div>
                            @endif

                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg transition shadow-lg shadow-blue-200">
                                + Simpan Pertanyaan
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </main>
    </div>

</body>
</html>
