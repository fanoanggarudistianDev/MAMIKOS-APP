<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MamiKos — Manajemen Kos Modern</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>body{font-family:'Plus Jakarta Sans',Inter,system-ui,-apple-system,Segoe UI,Roboto,'Helvetica Neue',Arial,sans-serif}</style>
</head>
<body class="antialiased bg-gradient-to-b from-white via-slate-50 to-slate-100">
    <header class="max-w-7xl mx-auto px-6 py-6 flex items-center justify-between">
        <a href="/" class="flex items-center gap-3 text-slate-900">
            <div class="bg-indigo-600 text-white rounded-lg p-2">🏢</div>
            <div>
                <h1 class="font-extrabold text-lg">MamiKos</h1>
                <p class="text-xs text-slate-500 -mt-1">Simple Boarding House Management</p>
            </div>
        </a>
        <nav class="flex items-center gap-4">
            <a href="/register" class="px-4 py-2 bg-indigo-600 text-white rounded-lg font-semibold transition-transform duration-200 hover:-translate-y-0.5 hover:bg-indigo-700 hover:shadow-lg">Daftar</a>
            <a href="/login" class="px-4 py-2 border border-slate-200 rounded-lg text-slate-700 transition-transform duration-200 hover:-translate-y-0.5 hover:border-slate-300 hover:shadow-sm">Masuk</a>
        </nav>
    </header>

    <main class="max-w-6xl mx-auto px-6 py-16 grid gap-12 lg:grid-cols-2 items-center">
        <section>
            <h2 class="text-4xl font-extrabold text-slate-900 leading-tight">Kelola kos Anda dengan mudah — dari kamar hingga pembayaran</h2>
            <p class="mt-6 text-slate-600">MamiKos membantu pemilik dan pengelola kos untuk mencatat kamar, mengatur penghuni, mencatat pembayaran, dan menindaklanjuti pengaduan — semua dalam satu dashboard yang simpel dan cepat.</p>

            <div class="mt-8 flex gap-4">
                <a href="/register" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-200 transform hover:-translate-y-1 hover:shadow-xl">Daftar Gratis</a>
                <a href="/login" class="inline-block border border-slate-200 px-6 py-3 rounded-lg text-slate-700 transition duration-200 transform hover:-translate-y-1 hover:border-slate-300 hover:shadow-lg">Coba Demo</a>
            </div>

            <ul class="mt-10 grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-slate-700">
                <li class="flex gap-3 items-start rounded-2xl p-4 bg-white border border-slate-200 transition duration-200 hover:-translate-y-1 hover:shadow-lg">
                    <div class="text-indigo-600 text-xl">✔️</div>
                    <div><strong>Manajemen Kamar</strong><div class="text-slate-500">Tambah, edit, lihat status kamar.</div></div>
                </li>
                <li class="flex gap-3 items-start rounded-2xl p-4 bg-white border border-slate-200 transition duration-200 hover:-translate-y-1 hover:shadow-lg">
                    <div class="text-indigo-600 text-xl">✔️</div>
                    <div><strong>Penghuni & Pembayaran</strong><div class="text-slate-500">Catat daftar penghuni dan riwayat pembayaran.</div></div>
                </li>
                <li class="flex gap-3 items-start rounded-2xl p-4 bg-white border border-slate-200 transition duration-200 hover:-translate-y-1 hover:shadow-lg">
                    <div class="text-indigo-600 text-xl">✔️</div>
                    <div><strong>Pengaduan Terstruktur</strong><div class="text-slate-500">Keluhan ditangani dan dilacak sampai selesai.</div></div>
                </li>
                <li class="flex gap-3 items-start rounded-2xl p-4 bg-white border border-slate-200 transition duration-200 hover:-translate-y-1 hover:shadow-lg">
                    <div class="text-indigo-600 text-xl">✔️</div>
                    <div><strong>Mudah Diakses</strong><div class="text-slate-500">Bisa dijalankan di laptop dan ponsel.</div></div>
                </li>
            </ul>
        </section>

        <aside class="bg-white rounded-2xl shadow-lg p-8 transition duration-300 hover:-translate-y-1 hover:shadow-2xl">
            <h3 class="text-xl font-bold">Pratinjau Dashboard</h3>
            <p class="text-sm text-slate-500 mt-2">Ringkasan cepat data kos Anda.</p>
            <div class="mt-6 grid grid-cols-2 gap-4">
                <div class="p-4 bg-indigo-50 rounded-lg transition duration-200 hover:bg-indigo-100">
                    <div class="text-xs text-slate-500">Total Unit Kamar</div>
                    <div class="text-2xl font-bold">{{ $total_kamar }}</div>
                </div>
                <div class="p-4 bg-sky-50 rounded-lg transition duration-200 hover:bg-sky-100">
                    <div class="text-xs text-slate-500">Kamar Terisi</div>
                    <div class="text-2xl font-bold">{{ $total_kamar_terisi }}</div>
                </div>
                <div class="p-4 bg-emerald-50 rounded-lg transition duration-200 hover:bg-emerald-100">
                    <div class="text-xs text-slate-500">Penghuni Aktif</div>
                    <div class="text-2xl font-bold">{{ $total_penghuni }}</div>
                </div>
                <div class="p-4 bg-amber-50 rounded-lg transition duration-200 hover:bg-amber-100">
                    <div class="text-xs text-slate-500">Pendapatan Bulan Ini</div>
                    <div class="text-2xl font-bold">Rp {{ number_format($pendapatan_bulan_ini, 0, ',', '.') }}</div>
                </div>
                <div class="p-4 bg-violet-50 rounded-lg transition duration-200 hover:bg-violet-100">
                    <div class="text-xs text-slate-500">Kamar Tersedia</div>
                    <div class="text-2xl font-bold">{{ $total_kamar_tersedia }}</div>
                </div>
                <div class="p-4 bg-rose-50 rounded-lg transition duration-200 hover:bg-rose-100">
                    <div class="text-xs text-slate-500">Aduan Pending</div>
                    <div class="text-2xl font-bold">{{ $total_pengaduan }}</div>
                </div>
                <div class="col-span-2 p-4 bg-indigo-50 rounded-lg transition duration-200 hover:bg-indigo-100">
                    <div class="text-xs text-slate-500">Total Pendapatan</div>
                    <div class="text-2xl font-bold">Rp {{ number_format($total_pendapatan, 0, ',', '.') }}</div>
                </div>
            </div>
            <p class="mt-6 text-xs text-slate-400">Data contoh; setelah daftar, data nyata akan muncul di dashboard.</p>
        </aside>
    </main>

    <footer class="border-t mt-12 py-6">
        <div class="max-w-6xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="text-sm text-slate-500">© {{ date('Y') }} MamiKos. All rights reserved.</div>
            <div class="flex gap-4 text-sm">
                <a href="#" class="text-slate-500 hover:text-slate-900">Privacy</a>
                <a href="#" class="text-slate-500 hover:text-slate-900">Terms</a>
            </div>
        </div>
    </footer>
</body>
</html>
