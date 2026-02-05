<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Humania TalentMap</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
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

                <a href="#" class="flex items-center gap-3 px-4 py-3 bg-blue-700 rounded-lg text-white font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Undangan
                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                    Hasil
                </a>
            </nav>

            <div class="p-4 bg-blue-800">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-bold">
                        N
                    </div>
                    <div>
                        <p class="font-bold text-sm">Naufal</p>
                        <p class="text-xs text-blue-200 truncate w-32">naufal@email.com</p>
                    </div>
                </div>
                <button class="flex items-center gap-2 text-sm text-blue-200 hover:text-white transition w-full">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Keluar
                </button>
            </div>
        </aside>

        <main class="flex-1 ml-64 p-8">

            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 mb-8">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-blue-600 font-bold text-lg mb-1">Selamat Datang,</h2>
                        <h1 class="text-4xl font-bold text-gray-900 mb-4">Naufal!</h1>
                        <p class="text-gray-500 max-w-xl">
                            Selesaikan modul-modul assessment berikut untuk mengetahui potensi dan profil kepribadian Anda.
                        </p>
                    </div>
                    <span class="bg-blue-100 text-blue-700 px-4 py-1.5 rounded-full text-sm font-semibold">
                        7 Modul
                    </span>
                </div>
            </div>

            <div class="relative mb-8">
                <input type="text" placeholder="Cari berdasarkan code atau nama test"
                    class="w-full pl-12 pr-4 py-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-gray-600">
                <svg class="w-6 h-6 text-gray-400 absolute left-4 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col">
                    <div class="flex justify-between items-start mb-4">
                        <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">Test Code</span>
                        <span class="text-xs text-gray-500 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Tidak dibatasi
                        </span>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg mb-2 leading-tight">Tes Ketelitian & Konsistensi Kerja</h3>
                    <div class="mb-4">
                        <span class="border border-blue-500 text-blue-600 text-[10px] px-2 py-0.5 rounded-full font-medium">Sikap Kerja</span>
                    </div>
                    <p class="text-gray-500 text-sm mb-6 flex-grow">Mengukur ketelitian dan fokus.</p>
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition text-sm flex items-center justify-center gap-2">
                        Mulai Tes
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col">
                    <div class="flex justify-between items-start mb-4">
                        <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">Test Code</span>
                        <span class="text-xs text-gray-500 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Tidak dibatasi
                        </span>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg mb-2 leading-tight">Tes Penalaran & Problem Solving</h3>
                    <div class="mb-4">
                        <span class="border border-blue-500 text-blue-600 text-[10px] px-2 py-0.5 rounded-full font-medium">Kemampuan Kognitif</span>
                    </div>
                    <p class="text-gray-500 text-sm mb-6 flex-grow">Mengukur kemampuan logika dan penyelesaian masalah.</p>
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition text-sm flex items-center justify-center gap-2">
                        Mulai Tes
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col">
                    <div class="flex justify-between items-start mb-4">
                        <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">Test Code</span>
                        <span class="text-xs text-gray-500 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Tidak dibatasi
                        </span>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg mb-2 leading-tight">Tes Minat & Kecocokan Peran (RIASEC)</h3>
                    <div class="mb-4">
                        <span class="border border-blue-500 text-blue-600 text-[10px] px-2 py-0.5 rounded-full font-medium">Minat Karir</span>
                    </div>
                    <p class="text-gray-500 text-sm mb-6 flex-grow">Mengukur minat karir.</p>
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition text-sm flex items-center justify-center gap-2">
                        Mulai Tes
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>

            </div>

        </main>
    </div>

</body>
</html>
