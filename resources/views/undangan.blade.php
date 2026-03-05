<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Assesment - Humania</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Dashboard
            </a>
            <a href="{{ route('undangan') }}" class="flex items-center gap-3 px-4 py-3 bg-blue-700 rounded-lg text-white font-medium transition shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Undangan
            </a>
            <a href="{{ route('hasil') }}" class="flex items-center gap-3 px-4 py-3 text-blue-100 hover:bg-blue-600 hover:text-white rounded-lg font-medium transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                Hasil
            </a>
        </nav>

        @if(Auth::user()->role === 'admin')
        <div class="px-4 mb-4 pt-4 border-t border-blue-700/50">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 text-blue-300 hover:text-white transition group">
                <svg class="w-4 h-4 group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                <span class="text-xs font-bold tracking-wide uppercase">Kembali ke Admin</span>
            </a>
        </div>
        @endif

        <div class="p-4 bg-blue-800 mt-auto">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-bold border-2 border-white">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <p class="font-bold text-sm">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-blue-200 truncate w-32">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-2 text-sm text-blue-200 hover:text-white transition w-full group">
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 ml-64 p-8">

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 mb-6 flex justify-between items-center">
            <div>
                <p class="text-blue-600 font-semibold text-sm">Selamat Datang,</p>
                <h2 class="text-2xl font-bold text-gray-900">{{ auth()->user()->name }}!</h2>
                <p class="text-gray-500 text-sm mt-1">Selesaikan modul-modul assessment berikut untuk mengetahui potensi dan profil kepribadian Anda.</p>
            </div>
            <div class="bg-blue-50 text-blue-600 px-4 py-2 rounded-full font-bold text-sm">
                {{ $invitations->count() }} Modul
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Daftar Undangan</h3>

            <div class="mb-6">
                <input type="text" placeholder="Cari berdasarkan code atau nama test" class="w-full border border-gray-200 rounded-full px-5 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition">
            </div>

            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="text-gray-500 border-b border-gray-200">
                        <th class="pb-3 font-medium px-2">Nama Test</th>
                        <th class="pb-3 font-medium px-2">Kode</th>
                        <th class="pb-3 font-medium px-2">Jadwal</th>
                        <th class="pb-3 font-medium px-2 text-center">Status</th>
                        <th class="pb-3 font-medium px-2 text-center">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($invitations as $invite)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-4 px-2 text-gray-800 font-medium">{{ $invite->assessment->title }}</td>
                        <td class="py-4 px-2 text-gray-500">{{ $invite->assessment->test_code }}</td>
                        <td class="py-4 px-2 text-gray-500">{{ $invite->created_at->format('d/m/y H:i') }} - Selesai</td>

                        <td class="py-4 px-2 text-center">
                            @if($invite->status == 'Selesai')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">Selesai</span>
                            @elseif($invite->status == 'Berlangsung')
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">Berlangsung</span>
                            @else
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">Belum dikerjakan</span>
                            @endif
                        </td>

                        <td class="py-4 px-2 text-center">
                            @if($invite->status == 'Selesai')
                                <span class="bg-blue-50 text-blue-300 px-5 py-2 rounded-full text-xs font-bold cursor-not-allowed">Selesai</span>
                            @else
                                <button onclick="openModal(
                                    '{{ $invite->assessment->id }}',
                                    '{{ $invite->assessment->module_id }}',
                                    '{{ $invite->assessment->title }}',
                                    '{{ $invite->assessment->duration }}',
                                    '{{ $invite->assessment->questions->count() ?? 0 }}'
                                )" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-full text-xs font-bold transition shadow-sm">
                                    {{ $invite->status == 'Berlangsung' ? 'Lanjutkan' : 'Mulai Test' }}
                                </button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-gray-500">Belum ada undangan assesment.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </main>
</div>

<div id="testModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm hidden opacity-0 transition-opacity duration-300">

    <div class="bg-white rounded-3xl shadow-2xl w-[450px] overflow-hidden transform scale-95 transition-transform duration-300" id="modalContent">

        <div class="bg-[#2563EB] p-6 text-white relative">
            <button onclick="closeModal()" class="absolute top-4 right-4 text-blue-200 hover:text-white transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <span id="modalModuleId" class="bg-white/20 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider border border-white/30">COG-01</span>
            <h2 id="modalTitle" class="text-2xl font-bold mt-3">Kognitif</h2>
        </div>

        <form id="modalForm" method="POST" action="">
            @csrf
            <div class="p-8">

                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="bg-[#F8FAFC] border border-blue-100 rounded-2xl p-4 text-center">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">DURASI</p>
                        <p id="modalDuration" class="text-[#2563EB] font-bold text-lg">3 Menit</p>
                    </div>
                    <div class="bg-[#F8FAFC] border border-blue-100 rounded-2xl p-4 text-center">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">TOTAL SOAL</p>
                        <p id="modalTotalSoal" class="text-[#2563EB] font-bold text-lg">10 Soal</p>
                    </div>
                </div>

                <div class="text-center mb-8">
                    <p class="text-sm text-gray-500 mb-4">Masukkan <strong class="text-gray-700">Token Akses (6 Karakter)</strong> yang diberikan oleh Admin untuk membuka soal.</p>
                    <input type="text" name="token" required maxlength="6" class="w-full border-2 border-gray-200 rounded-2xl px-4 py-4 text-center text-2xl font-mono tracking-widest text-gray-800 focus:outline-none focus:border-[#2563EB] transition uppercase placeholder-gray-300" placeholder="______">
                </div>

                <button type="submit" class="w-full bg-[#2563EB] hover:bg-blue-700 text-white font-bold py-4 rounded-2xl transition flex items-center justify-center gap-2 shadow-lg shadow-blue-500/30">
                    Konfirmasi & Mulai
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </button>
            </div>
        </form>

    </div>
</div>

<script>
    const modal = document.getElementById('testModal');
    const modalContent = document.getElementById('modalContent');
    const modalForm = document.getElementById('modalForm');

    // PERUBAHAN: Menerima parameter ke-5 yaitu 'totalSoal'
    function openModal(id, moduleId, title, duration, totalSoal) {
        document.getElementById('modalModuleId').innerText = moduleId;
        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalDuration').innerText = duration > 0 ? duration + ' Menit' : 'No Limit';

        // Memasukkan angka total soal ke dalam modal
        document.getElementById('modalTotalSoal').innerText = totalSoal + ' Soal';

        modalForm.action = '/kandidat/assessment/' + id + '/verify';

        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modalContent.classList.remove('scale-95');
        }, 10);
    }

    function closeModal() {
        modal.classList.add('opacity-0');
        modalContent.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
            modalForm.reset();
        }, 300);
    }

    modal.addEventListener('click', function(e) {
        if(e.target === modal) {
            closeModal();
        }
    });
</script>

</body>
</html>
