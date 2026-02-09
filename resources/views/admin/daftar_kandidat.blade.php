<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kandidat - Admin Humania</title>
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

                <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Overview
                </a>

                <a href="daftar_kandidat" class="flex items-center gap-3 px-4 py-3 bg-blue-700 rounded-lg text-white font-medium transition shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Daftar Kandidat
                </a>

                <a href="buat_assesment" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
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
                <a href="#" class="flex items-center gap-2 text-sm text-blue-200 hover:text-white transition w-full">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Keluar
                </a>
            </div>
        </aside>

        <main class="flex-1 ml-64 p-8">

            <div class="flex justify-between items-start mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Daftar Kandidat</h1>
                    <p class="text-gray-500 mt-1">Lihat semua kandidat dan hasil assesment.</p>
                </div>
                <span class="bg-green-100 text-green-700 px-4 py-1.5 rounded-full text-sm font-semibold flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    2 Kandidat
                </span>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="font-bold text-gray-800">Semua Kandidat</h3>
                </div>

                <div class="grid grid-cols-12 gap-4 px-6 py-3 bg-white border-b border-gray-100 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                    <div class="col-span-1">Rank</div>
                    <div class="col-span-4">Kandidat</div>
                    <div class="col-span-2">Modul</div>
                    <div class="col-span-2">Skor</div>
                    <div class="col-span-2">Status</div>
                    <div class="col-span-1 text-right">Aksi</div>
                </div>

                <div class="divide-y divide-gray-100">

                    <div class="grid grid-cols-12 gap-4 px-6 py-4 items-center hover:bg-gray-50 transition">
                        <div class="col-span-1">
                            <div class="w-8 h-8 rounded-full bg-yellow-400 text-white font-bold flex items-center justify-center shadow-sm">
                                1
                            </div>
                        </div>

                        <div class="col-span-4">
                            <h4 class="font-bold text-gray-900">Kandidat</h4>
                            <p class="text-gray-500 text-sm">naufalananda79@gmail.com</p>
                        </div>

                        <div class="col-span-2">
                            <span class="font-semibold text-gray-900">2</span> <span class="text-gray-500 text-sm">selesai</span>
                        </div>

                        <div class="col-span-2 flex items-center gap-2">
                            <span class="font-bold text-gray-900">80</span>
                            <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-0.5 rounded">HIGH</span>
                        </div>

                        <div class="col-span-2">
                            <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">
                                Sudah Tes
                            </span>
                        </div>

                        <div class="col-span-1 text-right">
                            <button class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-1.5 rounded-lg text-xs font-semibold transition flex items-center gap-1 ml-auto">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                Detail
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-4 px-6 py-4 items-center hover:bg-gray-50 transition">
                        <div class="col-span-1">
                            <span class="text-gray-300 text-sm font-medium ml-2">-</span>
                        </div>

                        <div class="col-span-4">
                            <h4 class="font-bold text-gray-900">Naufal</h4>
                            <p class="text-gray-500 text-sm">hungrystar07@gmail.com</p>
                        </div>

                        <div class="col-span-2">
                            <span class="font-semibold text-gray-900">0</span> <span class="text-gray-500 text-sm">selesai</span>
                        </div>

                        <div class="col-span-2">
                            <span class="text-gray-400 text-sm">-</span>
                        </div>

                        <div class="col-span-2">
                            <span class="bg-gray-200 text-gray-500 text-xs font-semibold px-3 py-1 rounded-full">
                                Belum Tes
                            </span>
                        </div>

                        <div class="col-span-1 text-right">
                            <button class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-1.5 rounded-lg text-xs font-semibold transition flex items-center gap-1 ml-auto">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                Detail
                            </button>
                        </div>
                    </div>

                </div>
            </div>

        </main>
    </div>

</body>
</html>
