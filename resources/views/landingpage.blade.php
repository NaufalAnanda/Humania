<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Humania TalentMap</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<script>
tailwind.config = {
    theme: {
        fontFamily: {
            inter: ['Inter', 'sans-serif']
        }
    }
}
</script>

<style>
html {
    scroll-behavior: smooth;
}
</style>
</head>

<body class="font-inter bg-slate-50 text-gray-800">

<!-- NAVBAR -->
<header id="navbar" class="fixed w-full top-0 z-50 transition-all duration-300">

    <div class="w-full px-10 py-4 flex justify-between items-center">

        <h1 class="text-xl font-bold">
            <span class="text-blue-600">Humania</span>TalentMap
        </h1>

        <div class="flex items-center gap-4">
            <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 transition">Sign In</a>
            <a href="{{ route('register') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                Get Started →
            </a>
        </div>

    </div>
</header>

<!-- HERO -->
<section class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-12 items-center">
    <div>
        <h2 class="text-4xl md:text-5xl font-bold leading-tight mb-10">
            Platform Pemetaan Talenta untuk
            <span class="text-blue-600">Rekrutmen</span> &
            <span class="text-blue-600">Pengembangan Tim</span>
        </h2>

<!-- HERO (1 FULL PAGE) -->
<section class="h-screen flex items-center relative overflow-hidden">

    <!-- Background Gradient Glow -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-blue-400 opacity-20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-400 opacity-20 rounded-full blur-3xl"></div>

    <div class="flex justify-center items-center flex-grow z-10">
    <img
        src="{{ asset('images/landingpage.png') }}"
        alt="Ilustrasi Dashboard Humania"
        class="w-3/4 max-w-md object-contain">
    </div>
</section>

<!-- WHY -->
<section class="bg-white py-20 mt-10">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h3 class="text-3xl font-bold mb-4">
            Mengapa Memilih Humania TalentMap?
        </h3>
        <p class="text-gray-500 mb-12">
            Solusi lengkap untuk keputusan rekrutmen berbasis data.
        </p>

            <p class="text-gray-600 text-lg">
                Evaluasi kandidat dengan modul psikotes komprehensif.
                Dapatkan skor instan, insight mendalam, dan panduan wawancara berbasis AI.
            </p>

            <div class="flex gap-4">
                <a href="{{ route('dashboard') }}"
                   class="bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition transform hover:scale-105">
                    Mulai Sekarang →
                </a>
            </div>
        </div>

        <!-- IMAGE -->
        <div class="relative">
            <img src="{{ asset('images/landingpage.png') }}"
                 class="rounded-2xl shadow-2xl hover:scale-105 transition duration-500"
                 alt="Team Analytics">

            <!-- Floating Card -->
            <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-xl shadow-lg">
                <p class="text-sm text-gray-500">Sudah Dipercaya Lebih dari 100 Perusahaan</p>
                <p class="text-2xl font-bold text-blue-600">99%</p>
            </div>
        </div>

    </div>
</section>


<!-- SCRIPT NAVBAR SCROLL EFFECT -->
<script>
const navbar = document.getElementById('navbar');

window.addEventListener('scroll', () => {
    if (window.scrollY > 20) {
        navbar.classList.add(
            'bg-white/70',
            'backdrop-blur-md',
            'shadow-sm'
        );
    } else {
        navbar.classList.remove(
            'bg-white/70',
            'backdrop-blur-md',
            'shadow-sm'
        );
    }
});
</script>

</body>
</html>

<!-- PAGE 2 - SERVICES -->
<section class="py-28 bg-blue-600 text-white">
  <div class="max-w-7xl mx-auto px-6">

    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold mb-4">
        Assessment Services by Humania
      </h2>
      <p class="text-blue-100 max-w-2xl mx-auto">
        Empat kategori tes utama untuk memahami kandidat secara menyeluruh,
        dari kemampuan berpikir hingga minat karir.
      </p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

      <!-- Cognitive -->
      <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl hover:bg-white/20 hover:-translate-y-2 transition duration-300">
        <div class="text-3xl mb-4"></div>
        <h3 class="text-xl font-semibold mb-3">Cognitive</h3>
        <p class="text-blue-100 text-sm">
          Mengukur kemampuan logika, numerik, verbal, dan problem solving
          untuk menilai kapasitas intelektual kandidat.
        </p>
      </div>

      <!-- Personality -->
      <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl hover:bg-white/20 hover:-translate-y-2 transition duration-300">
        <div class="text-3xl mb-4"></div>
        <h3 class="text-xl font-semibold mb-3">Personality</h3>
        <p class="text-blue-100 text-sm">
          Analisis karakter menggunakan pendekatan Big Five & DISC
          untuk memahami gaya kerja dan perilaku.
        </p>
      </div>

      <!-- Attitude -->
      <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl hover:bg-white/20 hover:-translate-y-2 transition duration-300">
        <div class="text-3xl mb-4"></div>
        <h3 class="text-xl font-semibold mb-3">Attitude</h3>
        <p class="text-blue-100 text-sm">
          Mengukur integritas, komitmen, etika kerja, dan tanggung jawab
          dalam lingkungan profesional.
        </p>
      </div>

      <!-- Interest -->
      <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl hover:bg-white/20 hover:-translate-y-2 transition duration-300">
        <div class="text-3xl mb-4"></div>
        <h3 class="text-xl font-semibold mb-3">Interest</h3>
        <p class="text-blue-100 text-sm">
          Menggali minat karir kandidat untuk memastikan kesesuaian
          dengan posisi dan pengembangan jangka panjang.
        </p>
      </div>

    </div>
  </div>
</section>

<!-- PAGE 3 - BENEFITS -->
<section class="py-28 bg-gray-50">
  <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">

    <div>
      <h2 class="text-4xl font-bold mb-6">
        Why Humania TalentMap?
      </h2>
      <p class="text-gray-600 mb-8">
        Kami membantu HR dan manajemen mengambil keputusan berbasis data
        dengan sistem assessment modern dan AI-powered insights.
      </p>

      <ul class="space-y-4 text-gray-700">
        <li>✔ Insight wawancara otomatis berbasis AI</li>
        <li>✔ Laporan instan & visualisasi profesional</li>
        <li>✔ Evaluasi objektif dan terukur</li>
        <li>✔ Sistem terintegrasi & scalable</li>
      </ul>
    </div>

    <div class="bg-white p-10 rounded-2xl shadow-xl hover:shadow-2xl transition duration-300">
      <h3 class="text-2xl font-bold text-blue-600 mb-4">
        AI Driven Recruitment Intelligence
      </h3>
      <p class="text-gray-600">
        Humania mengubah proses rekrutmen konvensional menjadi sistem
        berbasis teknologi yang cepat, akurat, dan dapat dipertanggungjawabkan.
      </p>
    </div>

  </div>
</section>

<!-- PAGE 4 - CTA -->
<section class="py-24 bg-gradient-to-r from-blue-700 to-blue-900 text-white text-center">
  <h2 class="text-4xl font-bold mb-6">
    Siap Meningkatkan Kualitas Rekrutmen Anda?
  </h2>
  <p class="max-w-2xl mx-auto mb-8 text-blue-100">
    Gunakan Humania TalentMap untuk mendapatkan kandidat terbaik
    dengan pendekatan assessment berbasis data dan AI.
  </p>
  <button class="bg-white text-blue-800 px-8 py-3 rounded-full font-semibold hover:scale-105 transition duration-300">
    Get Started Now
  </button>
</section>

<footer class="bg-blue-950 text-gray-400 py-12">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <h3 class="text-white font-bold mb-3 text-lg">Humania TalentMap</h3>
    <p class="text-sm mb-6">
      Platform assessment modern berbasis AI untuk keputusan rekrutmen yang lebih akurat dan objektif.
    </p>
    <p class="text-xs text-gray-500">
      © {{ date('Y') }} Humania TalentMap. All rights reserved.
    </p>
  </div>
</footer>
