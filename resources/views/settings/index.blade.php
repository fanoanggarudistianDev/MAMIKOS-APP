@extends('layouts.app')

@section('konten_utama')
<div class="space-y-8">
    <div class="border-b border-slate-200 pb-5">
        <h1 class="text-2xl font-black text-slate-900">Pengaturan</h1>
        <p class="text-xs text-slate-500 mt-1">Konfigurasi dasar sistem untuk manajemen kos Anda.</p>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs p-6">
        <h2 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-3">Pengaturan Umum</h2>
        <div class="space-y-4 text-sm text-slate-700">
            <p>Halaman ini adalah placeholder pengaturan. Bisa ditambahkan opsi seperti:</p>
            <ul class="list-disc list-inside space-y-2 text-slate-600">
                <li>Nama kos</li>
                <li>Tarif bulanan default</li>
                <li>Pemberitahuan email</li>
                <li>Manajemen hak akses</li>
            </ul>
        </div>
    </div>
</div>
@endsection
