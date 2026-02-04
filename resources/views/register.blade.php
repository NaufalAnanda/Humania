<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Humania TalentMap - Daftar</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body>

<div class="flex min-h-screen">

    <!-- LEFT SIDE -->
    <div class="hidden lg:flex w-1/2 bg-[#2563EB] flex-col justify-between px-12 py-12 relative overflow-hidden">
        <h2 class="text-2xl font-bold text-white z-10">Humania TalentMap</h2>

        <div class="flex justify-center items-center flex-grow z-10">
            <img src="{{ asset('images/login.png') }}"
                 alt="Ilustrasi Humania"
                 class="w-3/4 max-w-md object-contain">
        </div>

        <div class="z-10 text-center">
            <h1 class="text-3xl font-bold text-white mb-3">
                Temukan Potensi Terbaikmu
            </h1>
            <p class="text-blue-100 text-lg max-w-lg mx-auto">
                Platform assessment cerdas untuk memetakan bakat dan kepribadian profesional secara akurat.
            </p>
        </div>
    </div>

    <!-- RIGHT SIDE -->
    <div class="w-full lg:w-1/2 bg-[#F8FAFC] flex items-center justify-center p-8">
        <div class="w-full max-w-md">

            <!-- TITLE -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Mulai Sekarang</h2>
                <p class="text-gray-600">Buat akun baru dalam hitungan detik.</p>
            </div>

            <!-- SWITCH -->
            <div class="bg-gray-200 p-1 rounded-lg flex mb-8">
                <a href="{{ route('login') }}"
                   class="w-1/2 py-2.5 text-center rounded-md text-gray-500 font-medium hover:text-gray-700 text-sm">
                    Masuk
                </a>

                <button
                    class="w-1/2 py-2.5 rounded-md bg-white text-blue-600 font-semibold shadow-sm text-sm">
                    Daftar
                </button>
            </div>

            <!-- FORM REGISTER -->
            <form action="" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-gray-500 mb-2">
                        Nama Lengkap
                    </label>
                    <input type="text" name="name" required
                           class="w-full px-4 py-3 bg-[#F1F5F9] border border-gray-300 rounded-lg
                                  focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-500 mb-2">
                        Email
                    </label>
                    <input type="email" name="email" required
                           class="w-full px-4 py-3 bg-[#F1F5F9] border border-gray-300 rounded-lg
                                  focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-500 mb-2">
                        Password
                    </label>
                    <input type="password" name="password" required
                           class="w-full px-4 py-3 bg-[#F1F5F9] border border-gray-300 rounded-lg
                                  focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <button type="submit"
                        class="w-full bg-[#2563EB] hover:bg-blue-700 text-white font-semibold
                               py-3.5 rounded-lg flex items-center justify-center gap-2 mt-4">
                    Buat Akun Baru
                    <span>→</span>
                </button>
            </form>

        </div>
    </div>

</div>

</body>
</html>
