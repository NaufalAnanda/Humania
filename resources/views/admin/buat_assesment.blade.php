<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($assessment) ? 'Edit Assesment' : 'Buat Assesment Baru' }} - Humania Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-[#F3F4F6]">

    @php
        $isEdit = isset($assessment);
        $title = $isEdit ? 'Edit Modul Assesment' : 'Buat Assesment Baru';
        $desc = $isEdit ? 'Perbarui informasi modul tes ini.' : 'Buat modul tes baru untuk kandidat.';
        $route = $isEdit ? route('admin.assessment.update', $assessment->id) : route('admin.assessment.store');
        $btnText = $isEdit ? 'Simpan Perubahan' : '+ Buat Assesment';
        $btnColor = $isEdit ? 'bg-orange-500 hover:bg-orange-600' : 'bg-blue-600 hover:bg-blue-700';
    @endphp

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
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Dashboard
                </a>
            </nav>
        </aside>

        <main class="flex-1 ml-64 p-8">

            <div class="flex items-center gap-4 mb-8">
                <div class="w-10 h-10 {{ $isEdit ? 'bg-orange-100 text-orange-600' : 'bg-black text-white' }} rounded-full flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $isEdit ? 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z' : 'M12 6v6m0 0v6m0-6h6m-6 0H6' }}"></path></svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">{{ $title }}</h1>
                    <p class="text-gray-500 mt-1">{{ $desc }}</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 mb-6">

                <form action="{{ $route }}" method="POST">
                    @csrf

                    @if($isEdit)
                        @method('PUT')
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg text-sm">
                            <ul class="list-disc list-inside font-medium">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="bg-blue-50 p-4 rounded-lg border border-blue-100 mb-6">
                            <p class="text-sm text-blue-700 font-medium">
                                ℹ️ <b>Info:</b> Kode Modul (ID) dan Token Akses akan dibuat secara otomatis oleh sistem setelah Anda menyimpan data ini.
                            </p>
                        </div>
                        <div>
                            <label class="flex items-center gap-2 text-xs font-bold text-gray-400 uppercase tracking-wide mb-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Durasi (Menit)
                            </label>
                            <input type="number" name="duration" required
                                value="{{ old('duration', $assessment->duration ?? '') }}"
                                class="w-full bg-[#F3F4F6] border-none rounded-lg px-4 py-3 text-gray-700 focus:ring-2 focus:ring-blue-500 focus:bg-white transition"
                                placeholder="0">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="flex items-center gap-2 text-xs font-bold text-gray-400 uppercase tracking-wide mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Judul Assesment
                        </label>
                        <input type="text" name="title" required
                            value="{{ old('title', $assessment->title ?? '') }}"
                            class="w-full bg-[#F3F4F6] border-none rounded-lg px-4 py-3 text-gray-700 focus:ring-2 focus:ring-blue-500 focus:bg-white transition"
                            placeholder="cth: Kepribadian Big Five">
                    </div>

                    <div class="mb-6">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wide mb-2 block">Deskripsi</label>
                        <textarea name="description" rows="4" required
                            class="w-full bg-[#F3F4F6] border-none rounded-lg px-4 py-3 text-gray-700 focus:ring-2 focus:ring-blue-500 focus:bg-white transition"
                            placeholder="Deskripsi singkat tentang apa yang diukur oleh tes ini....">{{ old('description', $assessment->description ?? '') }}</textarea>
                    </div>

                    <div class="mb-8">
                        <label class="flex items-center gap-2 text-xs font-bold text-gray-400 uppercase tracking-wide mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path></svg>
                            Tipe Assesment
                        </label>
                        <div class="relative">
                            <select name="category" required
                                class="w-full bg-[#F3F4F6] border-none rounded-lg px-4 py-3 text-gray-700 appearance-none cursor-pointer focus:ring-2 focus:ring-blue-500 focus:bg-white transition font-medium">
                                <option value="" disabled {{ !isset($assessment) ? 'selected' : '' }}>Pilih Kategori...</option>
                                <option value="Cognitive" {{ (old('category', $assessment->category ?? '') == 'Cognitive') ? 'selected' : '' }}>Cognitive (Kemampuan Kognitif)</option>
                                <option value="Personality" {{ (old('category', $assessment->category ?? '') == 'Personality') ? 'selected' : '' }}>Personality (Kepribadian)</option>
                                <option value="Attitude" {{ (old('category', $assessment->category ?? '') == 'Attitude') ? 'selected' : '' }}>Attitude (Sikap & Integritas)</option>
                                <option value="Interest" {{ (old('category', $assessment->category ?? '') == 'Interest') ? 'selected' : '' }}>Interest (Minat Karir)</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                        <a href="{{ route('admin.dashboard') }}" class="px-6 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg transition">
                            Batal
                        </a>
                        <button type="submit" class="px-6 py-2.5 {{ $btnColor }} text-white font-bold rounded-lg transition flex items-center gap-2 shadow-lg shadow-blue-200">
                            {{ $btnText }}
                        </button>
                    </div>

                </form>
            </div>

            @if(!$isEdit)
            <div class="bg-blue-50 border border-blue-100 rounded-lg p-4 flex items-start gap-3">
                <div class="bg-blue-100 p-1.5 rounded-full text-blue-600 mt-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                </div>
                <div>
                    <h4 class="font-bold text-blue-800 text-sm">Langkah Selanjutnya</h4>
                    <p class="text-blue-600 text-sm leading-snug mt-1">
                        Setelah membuat assesment, Anda akan diarahkan untuk menambah pertanyaan ke modul ini.
                    </p>
                </div>
            </div>
            @endif

        </main>
    </div>

</body>
</html>
