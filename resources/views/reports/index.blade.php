@extends('layouts.app')

@section('konten_utama')
<div class="space-y-8">
    <div class="border-b border-slate-200 pb-5">
        <h1 class="text-2xl font-black text-slate-900">Laporan</h1>
        <p class="text-xs text-slate-500 mt-1">Ringkasan aktivitas kos dan laporan operasional.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs">
            <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-3">Kamar Terisi</h3>
            <p class="text-3xl font-black text-slate-900">--</p>
            <p class="text-xs text-slate-400 mt-2">Jumlah unit kamar yang sedang terisi.</p>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs">
            <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-3">Pendapatan Bulanan</h3>
            <p class="text-3xl font-black text-slate-900">--</p>
            <p class="text-xs text-slate-400 mt-2">Total pembayaran bulan ini.</p>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs">
            <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-3">Aduan Aktif</h3>
            <p class="text-3xl font-black text-slate-900">--</p>
            <p class="text-xs text-slate-400 mt-2">Jumlah laporan penghuni yang belum ditangani.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs p-6">
        <h2 class="text-lg font-black text-slate-900 mb-4">Ringkasan Bulanan</h2>
        <p class="text-sm text-slate-600">Halaman laporan ini masih dapat dikembangkan untuk menampilkan data keuangan, tren hunian, dan status pengaduan secara real time.</p>
    </div>
</div>
@endsection
