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

                <a href="{{ url('/admin/daftar-kandidat') }}" class="flex items-center gap-3 px-4 py-3 bg-blue-700 rounded-lg text-white font-medium transition shadow-sm">
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

                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-xs bg-blue-700 hover:bg-blue-600 text-white py-2 px-3 rounded-lg mb-3 transition shadow-sm border border-blue-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    Lihat View Kandidat
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 text-sm text-blue-200 hover:text-red-300 transition w-full group py-1">
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 ml-64 p-8">

            <div class="flex justify-between items-start mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Daftar Kandidat</h1>
                    <p class="text-gray-500 mt-1">Lihat semua kandidat dan hasil assesment.</p>
                </div>
                <span class="bg-green-100 text-green-700 px-4 py-1.5 rounded-full text-sm font-semibold flex items-center gap-2 border border-green-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    {{ $kandidat->count() }} Kandidat
                </span>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

                <div class="bg-gray-50 px-8 py-5 border-b border-gray-200">
                    <h3 class="font-bold text-gray-800">Semua Kandidat</h3>
                </div>

                <div class="grid grid-cols-12 gap-4 px-8 py-4 bg-white border-b border-gray-100 text-[11px] font-bold text-gray-400 uppercase tracking-wider">
                    <div class="col-span-1">ID</div>
                    <div class="col-span-4">Kandidat</div>
                    <div class="col-span-2">Bergabung</div>
                    <div class="col-span-2">Modul</div>
                    <div class="col-span-2">Status</div>
                    <div class="col-span-1 text-right">Aksi</div>
                </div>

                <div class="divide-y divide-gray-100">

                    @forelse($kandidat as $index => $user)
                    <div class="grid grid-cols-12 gap-4 px-8 py-5 items-center hover:bg-gray-50 transition">

                        <div class="col-span-1">
                            <span class="text-gray-500 font-bold ml-1">{{ $loop->iteration }}</span>
                        </div>

                        <div class="col-span-4">
                            <div class="flex items-center gap-3">
                                <div>
                                    <h4 class="font-bold text-gray-900 text-sm">{{ $user->name }}</h4>
                                    <p class="text-gray-500 text-xs mt-0.5">{{ $user->email }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-2">
                            <span class="text-gray-500 font-bold text-sm">{{ $user->created_at->format('d M Y') }}</span>
                        </div>

                        <div class="col-span-2">
                            <span class="font-bold text-gray-900 text-sm">{{ $user->undangan_selesai }}/{{ $user->total_undangan }}</span>
                            <span class="text-sm text-gray-500">selesai</span>
                        </div>

                        <div class="col-span-2">
                            <span class="{{ $user->badge_color }} text-[11px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wide">
                                {{ $user->status_ujian }}
                            </span>
                        </div>

                        <div class="col-span-1 flex justify-end">
                            <a href="{{ route('admin.kandidat.detail', $user->id) }}" class="inline-flex items-center gap-1.5 border border-blue-200 text-blue-600 bg-blue-50 hover:bg-blue-600 hover:text-white px-3 py-1.5 rounded-full text-xs font-bold transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                Detail
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="p-10 text-center text-gray-500">
                        <p class="text-sm font-medium">Belum ada kandidat yang terdaftar.</p>
                    </div>
                    @endforelse

                </div>
            </div>

        </main>
    </div>

</body>
</html>
