<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Humania</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        /* CSS Kustom untuk Scrollbar yang lebih tipis dan elegan */
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background-color: #94a3b8; }
    </style>
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
                <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3 px-4 py-3 bg-blue-700 rounded-lg text-white font-medium transition shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg> Overview
                </a>
                <a href="{{ url('/admin/daftar-kandidat') }}" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg> Daftar Kandidat
                </a>
                <a href="{{ url('/admin/buat-assesment') }}" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> Buat Assesment
                </a>
                    </div>
                    <div class="overflow-hidden">
                        <p class="font-bold text-sm text-white truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-blue-200 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-xs bg-blue-700 hover:bg-blue-600 text-white py-2 px-3 rounded-lg mb-3 transition shadow-sm border border-blue-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    Lihat View Kandidat
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 text-sm text-blue-200 hover:text-red-300 transition w-full group py-1">
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg> Keluar
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 ml-64 p-8">

            @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif

            <div class="flex justify-between items-end mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Dashboard Admin</h1>
                    <p class="text-gray-500 mt-1">Kelola assesment dan lihat hasil kandidat.</p>
                </div>
                <a href="{{ url('/admin/buat-assesment') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-semibold flex items-center gap-2 transition shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg> Buat Assesment
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex items-center gap-4">
                    <div class="p-4 bg-blue-50 text-blue-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Kandidat</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $totalKandidat ?? 0 }}</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex items-center gap-4">
                    <div class="p-4 bg-green-50 text-green-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Assesment Selesai</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $tesSelesai ?? 0 }}</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex items-center gap-4">
                    <div class="p-4 bg-purple-50 text-purple-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Modul Aktif</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $totalModul ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 flex flex-col h-full">
                    <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50 rounded-t-xl">
                        <h3 class="font-bold text-gray-800 text-sm uppercase tracking-wide">Kandidat Baru Bergabung</h3>
                        <a href="{{ url('/admin/daftar-kandidat') }}" class="text-xs text-blue-600 font-bold hover:underline">Lihat Semua</a>
                    </div>
                    <div class="p-4 flex-1 space-y-4 max-h-[250px] overflow-y-auto custom-scrollbar">
                        @forelse($recentCandidates as $user)
                        <div class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg transition">
                            <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 font-bold flex items-center justify-center text-sm border border-blue-200">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-800 text-sm">{{ $user->name }}</h4>
                                <p class="text-xs text-gray-500">{{ $user->email }}</p>
                            </div>
                            <span class="text-[10px] text-gray-400 font-medium">{{ $user->created_at->diffForHumans() }}</span>
                        </div>
                        @empty
                        <div class="text-center py-8 text-gray-400 text-xs">Belum ada kandidat mendaftar.</div>
                        @endforelse
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 flex flex-col h-full">
                    <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50 rounded-t-xl">
                        <h3 class="font-bold text-gray-800 text-sm uppercase tracking-wide">Aktivitas Tes Terbaru</h3>
                        <a href="{{ url('/admin/daftar-kandidat') }}" class="text-xs text-blue-600 font-bold hover:underline">Lihat Detail</a>
                    </div>
                    <div class="p-0 flex-1 max-h-[250px] overflow-y-auto custom-scrollbar">
                        <table class="w-full text-left text-sm">
                            <tbody class="divide-y divide-gray-100">
                                @forelse($recentResults as $result)
                                <tr class="hover:bg-gray-50 transition group">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-2 h-2 rounded-full bg-green-500"></div>
                                            <div>
                                                <p class="font-bold text-gray-800 text-xs">{{ $result->user->name ?? 'Kandidat Dihapus' }}</p>
                                                <p class="text-[10px] text-gray-500 mt-0.5">{{ $result->assessment->title ?? 'Modul Dihapus' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex flex-col items-end gap-1">
                                            <span class="bg-green-100 text-green-700 font-bold px-2 py-0.5 rounded text-[10px] border border-green-200">
                                                Skor: {{ $result->score }}
                                            </span>
                                            <span class="text-[9px] text-gray-400 font-medium">{{ $result->created_at->diffForHumans() }}</span>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" class="text-center py-10 text-gray-400 text-xs">Belum ada tes yang dikerjakan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gray-100 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="font-bold text-gray-800">Modul Assesment Aktif</h3>
                </div>

                <div class="divide-y divide-gray-100">
                    @forelse($assessments as $item)
                    <div class="p-6 flex items-center justify-between hover:bg-gray-50 transition border-b border-gray-100">
                        <div class="flex items-start gap-4">
                            <div class="flex flex-col items-center gap-1">
                                <span class="bg-blue-100 text-blue-700 font-bold px-3 py-1 rounded text-sm uppercase min-w-[80px] text-center">
                                    {{ $item->module_id }}
                                </span>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-lg">{{ $item->title }}</h4>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-xs text-gray-500">Token Akses:</span>
                                    <span class="bg-gray-800 text-white font-mono text-xs px-2 py-0.5 rounded tracking-widest select-all cursor-pointer" title="Copy Token">
                                        {{ $item->test_code }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-6">
                            <span class="text-gray-400 text-sm">
                                {{ $item->duration > 0 ? $item->duration . ' Menit' : 'No Limit' }}
                            </span>
                            <div class="flex gap-4 items-center">
                                <a href="{{ route('admin.assessment.edit', $item->id) }}" class="text-blue-600 font-bold hover:text-blue-800 transition">Edit</a>
                                <form action="{{ route('admin.assessment.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 font-bold hover:text-red-700 transition">Hapus</button>
                                </form>
                            </div>
                            <div class="border-l border-gray-200 pl-6 ml-2 w-28 text-right">
                                <span class="text-gray-800 text-sm block font-medium">
                                    {{ $item->created_at }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="p-8 text-center text-gray-500">
                        <svg class="mx-auto h-12 w-12 text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                        </svg>
                        <p>Belum ada modul assesment yang dibuat.</p>
                        <a href="{{ url('/admin/buat-assesment') }}" class="text-blue-600 font-bold text-sm mt-2 hover:underline">+ Buat Baru Sekarang</a>
                    </div>
                    @endforelse
                </div>
            </div>

        </main>
    </div>

</body>
</html>
