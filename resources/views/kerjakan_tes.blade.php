<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujian: {{ $assessment->title }} - Humania</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F8FAFC; user-select: none; }
        .slide-hidden { display: none; }
        .slide-active { display: block; animation: fadeIn 0.3s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="text-gray-800 h-screen flex flex-col overflow-hidden relative">

    <div id="cheatToast" class="fixed top-6 left-1/2 transform -translate-x-1/2 bg-red-600 text-white px-6 py-4 rounded-xl shadow-2xl z-[100] flex items-center gap-4 transition-all duration-300 opacity-0 -translate-y-10 pointer-events-none">
        <div class="bg-red-500 rounded-full p-1.5 animate-pulse shrink-0">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
        </div>
        <div>
            <p class="font-bold text-sm tracking-wide uppercase">Peringatan Sistem!</p>
            <p id="cheatToastText" class="text-xs text-red-100 mt-0.5 font-medium leading-relaxed"></p>
        </div>
    </div>

    <header class="bg-[#2563EB] text-white py-5 px-8 flex items-center justify-between shrink-0 z-50">
        <div class="flex items-center gap-6">
            <div class="text-white">
                <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3L4 9v12h5v-7h6v7h5V9l-8-6z"></path></svg>
            </div>
            <div>
                <h1 class="font-bold text-2xl tracking-wide">{{ $assessment->title }}</h1>
                <p id="headerCounter" class="text-blue-200 text-sm mt-0.5">Pertanyaan 1 dari {{ $assessment->questions->count() }}</p>
            </div>
        </div>

        @if($assessment->duration > 0)
        <div class="bg-blue-800/50 px-4 py-2 rounded-lg border border-blue-400/30 flex items-center gap-2">
            <svg class="w-5 h-5 text-blue-200 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span id="timerDisplay" class="font-mono font-bold text-lg tracking-wider">--:--:--</span>
        </div>
        @endif
    </header>

    <form id="testForm" action="{{ route('kandidat.submit_tes', $assessment->id) }}" method="POST" class="flex-1 flex flex-col overflow-hidden">
        @csrf

        <input type="hidden" name="cheat_count" id="cheatCount" value="0">

        <main class="flex-1 flex px-8 py-8 gap-8 overflow-y-auto">

            <aside class="w-72 shrink-0">
                <div class="bg-gray-200 rounded-xl overflow-hidden shadow-inner border border-gray-300 relative aspect-video flex items-center justify-center flex-col text-center">
                    <video id="webcamVideo" autoplay playsinline class="absolute inset-0 w-full h-full object-cover z-10 hidden"></video>

                    <div id="webcamFallback" class="z-0 p-4">
                        <svg class="w-10 h-10 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        <p class="text-gray-500 font-bold text-sm">Spot for<br>Web Cam</p>
                        <p id="camStatus" class="text-[10px] text-gray-500 mt-2">Meminta Izin Kamera...</p>
                        <button type="button" id="btnStartCam" class="mt-3 bg-blue-600 text-white text-xs px-3 py-1.5 rounded-lg shadow hover:bg-blue-700 hidden">Coba Aktifkan Kamera</button>
                    </div>
                </div>

                <div class="mt-4 bg-red-50 border border-red-100 p-3 rounded-lg flex items-start gap-2 text-red-600">
                    <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    <p class="text-[11px] leading-tight font-medium">Sistem merekam aktivitas layar. Berpindah tab atau aplikasi akan dihitung sebagai pelanggaran.</p>
                </div>
            </aside>

            <div class="flex-1 max-w-4xl">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-10 min-h-[400px]">

                    @forelse($assessment->questions as $index => $q)
                    <div class="question-slide {{ $index === 0 ? 'slide-active' : 'slide-hidden' }}" data-index="{{ $index }}">

                        <div class="w-12 h-12 bg-[#2563EB] text-white rounded-full flex items-center justify-center font-bold text-lg mb-8 shadow-md">
                            {{ $index + 1 }}
                        </div>

                        <h2 class="text-3xl font-medium text-gray-900 mb-12 leading-relaxed">{{ $q->question_text }}</h2>

                        @if($q->type == 'scale')
                            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                                @php
                                    $labels = [1 => 'Sangat tidak setuju', 2 => 'Tidak setuju', 3 => 'Netral', 4 => 'Setuju', 5 => 'Sangat setuju'];
                                @endphp

                                @for($i = 1; $i <= 5; $i++)
                                <label class="cursor-pointer group">
                                    <input type="radio" name="answers[{{ $q->id }}]" value="{{ $i }}" class="peer sr-only" required>
                                    <div class="border border-gray-300 rounded-2xl p-4 text-center h-full flex flex-col items-center justify-center gap-2 hover:border-blue-400 transition-all peer-checked:border-[#2563EB] peer-checked:border-2 peer-checked:bg-blue-50">
                                        <div class="text-2xl font-bold text-[#2563EB]">{{ $i }}</div>
                                        <div class="text-[11px] text-gray-600 font-medium leading-tight px-2">{{ $labels[$i] }}</div>
                                    </div>
                                </label>
                                @endfor
                            </div>
                        @else
                            <div class="space-y-4">
                                @foreach(['a' => $q->option_a, 'b' => $q->option_b, 'c' => $q->option_c, 'd' => $q->option_d] as $key => $option)
                                <label class="flex items-center p-5 border border-gray-300 rounded-2xl cursor-pointer hover:border-blue-400 transition-all peer-checked:border-[#2563EB] peer-checked:border-2 peer-checked:bg-blue-50 group">
                                    <input type="radio" name="answers[{{ $q->id }}]" value="{{ $key }}" class="peer w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500" required>
                                    <div class="ml-4 flex-1">
                                        <span class="font-bold text-gray-400 uppercase mr-2 peer-checked:text-[#2563EB]">{{ $key }}.</span>
                                        <span class="text-gray-800 text-lg font-medium peer-checked:text-blue-900">{{ $option }}</span>
                                    </div>
                                </label>
                                @endforeach
                            </div>
                        @endif

                    </div>
                    @empty
                    <div class="text-center py-20 text-gray-500">
                        <p>Maaf, soal belum tersedia.</p>
                    </div>
                    @endforelse

                </div>
            </div>
        </main>

        <footer class="bg-white border-t border-gray-200 py-4 px-8 flex justify-between items-center shrink-0 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-50">
            <button type="button" id="btnPrev" class="px-6 py-2.5 border border-gray-400 text-gray-700 rounded-full font-medium hover:bg-gray-50 transition flex items-center gap-2 disabled:opacity-30 disabled:cursor-not-allowed">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Sebelumnya
            </button>

            <div class="flex items-center gap-2" id="progressDots"></div>

            <button type="button" id="btnNext" class="px-8 py-2.5 bg-[#2563EB] text-white rounded-full font-bold hover:bg-blue-700 transition shadow-md shadow-blue-200 flex items-center gap-2 hidden">
                Selanjutnya
            </button>
            <button type="button" id="btnSubmit" onclick="submitExam()" class="px-8 py-2.5 bg-green-600 text-white rounded-full font-bold hover:bg-green-700 transition shadow-md shadow-green-200 flex items-center gap-2 hidden">
                Selesai & Kumpulkan
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </button>
        </footer>
    </form>


    <script>
        // ==============================================
        // 1. LOGIKA NAVIGASI SOAL
        // ==============================================
        const slides = document.querySelectorAll('.question-slide');
        const totalQuestions = slides.length;
        let currentIndex = 0;

        const btnPrev = document.getElementById('btnPrev');
        const btnNext = document.getElementById('btnNext');
        const btnSubmit = document.getElementById('btnSubmit');
        const headerCounter = document.getElementById('headerCounter');
        const progressDots = document.getElementById('progressDots');
        const testForm = document.getElementById('testForm');

        function updateUI() {
            if(totalQuestions === 0) return;

            slides.forEach((slide, index) => {
                slide.classList.remove('slide-active');
                slide.classList.add('slide-hidden');
                if (index === currentIndex) {
                    slide.classList.remove('slide-hidden');
                    slide.classList.add('slide-active');
                }
            });

            headerCounter.innerText = `Pertanyaan ${currentIndex + 1} dari ${totalQuestions}`;
            btnPrev.disabled = currentIndex === 0;

            if (currentIndex === totalQuestions - 1) {
                btnNext.classList.add('hidden');
                btnSubmit.classList.remove('hidden');
            } else {
                btnNext.classList.remove('hidden');
                btnSubmit.classList.add('hidden');
            }

            progressDots.innerHTML = '';
            let start = Math.max(0, currentIndex - 4);
            let end = Math.min(totalQuestions, start + 10);

            for (let i = start; i < end; i++) {
                const dot = document.createElement('div');
                if (i === currentIndex) {
                    dot.className = 'w-6 h-2 bg-[#2563EB] rounded-full transition-all';
                } else {
                    dot.className = 'w-2 h-2 bg-gray-300 rounded-full transition-all';
                }
                progressDots.appendChild(dot);
            }
        }

        btnNext.addEventListener('click', () => {
            const currentInputs = slides[currentIndex].querySelectorAll('input[type="radio"]');
            let isChecked = false;
            currentInputs.forEach(input => { if(input.checked) isChecked = true; });

            if (!isChecked) {
                alert("Silakan pilih salah satu jawaban terlebih dahulu.");
                return;
            }

            if (currentIndex < totalQuestions - 1) {
                currentIndex++;
                updateUI();
            }
        });

        btnPrev.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateUI();
            }
        });

        function submitExam() {
            const currentInputs = slides[currentIndex].querySelectorAll('input[type="radio"]');
            let isChecked = false;
            currentInputs.forEach(input => { if(input.checked) isChecked = true; });

            if (!isChecked) {
                alert("Silakan pilih jawaban untuk soal terakhir ini.");
                return;
            }

            if(confirm('Yakin ingin menyelesaikan ujian? Anda tidak dapat mengubah jawaban setelah ini.')) {
                isExamFinished = true;
                testForm.submit();
            }
        }

        updateUI();


        // ==============================================
        // 2. SISTEM ANTI-CHEAT YANG DIPERBAIKI
        // ==============================================
        // ==============================================
        // 2. SISTEM ANTI-CHEAT YANG DIPERBAIKI
        // ==============================================
        let cheatCount = 0;
        const cheatInput = document.getElementById('cheatCount');
        let isExamFinished = false;

        let isAway = false; // <-- VARIABEL BARU: Kunci pelacak status

        const cheatToast = document.getElementById('cheatToast');
        const cheatToastText = document.getElementById('cheatToastText');
        let toastTimeout;

        function recordCheat(reason) {
            // Jika ujian selesai, ATAU kandidat sudah tercatat "keluar layar" (isAway = true), jangan hitung lagi
            if (isExamFinished || isAway) return;

            isAway = true; // Kunci aktif: tandai kandidat sedang di luar layar
            cheatCount++;
            cheatInput.value = cheatCount;

            cheatToastText.innerHTML = `Terdeteksi <b>${reason}</b>.<br>Pelanggaran ke-${cheatCount} dicatat oleh sistem.`;

            cheatToast.classList.remove('opacity-0', '-translate-y-10', 'pointer-events-none');
            cheatToast.classList.add('opacity-100', 'translate-y-0');

            clearTimeout(toastTimeout);
            toastTimeout = setTimeout(() => {
                cheatToast.classList.remove('opacity-100', 'translate-y-0');
                cheatToast.classList.add('opacity-0', '-translate-y-10', 'pointer-events-none');
            }, 4000);
        }

        // BUKA KUNCI KETIKA KANDIDAT KEMBALI FOKUS KE HALAMAN UJIAN
        window.addEventListener('focus', () => {
            isAway = false;
        });

        // Sensor 1: Ganti Tab Browser
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                recordCheat("Berpindah Tab Browser");
            } else {
                isAway = false; // Buka kunci saat tab kembali dibuka
            }
        });

        // Sensor 2: Buka Aplikasi Lain (Alt+Tab) / Minimalkan Browser
        window.addEventListener('blur', () => {
            recordCheat("Membuka Layar/Aplikasi Lain (Alt+Tab)");
        });

        // ==============================================
        // 3. LOGIKA WEBCAM
        // ==============================================
        const video = document.getElementById('webcamVideo');
        const camStatus = document.getElementById('camStatus');
        const webcamFallback = document.getElementById('webcamFallback');
        const btnStartCam = document.getElementById('btnStartCam');

        function startWebcam() {
            camStatus.innerText = "Meminta Izin Kamera...";

            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(function(stream) {
                        video.srcObject = stream;
                        video.classList.remove('hidden');
                        webcamFallback.classList.add('hidden');
                    })
                    .catch(function(err) {
                        camStatus.innerText = "Izin ditolak atau kamera tidak terdeteksi!";
                        camStatus.classList.replace('text-gray-500', 'text-red-500');
                        btnStartCam.classList.remove('hidden');
                    });
            } else {
                camStatus.innerHTML = "Webcam diblokir.<br><b class='text-red-500'>Akses via localhost.</b>";
            }
        }

        startWebcam();
        btnStartCam.addEventListener('click', startWebcam);


        // ==============================================
        // 4. TIMER OTOMATIS
        // ==============================================
        @if($assessment->duration > 0)
        let timeLeft = {{ $assessment->duration * 60 }};
        const timerDisplay = document.getElementById('timerDisplay');

        function updateTimer() {
            const hours = Math.floor(timeLeft / 3600);
            const minutes = Math.floor((timeLeft % 3600) / 60);
            const seconds = timeLeft % 60;

            timerDisplay.innerText =
                String(hours).padStart(2, '0') + ':' +
                String(minutes).padStart(2, '0') + ':' +
                String(seconds).padStart(2, '0');

            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                isExamFinished = true;
                alert("WAKTU HABIS! Sistem akan mengumpulkan jawaban Anda secara otomatis.");
                testForm.submit();
            } else {
                timeLeft--;
            }
        }

        updateTimer();
        const timerInterval = setInterval(updateTimer, 1000);
        @endif

    </script>
</body>
</html>
