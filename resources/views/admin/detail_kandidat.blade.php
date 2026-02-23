<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Assesment: {{ $kandidat->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; background-color: #F8FAFC; } </style>
</head>
<body class="flex min-h-screen">

    <aside class="w-64 bg-[#2563EB] text-white flex flex-col fixed h-full left-0 top-0 z-50">
        <div class="p-8">
            <div class="flex items-center gap-2">
                <h1 class="text-2xl font-bold tracking-wide">Humania</h1>
                <span class="bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Admin</span>
            </div>
            <p class="text-blue-200 text-sm mt-1">TalentMap</p>
        </div>

        <nav class="flex-1 px-4 mt-4 space-y-2">
            <p class="px-4 text-[10px] font-bold text-blue-300 uppercase tracking-wider mb-2">MENU ADMIN</p>
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Overview
            </a>
            <a href="{{ route('admin.daftar_kandidat') }}" class="flex items-center gap-3 px-4 py-3 bg-blue-700 rounded-lg text-white font-medium transition shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                Daftar Kandidat
            </a>
            <a href="{{ url('/admin/buat-assesment') }}" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Buat Assesment
            </a>
        </nav>

        <div class="p-4 bg-blue-800 mt-auto">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-full bg-white text-blue-800 flex items-center justify-center font-bold border-2 border-blue-200">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="overflow-hidden">
                    <p class="font-bold text-sm text-white truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-blue-200 truncate">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-2 text-sm text-blue-200 hover:text-red-300 transition w-full group py-1">
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg> Keluar
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 ml-64 p-10">

        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center gap-5">
                <a href="{{ route('admin.daftar_kandidat') }}" class="w-11 h-11 bg-black text-white rounded-full flex items-center justify-center hover:bg-gray-800 transition shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Hasil Assesment</h1>
                    <p class="text-gray-500 mt-1">Lihat semua hasil assesment kandidat</p>
                </div>
            </div>
            <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-2 rounded-lg font-bold text-sm flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ $assesmentData->count() }} Assesment
            </div>
        </div>

        @if($totalCheats > 0)
        <div class="mb-8 border border-red-300 rounded-xl p-6 bg-red-50/50 shadow-sm flex items-start gap-4">
            <svg class="w-6 h-6 text-red-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            <div>
                <p class="text-red-700 text-sm">Kandidat terdeteksi melakukan alt tab sebanyak <b class="font-bold">{{ $totalCheats }} kali</b> pada saat pengerjaan soal.</p>
                <p class="text-red-700 text-sm mt-1">Sistem mendeteksi kandidat keluar dari halaman ujian pada saat pengerjaan soal.</p>
            </div>
        </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

            <div class="px-8 py-6 border-b border-gray-100 bg-gray-50/30">
                <h3 class="font-bold text-xl text-gray-900">{{ $kandidat->name }}</h3>
                <p class="text-sm text-gray-500 mt-1">{{ $kandidat->email }}</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-[11px] text-gray-400 uppercase tracking-wider border-b border-gray-100">
                            <th class="px-8 py-4 font-semibold">ID</th>
                            <th class="px-8 py-4 font-semibold">Assesment</th>
                            <th class="px-8 py-4 font-semibold">Kode Tes</th>
                            <th class="px-8 py-4 font-semibold text-center">Soal</th>
                            <th class="px-8 py-4 font-semibold">Status</th>
                            <th class="px-8 py-4 font-semibold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($assesmentData as $data)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="px-8 py-5 font-bold text-gray-500 text-sm">{{ $data->module_id }}</td>
                            <td class="px-8 py-5 font-bold text-gray-700">Tes {{ $data->category }}</td>
                            <td class="px-8 py-5 font-bold text-gray-500 tracking-wider">{{ $data->test_code }}</td>
                            <td class="px-8 py-5 font-bold text-gray-900 text-center">{{ $data->questions_count }}</td>
                            <td class="px-8 py-5">
                                @if($data->status === 'Selesai')
                                    <span class="bg-[#10B981] text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">Selesai</span>
                                @else
                                    <span class="bg-gray-200 text-gray-500 text-xs font-bold px-3 py-1.5 rounded-full">Belum Selesai</span>
                                @endif
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex items-center justify-end gap-2">
                                    @if($data->status === 'Selesai')
                                        <a href="{{ route('admin.kandidat.review', ['user_id' => $kandidat->id, 'assessment_id' => $data->id]) }}" class="inline-flex items-center gap-1.5 border border-blue-200 text-blue-600 bg-blue-50 hover:bg-blue-600 hover:text-white px-4 py-1.5 rounded-full text-xs font-bold transition">
                                            Detail
                                        </a>
                                    @else
                                        <button disabled class="inline-flex items-center gap-1.5 border border-gray-200 text-gray-400 bg-gray-50 px-4 py-1.5 rounded-full text-xs font-bold cursor-not-allowed">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            Detail
                                        </button>

                                        <form action="{{ route('admin.kirim.undangan', ['user_id' => $kandidat->id, 'assessment_id' => $data->id]) }}" method="POST" class="inline-block">
                                            @csrf
                                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-1.5 rounded-full text-xs font-bold flex items-center gap-1.5 transition shadow-sm" title="Kirim Undangan via Email">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                                Undang
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-8 py-10 text-center text-gray-400">Belum ada modul yang tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>
