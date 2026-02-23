<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kandidat - Humania</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        body.modal-open { overflow: hidden; } /* Cegah scroll saat pop-up terbuka */
    </style>
</head>
<body class="bg-[#F8FAFC]">

    <div class="flex min-h-screen">

        <aside class="w-64 bg-[#2563EB] text-white flex flex-col fixed h-full left-0 top-0 z-50">
            <div class="p-8">
                <h1 class="text-2xl font-bold tracking-wide">Humania</h1>
                <p class="text-blue-200 text-sm">TalentMap</p>
            </div>

            <nav class="flex-1 px-4 space-y-2 mt-4">
                <p class="px-4 text-xs font-semibold text-blue-200 uppercase tracking-wider mb-2">MENU</p>

                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 bg-blue-700 rounded-lg text-white font-medium transition shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>

                <a href="{{ route('undangan') }}" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Undangan
                </a>

                <a href="{{ route('hasil') }}" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    Hasil
                </a>
            </nav>

            @if(Auth::user()->role === 'admin')
            <div class="px-4 mb-4 pt-4 border-t border-blue-700/50">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 text-blue-300 hover:text-white transition group">
                    <svg class="w-4 h-4 group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span class="text-xs font-bold tracking-wide uppercase">Kembali ke Admin</span>
                </a>
            </div>
            @endif

            <div class="p-4 bg-blue-800 mt-auto">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-bold border-2 border-white">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="font-bold text-sm">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-blue-200 truncate w-32">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 text-sm text-blue-200 hover:text-white transition w-full group">
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 ml-64 p-8">

            @if($errors->any())
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg flex items-center gap-3 shadow-sm animate-pulse" role="alert">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div>
                    <strong class="font-bold block">Akses Ditolak!</strong>
                    <span class="block text-sm">{{ $errors->first() }}</span>
                </div>
            </div>
            @endif

            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 mb-8 flex justify-between items-start">
                <div>
                    <h2 class="text-blue-600 font-bold text-lg mb-1">Selamat Datang,</h2>
                    <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ Auth::user()->name }}!</h1>
                    <p class="text-gray-500 max-w-xl">
                        Silakan pilih tes yang tersedia di bawah ini untuk memulai proses assessment Anda.
                    </p>
                </div>
                <span class="bg-gray-100 text-gray-500 px-4 py-1.5 rounded-full text-sm font-semibold">
                    {{ $assessments->count() }} Modul
                </span>
            </div>

            <div class="relative mb-8">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </span>
                <input type="text" placeholder="Cari berdasarkan code atau nama test" class="w-full pl-10 pr-4 py-3 bg-white border border-gray-200 rounded-lg outline-none text-gray-600 focus:ring-2 focus:ring-blue-500 transition shadow-sm">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse($assessments as $test)
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition p-6 flex flex-col h-full group relative">

                    <div class="flex justify-between items-start mb-4">
                        <span class="bg-blue-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider group-hover:bg-blue-700 transition">
                            {{ $test->module_id }}
                        </span>
                        <div class="flex items-center gap-1 text-gray-400 text-xs font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $test->duration > 0 ? $test->duration . ' Menit' : 'Tidak dibatasi' }}
                        </div>
                    </div>

                    <h3 class="text-lg font-bold text-gray-900 leading-snug mb-2 group-hover:text-blue-600 transition">{{ $test->title }}</h3>

                    <div class="mb-4">
                        <span class="inline-block border border-blue-200 text-blue-600 text-[10px] font-bold px-2 py-0.5 rounded uppercase">
                            {{ $test->category }}
                        </span>
                    </div>

                    <p class="text-gray-500 text-sm leading-relaxed mb-6 flex-1 line-clamp-3">
                        {{ $test->description }}
                    </p>

                    <button onclick="openModal('modal-{{ $test->id }}')" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg text-center transition shadow-lg shadow-blue-100 flex items-center justify-center gap-2 mt-auto">
                        Mulai Tes
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>

                <div id="modal-{{ $test->id }}" class="hidden fixed inset-0 z-[100] bg-gray-900/70 backdrop-blur-sm flex items-center justify-center p-4 transition-opacity">
                    <div class="bg-white rounded-2xl w-full max-w-md shadow-2xl overflow-hidden transform scale-95 transition-transform duration-300">

                        <div class="bg-blue-600 p-6 text-white relative">
                            <button onclick="closeModal('modal-{{ $test->id }}')" class="absolute top-4 right-4 text-blue-200 hover:text-white transition">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                            <span class="bg-white/20 text-white text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wider mb-2 inline-block">
                                {{ $test->module_id }}
                            </span>
                            <h3 class="font-bold text-xl leading-tight">{{ $test->title }}</h3>
                        </div>

                        <div class="p-6">
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="bg-blue-50 p-3 rounded-xl border border-blue-100 text-center">
                                    <p class="text-[10px] text-gray-500 font-bold uppercase mb-1 tracking-wider">Durasi</p>
                                    <p class="font-bold text-blue-700">{{ $test->duration > 0 ? $test->duration . ' Menit' : 'Bebas' }}</p>
                                </div>
                                <div class="bg-blue-50 p-3 rounded-xl border border-blue-100 text-center">
                                    <p class="text-[10px] text-gray-500 font-bold uppercase mb-1 tracking-wider">Total Soal</p>
                                    <p class="font-bold text-blue-700">{{ $test->questions_count ?? 0 }} Soal</p>
                                </div>
                            </div>

                            <p class="text-sm text-gray-600 mb-5 text-center px-4">
                                Masukkan <b>Token Akses (6 Karakter)</b> yang diberikan oleh Admin untuk membuka soal.
                            </p>

                            <form action="{{ route('kandidat.verify_token', $test->id) }}" method="POST">
                                @csrf
                                <div class="mb-6">
                                    <input type="text" name="token" required autocomplete="off"
                                        class="w-full border-2 border-gray-200 focus:border-blue-500 rounded-xl p-4 text-center text-2xl font-mono uppercase tracking-[0.4em] text-gray-800 outline-none transition placeholder:text-gray-300 placeholder:tracking-normal"
                                        placeholder="X7K9P2" maxlength="6">
                                </div>

                                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 rounded-xl transition shadow-lg shadow-blue-200 flex items-center justify-center gap-2">
                                    Konfirmasi & Mulai
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                @empty

                <div class="col-span-full flex flex-col items-center justify-center py-20 px-4 bg-white rounded-xl shadow-sm border border-dashed border-gray-300 text-center">
                    <div class="bg-blue-50 p-6 rounded-full mb-6">
                        <svg class="w-16 h-16 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Belum Ada Assessment</h3>
                    <p class="text-gray-500 text-lg max-w-md mx-auto mb-8 leading-relaxed">
                        Saat ini belum ada tugas tes yang diberikan oleh admin. Mohon cek kembali secara berkala.
                    </p>
                    <button onclick="window.location.reload()" class="px-6 py-3 bg-white border border-gray-300 hover:bg-gray-50 hover:border-gray-400 text-gray-700 font-semibold rounded-lg transition shadow-sm flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        Muat Ulang Halaman
                    </button>
                </div>

                @endforelse

            </div>

        </main>
    </div>

    <script>
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            const modalInner = modal.querySelector('div.scale-95');

            modal.classList.remove('hidden');
            document.body.classList.add('modal-open');

            setTimeout(() => {
                modalInner.classList.remove('scale-95');
                modalInner.classList.add('scale-100');
            }, 10);
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            const modalInner = modal.querySelector('div.scale-100');

            if(modalInner) {
                modalInner.classList.remove('scale-100');
                modalInner.classList.add('scale-95');
            }

            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.classList.remove('modal-open');
            }, 200);
        }
    </script>
</body>
</html>
