<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Assesment - Admin Humania</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F8FAFC; }
        .slide-hidden { display: none; }
        .slide-active { display: block; animation: fadeIn 0.3s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 10px; }
    </style>
</head>
<body class="flex min-h-screen overflow-hidden">

    <aside class="w-64 bg-[#2563EB] text-white flex flex-col shrink-0 z-50">
        <div class="p-8">
            <div class="flex items-center gap-2">
                <h1 class="text-2xl font-bold tracking-wide">Humania</h1>
                <span class="bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Admin</span>
            </div>
            <p class="text-blue-200 text-sm mt-1">TalentMap</p>
        </div>

        <nav class="flex-1 px-4 mt-4 space-y-2">
            <p class="px-4 text-[10px] font-bold text-blue-300 uppercase tracking-wider mb-2">MENU ADMIN</p>
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg> Overview
            </a>
            <a href="{{ route('admin.daftar_kandidat') }}" class="flex items-center gap-3 px-4 py-3 bg-blue-700 rounded-lg text-white font-medium transition shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg> Daftar Kandidat
            </a>
            <a href="{{ url('/admin/buat-assesment') }}" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> Buat Assesment
            </a>
        </nav>

        <div class="p-4 bg-blue-800 mt-auto">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-full bg-white text-blue-800 flex items-center justify-center font-bold border-2 border-blue-200">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <div class="overflow-hidden">
                    <p class="font-bold text-sm text-white truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-blue-200 truncate">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-2 text-sm text-blue-200 hover:text-red-300 transition w-full group py-1">
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg> Keluar
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 p-8 flex gap-8 max-h-screen overflow-hidden">

        <div class="flex-1 flex flex-col h-full overflow-hidden">

            <div class="flex items-center gap-4 mb-6 shrink-0">
                <a href="{{ route('admin.kandidat.detail', $kandidat->id) }}" class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center hover:bg-gray-800 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </a>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ $assessment->title }}</h1>
                    <p class="text-gray-500 text-sm mt-0.5">Kandidat: <span class="font-bold text-blue-600">{{ $kandidat->name }}</span>
                        @if($assessment->category === 'Cognitive')
                            • Skor: <span class="font-bold text-green-600">{{ $result->score }}</span>
                        @else
                            • 
                        @endif
                                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-8 flex-1 overflow-y-auto custom-scrollbar relative">

                <div id="content-0" class="content-slide slide-active">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15 8L21 9L16.5 14L18 20L12 17L6 20L7.5 14L3 9L9 8L12 2Z"></path></svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Hasil Analisis AI</h2>
                            <p class="text-xs text-gray-400 flex items-center gap-1 mt-1"><span class="w-2 h-2 rounded-full bg-green-500 inline-block"></span> Dihasilkan oleh Gemini AI</p>
                        </div>
                    </div>

                    @php
                        $aiData = json_decode($result->ai_analysis, true);
                    @endphp

                    <div class="space-y-4">
                        @if($aiData)
                            <div class="bg-blue-50/50 border border-blue-100 p-6 rounded-2xl">
                                <h3 class="font-bold text-blue-900 flex items-center gap-2 mb-3"><div class="w-4 h-4 rounded-full border-4 border-blue-500"></div> Ringkasan Profil</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">{{ $aiData['ringkasan'] ?? 'Analisis tidak tersedia.' }}</p>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-green-50/50 border border-green-100 p-6 rounded-2xl">
                                    <h3 class="font-bold text-green-900 flex items-center gap-2 mb-3"><div class="w-4 h-4 rounded-full border-4 border-green-500"></div> Kekuatan Utama</h3>
                                    <p class="text-gray-600 text-sm">{{ $aiData['kekuatan'] ?? '-' }}</p>
                                </div>
                                <div class="bg-orange-50/50 border border-orange-100 p-6 rounded-2xl">
                                    <h3 class="font-bold text-orange-900 flex items-center gap-2 mb-3"><div class="w-4 h-4 rounded-full border-4 border-orange-500"></div> Area Pengembangan</h3>
                                    <p class="text-gray-600 text-sm">{{ $aiData['pengembangan'] ?? '-' }}</p>
                                </div>
                            </div>

                            <div class="bg-blue-50/50 border border-blue-100 p-6 rounded-2xl">
                                <h3 class="font-bold text-blue-900 flex items-center gap-2 mb-3"><div class="w-4 h-4 rounded-full border-4 border-blue-500"></div> Rekomendasi Posisi</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">{{ $aiData['rekomendasi'] ?? '-' }}</p>
                            </div>

                            <div class="bg-blue-50/50 border border-blue-100 p-6 rounded-2xl">
                                <h3 class="font-bold text-blue-900 flex items-center gap-2 mb-3"><div class="w-4 h-4 rounded-full border-4 border-blue-500"></div> Panduan Wawancara</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">{{ $aiData['wawancara'] ?? '-' }}</p>
                            </div>
                        @else
                            <div class="bg-red-50 border border-red-200 p-6 rounded-2xl text-center">
                                <svg class="w-10 h-10 text-red-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <h3 class="font-bold text-red-800 mb-1">Analisis AI Belum Tersedia</h3>
                                <p class="text-red-600 text-sm">Sedang memproses atau pastikan API Key Anda valid.</p>
                            </div>
                        @endif
                    </div>
                </div>

                @foreach($assessment->questions as $index => $q)
                @php
                    $userAnswer = $userAnswers->get($q->id);
                    $answeredValue = $userAnswer ? $userAnswer->answer_value : null;
                @endphp

                <div id="content-{{ $index + 1 }}" class="content-slide slide-hidden">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 bg-[#2563EB] text-white rounded-2xl flex items-center justify-center font-bold text-xl">
                            {{ $index + 1 }}
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">Detail Jawaban</h2>
                    </div>

                    <div class="mb-8 bg-gray-50 p-6 rounded-2xl border border-gray-100">
                        <p class="text-lg font-medium text-gray-800 leading-relaxed">{{ $q->question_text }}</p>
                    </div>

                    @if(!$answeredValue)
                        <div class="bg-yellow-50 border border-yellow-200 p-4 rounded-xl mb-6 flex gap-3">
                            <svg class="w-5 h-5 text-yellow-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <p class="text-sm text-yellow-800 font-medium">Kandidat tidak menjawab soal ini.</p>
                        </div>
                    @endif

                    @if($q->type == 'scale')
                        <div class="grid grid-cols-5 gap-3">
                            @for($i = 1; $i <= 5; $i++)
                                @if($answeredValue == $i)
                                    <div class="border-2 border-blue-600 bg-blue-50 rounded-2xl p-4 text-center shadow-md transform scale-105 transition-all">
                                        <div class="text-2xl font-bold text-blue-700">{{ $i }}</div>
                                        <div class="text-[10px] text-blue-500 font-bold uppercase mt-1 tracking-wider">Dipilih</div>
                                    </div>
                                @else
                                    <div class="border border-gray-200 bg-gray-50 opacity-50 rounded-2xl p-4 text-center grayscale">
                                        <div class="text-2xl font-bold text-gray-400">{{ $i }}</div>
                                    </div>
                                @endif
                            @endfor
                        </div>
                    @else
                        <div class="space-y-3">
                            @foreach(['a' => $q->option_a, 'b' => $q->option_b, 'c' => $q->option_c, 'd' => $q->option_d] as $key => $option)
                                @php
                                    $isUserChoice = ($answeredValue === (string)$key);
                                    $isCorrectAnswer = ($q->correct_answer === (string)$key);

                                    $borderClass = "border-gray-200 bg-white opacity-50";
                                    $textClass = "text-gray-500";
                                    $badge = "";

                                    if ($isUserChoice && $isCorrectAnswer) {
                                        $borderClass = "border-2 border-green-500 bg-green-50 opacity-100 shadow-sm transform scale-[1.01] transition-all";
                                        $textClass = "text-green-800 font-bold";
                                        $badge = '<span class="ml-auto text-xs bg-green-500 text-white px-3 py-1.5 rounded-md font-bold flex items-center gap-1 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg> Jawaban Benar</span>';
                                    }
                                    elseif ($isUserChoice && !$isCorrectAnswer) {
                                        $borderClass = "border-2 border-red-400 bg-red-50 opacity-100 shadow-sm transform scale-[1.01] transition-all";
                                        $textClass = "text-red-800 font-bold";
                                        $badge = '<span class="ml-auto text-xs bg-red-500 text-white px-3 py-1.5 rounded-md font-bold flex items-center gap-1 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg> Dipilih (Salah)</span>';
                                    }
                                    elseif (!$isUserChoice && $isCorrectAnswer) {
                                        $borderClass = "border-2 border-green-200 bg-white opacity-100";
                                        $textClass = "text-gray-700 font-medium";
                                        $badge = '<span class="ml-auto text-[11px] bg-green-100 text-green-700 px-2 py-1 rounded border border-green-200 font-bold uppercase tracking-wider">Kunci Jawaban</span>';
                                    }
                                @endphp

                                <div class="p-5 rounded-xl flex items-center gap-4 {{ $borderClass }}">
                                    <span class="w-8 h-8 flex items-center justify-center rounded-full font-bold uppercase text-sm shrink-0 shadow-sm
                                        {{ $isUserChoice && $isCorrectAnswer ? 'bg-green-600 text-white' : '' }}
                                        {{ $isUserChoice && !$isCorrectAnswer ? 'bg-red-500 text-white' : '' }}
                                        {{ !$isUserChoice ? 'bg-white border-2 border-gray-200 text-gray-400' : '' }}
                                    ">{{ $key }}</span>

                                    <span class="text-lg {{ $textClass }}">{{ $option }}</span>
                                    {!! $badge !!}
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
                @endforeach

            </div>

            <div class="flex items-center justify-center gap-4 mt-6 shrink-0">
                <button onclick="prevSlide()" class="w-10 h-10 flex items-center justify-center bg-white border border-gray-300 hover:bg-gray-100 hover:border-gray-400 rounded-full transition shadow-sm text-gray-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg></button>

                <div class="bg-white border border-gray-200 px-4 py-1.5 rounded-full shadow-sm flex items-center gap-2">
                    <span id="pageIndicator" class="font-bold text-[#2563EB] text-lg w-6 text-center">AI</span>
                    <span class="text-gray-300 font-medium">/</span>
                    <span class="font-bold text-gray-500 text-lg w-6 text-center">{{ $assessment->questions->count() }}</span>
                </div>

                <button onclick="nextSlide()" class="w-10 h-10 flex items-center justify-center bg-white border border-gray-300 hover:bg-gray-100 hover:border-gray-400 rounded-full transition shadow-sm text-gray-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg></button>
            </div>
        </div>

        <div class="w-72 bg-white rounded-3xl p-6 border border-gray-200 flex flex-col h-full shadow-sm shrink-0">
            <h3 class="font-bold text-gray-800 mb-6 text-lg flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                Navigasi
            </h3>

            <div class="grid grid-cols-4 gap-3 overflow-y-auto custom-scrollbar pr-2 pb-4">
                <button onclick="goToSlide(0)" id="btn-nav-0" class="nav-btn bg-[#2563EB] text-white aspect-square rounded-xl font-bold shadow-md transition hover:bg-blue-700 flex items-center justify-center border-2 border-transparent">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15 8L21 9L16.5 14L18 20L12 17L6 20L7.5 14L3 9L9 8L12 2Z"></path></svg>
                </button>

                @foreach($assessment->questions as $index => $q)
                @php
                    $isCorrectBtn = null;
                    if($assessment->category === 'Cognitive') {
                        $userAns = $userAnswers->get($q->id);
                        if($userAns) {
                            $isCorrectBtn = $userAns->is_correct; // True / False
                        }
                    }
                @endphp
                <button onclick="goToSlide({{ $index + 1 }})" id="btn-nav-{{ $index + 1 }}" class="nav-btn bg-white text-gray-700 aspect-square rounded-xl font-bold shadow-sm border-2 border-gray-200 hover:border-[#2563EB] hover:text-[#2563EB] transition relative">
                    {{ $index + 1 }}

                    @if($isCorrectBtn === true)
                        <div class="absolute -top-1.5 -right-1.5 w-4 h-4 bg-green-500 rounded-full border-2 border-white shadow-sm"></div>
                    @elseif($isCorrectBtn === false)
                        <div class="absolute -top-1.5 -right-1.5 w-4 h-4 bg-red-500 rounded-full border-2 border-white shadow-sm"></div>
                    @endif
                </button>
                @endforeach
            </div>
        </div>

    </main>

    <script>
        const totalSlides = {{ $assessment->questions->count() }};
        let currentSlide = 0;
        const pageIndicator = document.getElementById('pageIndicator');

        function updateUI() {
            document.querySelectorAll('.content-slide').forEach(el => {
                el.classList.replace('slide-active', 'slide-hidden');
            });
            document.getElementById(`content-${currentSlide}`).classList.replace('slide-hidden', 'slide-active');

            // Reset semua style tombol navigasi
            document.querySelectorAll('.nav-btn').forEach(btn => {
                btn.classList.remove('bg-[#2563EB]', 'text-white', 'border-transparent', 'shadow-md', 'scale-105');
                btn.classList.add('bg-white', 'text-gray-700', 'border-gray-200');
            });

            // Highlight tombol yang sedang aktif
            const activeBtn = document.getElementById(`btn-nav-${currentSlide}`);
            if(activeBtn) {
                activeBtn.classList.remove('bg-white', 'text-gray-700', 'border-gray-200');
                activeBtn.classList.add('bg-[#2563EB]', 'text-white', 'border-transparent', 'shadow-md', 'scale-105');
            }

            pageIndicator.innerText = currentSlide === 0 ? 'AI' : currentSlide;
        }

        function goToSlide(index) { currentSlide = index; updateUI(); }
        function prevSlide() { if (currentSlide > 0) { currentSlide--; updateUI(); } }
        function nextSlide() { if (currentSlide < totalSlides) { currentSlide++; updateUI(); } }
    </script>
</body>
</html>
