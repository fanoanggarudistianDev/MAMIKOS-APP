<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MamiKos Premium Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 min-h-screen flex antialiased">

    <aside class="w-64 bg-slate-900 text-slate-400 p-6 flex flex-col justify-between shrink-0 min-h-screen">
        <div>
            <div class="flex items-center gap-3 mb-8 px-2">
                <div class="bg-indigo-600 p-2 rounded-xl text-white font-bold text-lg">🏢</div>
                <div>
                    <h2 class="text-sm font-black text-white tracking-tight">MamiKos</h2>
                    <p class="text-[10px] font-bold text-indigo-400 uppercase tracking-wider">Management</p>
                </div>
            </div>

            <nav class="space-y-1">
                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider px-2 mb-2">Main Menu</p>

                @auth
                    @if(auth()->user()->role === 'admin' || auth()->user()->email === 'admin@kos.com')
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider px-2 mb-2">Admin</p>
                        <a href="/dashboard" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition {{ Request::is('dashboard') ? 'bg-indigo-600 text-white shadow-lg' : 'hover:bg-slate-800 hover:text-slate-200' }}">📊 Dashboard</a>
                        <a href="/kamar" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition {{ Request::is('kamar*') ? 'bg-indigo-600 text-white shadow-lg' : 'hover:bg-slate-800 hover:text-slate-200' }}">🔑 Kamar (Manajemen)</a>
                        <a href="/penghuni" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition {{ Request::is('penghuni*') ? 'bg-indigo-600 text-white shadow-lg' : 'hover:bg-slate-800 hover:text-slate-200' }}">👥 Penghuni (Manajemen)</a>

                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider px-2 mt-4 mb-2">Operasi</p>
                        <a href="/pembayaran" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition {{ Request::is('pembayaran*') ? 'bg-indigo-600 text-white shadow-lg' : 'hover:bg-slate-800 hover:text-slate-200' }}">💰 Pembayaran</a>
                        <a href="/pengaduan" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition {{ Request::is('pengaduan*') ? 'bg-indigo-600 text-white shadow-lg' : 'hover:bg-slate-800 hover:text-slate-200' }}">⚠️ Pengaduan</a>

                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider px-2 mt-4 mb-2">Administrator</p>
                        <a href="/users" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition {{ Request::is('users*') ? 'bg-indigo-600 text-white shadow-lg' : 'hover:bg-slate-800 hover:text-slate-200' }}">🧑‍💼 Manajemen User</a>
                        <a href="/reports" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition {{ Request::is('reports*') ? 'bg-indigo-600 text-white shadow-lg' : 'hover:bg-slate-800 hover:text-slate-200' }}">📈 Laporan</a>
                        <a href="/settings" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition {{ Request::is('settings*') ? 'bg-indigo-600 text-white shadow-lg' : 'hover:bg-slate-800 hover:text-slate-200' }}">⚙️ Pengaturan</a>
                    @else
                        <a href="/dashboard" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition {{ Request::is('dashboard') ? 'bg-indigo-600 text-white shadow-lg' : 'hover:bg-slate-800 hover:text-slate-200' }}">📊 Dashboard</a>
                        <a href="/pembayaran" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition {{ Request::is('pembayaran*') ? 'bg-indigo-600 text-white shadow-lg' : 'hover:bg-slate-800 hover:text-slate-200' }}">💰 Pembayaran Saya</a>
                        <a href="/pengaduan" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition {{ Request::is('pengaduan*') ? 'bg-indigo-600 text-white shadow-lg' : 'hover:bg-slate-800 hover:text-slate-200' }}">⚠️ Pengaduan Saya</a>
                        <a href="/profil" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition {{ Request::is('profil*') ? 'bg-indigo-600 text-white shadow-lg' : 'hover:bg-slate-800 hover:text-slate-200' }}">🧾 Profil</a>
                    @endif
                @else
                    <a href="/login" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition hover:bg-slate-800 hover:text-slate-200">🔐 Login</a>
                    <a href="/register" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition hover:bg-slate-800 hover:text-slate-200">📝 Register</a>
                @endauth

            </nav>
        </div>

        <div class="border-t border-slate-800 pt-4">
            @auth
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left text-slate-400 hover:text-rose-400 hover:bg-rose-500/10 py-2.5 px-3 rounded-xl transition text-xs font-bold flex items-center gap-2 cursor-pointer">
                        🚪 Logout Account
                    </button>
                </form>
            @else
                <a href="/login" class="w-full block text-left text-slate-400 hover:text-slate-200 hover:bg-slate-800 py-2.5 px-3 rounded-xl transition text-xs font-bold">🔐 Login</a>
                <a href="/register" class="w-full block text-left text-slate-400 hover:text-slate-200 hover:bg-slate-800 mt-2 py-2.5 px-3 rounded-xl transition text-xs font-bold">📝 Register</a>
            @endauth
        </div>
    </aside>

    <main class="flex-1 p-8 overflow-y-auto">
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-bold rounded-xl flex items-center gap-2 shadow-sm">
                ✅ {{ session('success') }}
            </div>
        @endif

        @yield('konten_utama')
    </main>

</body>
</html>