@extends('layouts.app')

@section('konten_utama')
<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-black text-slate-900 tracking-tight">Halo, {{ $user->name }} 👋</h1>
        <p class="text-xs text-slate-500 mt-1">Ini adalah dashboard penghuni. Informasi kamar dan pembayaran akan tampil di sini setelah admin mengaitkan akun Anda dengan data penghuni.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs">
            <h3 class="text-sm font-bold text-slate-600">Profil Akun</h3>
            <div class="mt-4 text-sm text-slate-700">
                <p><strong>Nama:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Peran:</strong> {{ ucfirst($user->role) }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs">
            <h3 class="text-sm font-bold text-slate-600">Informasi Kamar & Pembayaran</h3>
            <div class="mt-4 text-sm text-slate-700">
                @if(isset($penghuni) && $penghuni)
                    <p><strong>Nama Penghuni:</strong> {{ $penghuni->nama }}</p>
                    <p><strong>No. HP:</strong> {{ $penghuni->no_hp }}</p>
                    <p><strong>Kamar:</strong> {{ $penghuni->kamar ? $penghuni->kamar->nomor_kamar : 'Belum ditautkan' }}</p>
                    <p class="mt-2"><strong>Riwayat Pembayaran:</strong></p>
                    @if($penghuni->pembayarans->count())
                        <ul class="mt-2 text-sm text-slate-700 space-y-2">
                            @foreach($penghuni->pembayarans->sortByDesc('tanggal_bayar') as $bayar)
                                <li class="flex justify-between items-center">
                                    <span>{{ date('d M Y', strtotime($bayar->tanggal_bayar)) }} — Rp {{ number_format($bayar->jumlah_bayar, 0, ',', '.') }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-sm text-slate-500 mt-2">Belum ada pembayaran yang tercatat.</p>
                    @endif
                @else
                    <p>Belum ada informasi kamar yang terkait dengan akun Anda.</p>
                    <p class="text-xs text-slate-400 mt-2">Hubungi admin untuk menautkan akun Anda sebagai penghuni yang aktif.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
