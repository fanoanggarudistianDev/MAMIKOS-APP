@extends('layouts.app')

@section('konten_utama')
<div class="space-y-8">
    <div>
        <h1 class="text-2xl font-black text-slate-900 tracking-tight">Selamat Datang, Admin ✨</h1>
        <p class="text-xs text-slate-500 mt-1">Berikut adalah ringkasan operasional manajemen kos Anda hari ini.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs flex items-center gap-4">
            <div class="p-3 bg-indigo-50 rounded-xl text-xl">🔑</div>
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Unit Kamar</p>
                <h3 class="text-xl font-black text-slate-900 mt-0.5">{{ $total_kamar }} Unit</h3>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs flex items-center gap-4">
            <div class="p-3 bg-sky-50 rounded-xl text-xl">🏠</div>
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Kamar Terisi</p>
                <h3 class="text-xl font-black text-slate-900 mt-0.5">{{ $total_kamar_terisi }} Unit</h3>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs flex items-center gap-4">
            <div class="p-3 bg-emerald-50 rounded-xl text-xl">✅</div>
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Kamar Tersedia</p>
                <h3 class="text-xl font-black text-slate-900 mt-0.5">{{ $total_kamar_tersedia }} Unit</h3>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs flex items-center gap-4">
            <div class="p-3 bg-emerald-50 rounded-xl text-xl">👥</div>
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Penghuni Aktif</p>
                <h3 class="text-xl font-black text-slate-900 mt-0.5">{{ $total_penghuni }} Orang</h3>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs flex items-center gap-4">
            <div class="p-3 bg-amber-50 rounded-xl text-xl">💰</div>
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Pendapatan</p>
                <h3 class="text-xl font-black text-emerald-600 mt-0.5">Rp {{ number_format($total_pendapatan, 0, ',', '.') }}</h3>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs flex items-center gap-4">
            <div class="p-3 bg-indigo-50 rounded-xl text-xl">📅</div>
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Pendapatan Bulan Ini</p>
                <h3 class="text-xl font-black text-emerald-600 mt-0.5">Rp {{ number_format($pendapatan_bulan_ini, 0, ',', '.') }}</h3>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs flex items-center gap-4">
            <div class="p-3 bg-rose-50 rounded-xl text-xl">⚠️</div>
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Aduan Pending</p>
                <h3 class="text-xl font-black text-rose-600 mt-0.5">{{ $total_pengaduan }} Kasus</h3>
            </div>
        </div>
    </div>
</div>
@endsection