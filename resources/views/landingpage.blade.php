<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Humania TalentMap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    inter: ['Inter', 'sans-serif']
                }
            }
        }
    </script>
</head>

<body class="font-inter bg-slate-50 text-gray-800">

<!-- NAVBAR -->
<header class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">
            <span class="text-blue-600">Humania</span>TalentMap
        </h1>

        <div class="flex items-center gap-6">
<<<<<<< HEAD
            <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600">Sign In</a>
            <a href="#" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
=======
            <a href="login" class="text-gray-600 hover:text-blue-600">Sign In</a>
            <a href="register" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
>>>>>>> 5b67205fcf951de1bd6257184c1a5e320646e0b6
                Sign Up
            </a>
        </div>
    </div>
</header>

<!-- HERO -->
<section class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-12 items-center">
    <div>
        <h2 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
            Platform Pemetaan Talenta untuk
            <span class="text-blue-600">Rekrutmen</span> &
            <span class="text-blue-600">Pengembangan Tim</span>
        </h2>

        <p class="text-gray-600 mb-8">
            Evaluasi kandidat dengan modul psikotes komprehensif.
            Dapatkan skor instan, insight mendalam, dan panduan wawancara oleh AI.
        </p>

        <div class="flex gap-4">
            <a href="#" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700 transition">
                Mulai Sekarang →
            </a>
            <a href="#" class="border border-blue-600 text-blue-600 px-6 py-3 rounded-lg font-medium hover:bg-blue-50 transition">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </div>

    <!-- IMAGE -->
    <div class="flex justify-center items-center flex-grow z-10">
<<<<<<< HEAD
    <img
        src="{{ asset('images/dashboard.png') }}"
        alt="Ilustrasi Dashboard Humania"
        class="w-3/4 max-w-md object-contain"
    >
</div>
=======
        <img 
            src="{{ asset('images/landingpage.png') }}" 
            alt="Ilustrasi Landing Page Humania" 
            class="w-3/4 max-w-md object-contain"
        >
    </div>
>>>>>>> 5b67205fcf951de1bd6257184c1a5e320646e0b6
</section>

<!-- WHY -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h3 class="text-3xl font-bold mb-4">
            Mengapa Memilih Humania TalentMap?
        </h3>
        <p class="text-gray-500 mb-12">
            Solusi lengkap untuk keputusan rekrutmen berbasis data.
        </p>

        <div class="grid md:grid-cols-3 gap-8 text-left">
            <div class="bg-slate-50 p-8 rounded-2xl shadow-sm hover:shadow-md transition">
                <h4 class="font-semibold text-lg mb-3">Multi-Modul Assessment</h4>
                <p class="text-gray-600">
                    Tes kognitif, kepribadian (Big Five & DISC), minat kerja,
                    dan sikap dalam satu platform terintegrasi.
                </p>
            </div>

            <div class="bg-slate-50 p-8 rounded-2xl shadow-sm hover:shadow-md transition">
                <h4 class="font-semibold text-lg mb-3">Analisis AI Gemini</h4>
                <p class="text-gray-600">
                    Lebih dari sekadar skor. AI menghasilkan insight naratif
                    dan pertanyaan wawancara yang dipersonalisasi.
                </p>
            </div>

            <div class="bg-slate-50 p-8 rounded-2xl shadow-sm hover:shadow-md transition">
                <h4 class="font-semibold text-lg mb-3">Laporan Instan</h4>
                <p class="text-gray-600">
                    Visualisasi data yang mudah dipahami dengan skor per dimensi
                    dan kategori langsung setelah assessment.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="bg-blue-600 py-20 text-center text-white">
    <h3 class="text-3xl font-bold mb-4">
        Siap Meningkatkan Proses Rekrutmen Anda?
    </h3>
    <p class="max-w-2xl mx-auto text-blue-100">
        Bergabung dengan tim HR modern yang menggunakan data dan AI
        untuk keputusan rekrutmen yang lebih baik.
    </p>
</section>

<!-- FOOTER -->
<footer class="bg-blue-800 text-white text-center py-5">
    © {{ date('Y') }} Humania TalentMap. All rights reserved.
</footer>

</body>
</html>
