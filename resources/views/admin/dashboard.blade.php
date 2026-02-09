<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Humania</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-[#F3F4F6]">

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
                <p class="px-4 text-xs font-semibold text-blue-200 uppercase tracking-wider mb-2">MENU ADMIN</p>

                <a href="dashboard" class="flex items-center gap-3 px-4 py-3 bg-blue-700 rounded-lg text-white font-medium transition shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Overview
                </a>

                <a href="{{ url('/admin/daftar_kandidat') }}" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Daftar Kandidat
                </a>

                <a href="{{ url('/admin/buat_assesment') }}" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Buat Assesment
                </a>
            </nav>

            <div class="p-4 bg-blue-800">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-bold border-2 border-white">A</div>
                    <div>
                        <p class="font-bold text-sm">Naufal</p>
                        <p class="text-xs text-blue-200">Administrator</p>
                    </div>
                </div>
                <a href="#" class="flex items-center gap-2 text-sm text-blue-200 hover:text-white transition w-full group">
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Keluar
                </a>
            </div>
        </aside>

        <main class="flex-1 ml-64 p-8">

            <div class="flex justify-between items-end mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Dashboard Admin</h1>
                    <p class="text-gray-500 mt-1">Kelola assesment dan lihat hasil kandidat.</p>
                </div>
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-semibold flex items-center gap-2 transition shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Buat Assesment
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex items-center gap-4">
                    <div class="p-4 bg-blue-50 text-blue-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Kandidat</p>
                        <p class="text-3xl font-bold text-gray-900">1</p> </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex items-center gap-4">
                    <div class="p-4 bg-green-50 text-green-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Assesment Selesai</p>
                        <p class="text-3xl font-bold text-gray-900">1</p> </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex items-center gap-4">
                    <div class="p-4 bg-purple-50 text-purple-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Modul Aktif</p>
                        <p class="text-3xl font-bold text-gray-900">2</p> </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <a href="{{ url('/admin/daftar_kandidat') }}" class="bg-white p-8 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition flex items-center gap-6 group">
                    <div class="p-4 bg-blue-50 text-blue-600 rounded-xl group-hover:bg-blue-600 group-hover:text-white transition">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-xl">Lihat Kandidat</h3>
                        <p class="text-gray-500 text-sm mt-1">Lihat daftar kandidat, hasil tes, dan ranking.</p>
                    </div>
                </a>

                <a href="#" class="bg-white p-8 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition flex items-center gap-6 group">
                    <div class="p-4 bg-green-50 text-green-600 rounded-xl group-hover:bg-green-600 group-hover:text-white transition">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-xl">Buat Assesment</h3>
                        <p class="text-gray-500 text-sm mt-1">Tambahkan modul tes baru dengan pertanyaan.</p>
                    </div>
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gray-100 px-6 py-4 border-b border-gray-200">
                    <h3 class="font-bold text-gray-800">Modul Assesment Aktif</h3>
                </div>

                <div class="divide-y divide-gray-100">
                    <div class="p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <div class="flex items-start gap-4">
                            <span class="bg-blue-100 text-blue-700 font-bold px-3 py-1 rounded text-sm mt-1">
                                COG-01
                            </span>
                            <div>
                                <h4 class="font-bold text-gray-900 text-lg">Tes Penalaran & Problem Solving Kerja</h4>
                                <p class="text-gray-500 text-sm mt-1">Mengukur kemampuan logika dan penyelesaian masalah.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-8">
                            <span class="text-gray-400 text-sm font-medium">Cognitive</span>
                            <span class="text-gray-400 text-sm">0 Menit</span>
                            <div class="flex gap-4">
                                <button class="text-blue-600 hover:text-blue-800 font-medium text-sm">Edit</button>
                                <button class="text-gray-400 hover:text-red-600 font-medium text-sm">Hapus</button>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <div class="flex items-start gap-4">
                            <span class="bg-blue-100 text-blue-700 font-bold px-3 py-1 rounded text-sm mt-1">
                                ATT-01
                            </span>
                            <div>
                                <h4 class="font-bold text-gray-900 text-lg">Tes Ketelitian & Konsistensi Kerja</h4>
                                <p class="text-gray-500 text-sm mt-1">Mengukur kemampuan ketelitian dan fokus kerja.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-8">
                            <span class="text-gray-400 text-sm font-medium">Attitude</span>
                            <span class="text-gray-400 text-sm">0 Menit</span>
                            <div class="flex gap-4">
                                <button class="text-blue-600 hover:text-blue-800 font-medium text-sm">Edit</button>
                                <button class="text-gray-400 hover:text-red-600 font-medium text-sm">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>

</body>
</html>
