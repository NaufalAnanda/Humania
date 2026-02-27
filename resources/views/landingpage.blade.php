<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - Humania TalentMap</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        html { scroll-behavior: smooth; }
    </style>
</head>

<body class="bg-slate-50 text-gray-800">

    <header id="navbar" class="fixed w-full top-0 z-50 transition-all duration-300">
        <div class="w-full px-10 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold ml-8">
                <span class="text-blue-600">Humania</span>TalentMap
            </h1>
            <div class="flex items-center gap-4">
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 transition">Sign In</a>
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                    Sign Up
                </a>
            </div>
        </div>
    </header>

    <section class="min-h-screen max-w-8xl mx-auto px-6 pt-32 pb-20 grid md:grid-cols-2 gap-12 items-center relative overflow-hidden">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-blue-400 opacity-20 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-400 opacity-20 rounded-full blur-3xl -z-10"></div>

        <div class="z-10">
            <h2 class="text-4xl md:text-5xl font-bold leading-tight mb-10 ml-9">
                Platform Pemetaan Talenta untuk
                <span class="text-blue-600">Rekrutmen</span> &
                <span class="text-blue-600">Pengembangan Tim</span>

            </h2>
            <a href="{{ route('dashboard') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition transform hover:scale-105 ml-9">
                        Mulai Sekarang →
                    </a>
        </div>

        <div class="flex justify-center items-center z-10">
            <img src="{{ asset('images/landingpage.png') }}" alt="Ilustrasi Dashboard Humania" class="w-3/4 max-w-md object-contain hover:scale-105 transition duration-500">
        </div>
    </section>

    <section class="py-28 bg-blue-600 text-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Assessment Services by Humania</h2>
                <p class="text-blue-100 max-w-2xl mx-auto">
                    Empat kategori tes utama untuk memahami kandidat secara menyeluruh, dari kemampuan berpikir hingga minat karir.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl hover:bg-white/20 hover:-translate-y-2 transition duration-300">
                    <h3 class="text-xl font-semibold mb-3">Cognitive</h3>
                    <p class="text-blue-100 text-sm">Mengukur kemampuan logika, numerik, verbal, dan problem solving untuk menilai kapasitas intelektual kandidat.</p>
                </div>

                <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl hover:bg-white/20 hover:-translate-y-2 transition duration-300">
                    <h3 class="text-xl font-semibold mb-3">Personality</h3>
                    <p class="text-blue-100 text-sm">Analisis karakter menggunakan pendekatan Big Five & DISC untuk memahami gaya kerja dan perilaku.</p>
                </div>

                <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl hover:bg-white/20 hover:-translate-y-2 transition duration-300">
                    <h3 class="text-xl font-semibold mb-3">Attitude</h3>
                    <p class="text-blue-100 text-sm">Mengukur integritas, komitmen, etika kerja, dan tanggung jawab dalam lingkungan profesional.</p>
                </div>

                <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl hover:bg-white/20 hover:-translate-y-2 transition duration-300">
                    <h3 class="text-xl font-semibold mb-3">Interest</h3>
                    <p class="text-blue-100 text-sm">Menggali minat karir kandidat untuk memastikan kesesuaian dengan posisi dan pengembangan jangka panjang.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-28 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-bold mb-6">Why Humania TalentMap?</h2>
                <p class="text-gray-600 mb-8">
                    Kami membantu HR dan manajemen mengambil keputusan berbasis data dengan sistem assessment modern dan AI-powered insights.
                </p>
                <ul class="space-y-4 text-gray-700">
                    <li>✔ Insight wawancara otomatis berbasis AI</li>
                    <li>✔ Laporan instan & visualisasi profesional</li>
                    <li>✔ Evaluasi objektif dan terukur</li>
                    <li>✔ Sistem terintegrasi & scalable</li>
                </ul>
            </div>
            <div class="bg-white p-10 rounded-2xl shadow-xl hover:shadow-2xl transition duration-300">
                <h3 class="text-2xl font-bold text-blue-600 mb-4">AI Driven Recruitment Intelligence</h3>
                <p class="text-gray-600">
                    Humania mengubah proses rekrutmen konvensional menjadi sistem berbasis teknologi yang cepat, akurat, dan dapat dipertanggungjawabkan.
                </p>
            </div>
        </div>
    </section>

    <footer class="bg-blue-700 text-white py-12">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h3 class="text-white font-bold mb-3 text-lg">Humania TalentMap</h3>
            <p class="text-sm mb-6">
                Platform assessment modern berbasis AI untuk keputusan rekrutmen yang lebih akurat dan objektif.
            </p>
            <p class="text-xs text-white">
                © {{ date('Y') }} Humania TalentMap. All rights reserved.
            </p>
        </div>
    </footer>

    <script>
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            navbar.classList.add('bg-white/70', 'backdrop-blur-md', 'shadow-sm');
        } else {
            navbar.classList.remove('bg-white/70', 'backdrop-blur-md', 'shadow-sm');
        }
    });
    </script>

</body>
</html>
