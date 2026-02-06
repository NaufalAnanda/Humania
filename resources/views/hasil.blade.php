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

                <a href="dashboard" class="flex items-center gap-3 px-4 py-3 hover:bg-blue-600 rounded-lg text-white font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>

                <a href="undangan" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Undangan
                </a>

                <a href="hasil" class="flex items-center gap-3 px-4 py-3 text-blue-100 bg-blue-700 hover:text-white rounded-lg font-medium transition">
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
                        <p class="text-xs text-blue-200 truncate w-32">naufal@gmail.com</p>
                    </div>
                </div>
                <button class="flex items-center gap-2 text-sm text-blue-200 hover:text-white transition w-full">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Keluar
                </button>
            </div>
        </aside>

        <!-- MAIN -->
    <main class="flex-1 ml-64 p-8">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold">Hasil Assessment</h1>
                <p class="text-gray-500">Analisis detail hasil assessment Anda.</p>
            </div>

            <button class="bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-600">
                Download Laporan PDF
            </button>
        </div>

        <!-- CARD -->
        <div class="bg-white rounded-2xl shadow p-8">

            <!-- AI HEADER -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-xl font-bold">Hasil Tes Ketelitian & Konsistensi Kerja</h2>
                    <p class="text-sm text-gray-500">
                        <span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                        Dihasilkan oleh Gemini AI
                    </p>
                </div>

                <button class="toggle-btn">
                    ⌄
                </button>
            </div>

            <!-- CONTENT -->
            <div class="space-y-6 result-content">

                <!-- RINGKASAN -->
                <div class="bg-blue-50 rounded-xl p-6">
                    <h3 class="font-semibold mb-2">Ringkasan Profil</h3>
                    <p class="text-gray-600 text-sm">
                        Kandidat menunjukkan profil yang sangat unggul dalam kapasitas kognitif
                        dan eksekusi kerja, dengan penalaran tajam dan konsistensi tinggi.
                    </p>
                </div>

                <!-- GRID -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="bg-green-50 rounded-xl p-6">
                        <h3 class="font-semibold mb-2 text-green-700">Kekuatan Utama</h3>
                        <p class="text-sm text-gray-600">
                            Analitis kuat, fokus tinggi, cepat memahami pola.
                        </p>
                    </div>

                    <div class="bg-orange-50 rounded-xl p-6">
                        <h3 class="font-semibold mb-2 text-orange-700">Area Pengembangan</h3>
                        <p class="text-sm text-gray-600">
                            Manajemen stres dan pengambilan keputusan di bawah tekanan.
                        </p>
                    </div>

                </div>

                <!-- REKOMENDASI -->
                <div class="bg-slate-50 rounded-xl p-6">
                    <h3 class="font-semibold mb-2">Rekomendasi Posisi</h3>
                    <p class="text-sm text-gray-600">
                        Data Analyst, Quality Assurance, Research Assistant.
                    </p>
                </div>

                <!-- WAWANCARA -->
                <div class="bg-slate-50 rounded-xl p-6">
                    <h3 class="font-semibold mb-2">Panduan Wawancara</h3>
                    <p class="text-sm text-gray-600">
                        Fokuskan pada studi kasus, problem solving, dan simulasi kerja nyata.
                    </p>
                </div>

            </div>
        </div>

    </main>
</div>

<!-- SCRIPT -->
<script>
document.querySelectorAll('.toggle-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const content = document.querySelector('.result-content');
        content.classList.toggle('hidden');
        btn.innerHTML = content.classList.contains('hidden') ? '⌃' : '⌄';
    });
});
</script>

</body>
</html>