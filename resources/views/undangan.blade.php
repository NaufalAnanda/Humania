<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Humania TalentMap | Undangan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    inter: ['Inter', 'sans-serif'],
                }
            }
        }
    </script>
</head>

<body class="font-inter bg-slate-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-blue-600 text-white flex flex-col justify-between">
        <div>
            <div class="px-6 py-6 font-bold text-xl">
                Humania<br>
                <span class="text-sm font-normal">TalentMap</span>
            </div>

                        <nav class="flex-1 px-4 space-y-2 mt-4">
                <p class="px-4 text-xs font-semibold text-blue-200 uppercase tracking-wider mb-2">MENU</p>

                <a href="dashboard" class="flex items-center gap-3 px-4 py-3 bg-blue-700 rounded-lg text-white font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>

                <a href="undangan" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Undangan
                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                    Hasil
                </a>
            </nav>
        </div>

        <div class="px-6 py-6 border-t border-blue-500">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-full bg-white text-blue-600 flex items-center justify-center font-bold">
                    N
                </div>
                <div>
                    <p class="font-semibold text-sm">Naufal</p>
                    <p class="text-xs text-blue-100">naufalananda@gmail.com</p>
                </div>
            </div>
            <a href="#" class="text-sm hover:underline">Keluar</a>
        </div>
    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-8">

        <!-- HEADER -->
        <div class="bg-white rounded-xl shadow p-6 mb-6 flex justify-between items-center">
            <div>
                <p class="text-blue-600 font-semibold">Selamat Datang,</p>
                <h1 class="text-2xl font-bold">Naufal!</h1>
                <p class="text-gray-500 mt-1">
                    Selesaikan modul-modul assessment berikut untuk mengetahui potensi dan profil kepribadian Anda.
                </p>
            </div>
            <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm font-semibold">
                7 Modul
            </span>
        </div>

        <!-- DAFTAR UNDANGAN -->
        <div class="bg-white rounded-xl shadow p-6">

            <h2 class="text-lg font-bold mb-4">Daftar Undangan</h2>

            <!-- SEARCH -->
            <div class="mb-4">
                <input type="text"
                       placeholder="Cari berdasarkan code atau nama test"
                       class="w-full px-5 py-3 rounded-full border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <!-- FILTER -->
            <div class="bg-gray-200 rounded-full p-1 flex text-sm mb-6">
                <button class="flex-1 bg-white rounded-full py-2 font-semibold">Semua</button>
                <button class="flex-1 py-2 text-gray-600">Akan Datang</button>
                <button class="flex-1 py-2 text-gray-600">Berlangsung</button>
                <button class="flex-1 py-2 text-gray-600">Selesai</button>
                <button class="flex-1 py-2 text-gray-600">Terlambat</button>
            </div>

            <!-- TABLE -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b text-gray-500 text-left">
                            <th class="py-3">Nama test</th>
                            <th>Code test</th>
                            <th>Jadwal</th>
                            <th>Status</th>
                            <th>Hasil</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">

                         <!-- BELUM DIKERJAKAN -->
                    <tr>
                            <td class="py-4">
                                Tes Ketelitian & Konsistensi Kerja
                            </td>
                            <td class="text-gray-500">GRQ0HG</td>
                            <td class="text-gray-500 text-xs">
                                Mulai: 19/01/26 11:00<br>
                                Selesai: 19/01/26 11:20
                            </td>
                            <td>
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">
                                    Belum dikerjakan
                                </span>
                            </td>
                            <td>
                                <a href="#"
                                class="bg-blue-600 text-white px-4 py-2 rounded-full text-xs hover:bg-blue-700 transition">
                                    Mulai Test
                                </a>
                            </td>
                        </tr>

                        <!-- SUDAH DIKERJAKAN - LOLOS -->
                        <tr>
                            <td class="py-4">
                                Tes Sikap & Tanggung Jawab Kerja
                            </td>
                            <td class="text-gray-500">GRKQHG</td>
                            <td class="text-gray-500 text-xs">
                                Mulai: 19/01/26 11:20<br>
                                Selesai: 19/01/26 11:40
                            </td>
                            <td>
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                                    Selesai
                                </span>
                            </td>
                            <td>
                                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs">
                                    Lolos
                                </span>
                            </td>
                        </tr>

                        <!-- SUDAH DIKERJAKAN - TIDAK LOLOS -->
                        <tr>
                            <td class="py-4">
                                Tes Kepribadian Dasar
                            </td>
                            <td class="text-gray-500">TRP9AA</td>
                            <td class="text-gray-500 text-xs">
                                Mulai: 18/01/26 10:00<br>
                                Selesai: 18/01/26 10:30
                            </td>
                            <td>
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                                    Selesai
                                </span>
                            </td>
                            <td>
                                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs">
                                    Tidak Lolos
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </main>

</div>

</body>
</html>
