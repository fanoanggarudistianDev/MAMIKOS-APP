<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Manajemen Kos</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gradient-to-tr from-slate-900 via-indigo-950 to-slate-950 flex items-center justify-center h-screen">
    <div class="bg-white/95 backdrop-blur-md p-10 rounded-2xl shadow-2xl w-full max-w-md border border-white/20">
        <div class="text-center mb-8">
            <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">Selamat Datang</h2>
            <p class="text-slate-500 mt-2 font-medium">Masuk untuk mengelola Dashboard Kos</p>
        </div>

        @if($errors->any())
            <div class="bg-rose-100 text-rose-700 p-3 rounded-lg mb-4 text-sm font-medium border border-rose-300">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-slate-700 font-semibold mb-2">Alamat Email</label>
                <input type="email" name="email" class="w-full border border-slate-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-600" required placeholder="admin@kos.com">
            </div>
            <div>
                <label class="block text-slate-700 font-semibold mb-2">Kata Sandi</label>
                <input type="password" name="password" class="w-full border border-slate-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-600" required placeholder="••••••••">
            </div>
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3.5 rounded-xl font-bold transition shadow-lg shadow-indigo-600/30">
                Masuk Sekarang
            </button>
        </form>
        <p class="text-center text-sm text-slate-500 mt-4">Belum punya akun? <a href="/register" class="text-indigo-600 font-bold">Daftar sekarang</a></p>
    </div>
</body>
</html>