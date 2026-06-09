@extends('layouts.app')

@section('konten_utama')
<div class="space-y-8">
    <div class="border-b border-slate-200 pb-5">
        <h1 class="text-2xl font-black text-slate-900">Laporan Operasional Kos</h1>
        <p class="text-xs text-slate-500 mt-1">Ringkasan data keuangan, hunian, dan pengaduan secara real-time.</p>
    </div>

    <!-- Kartu Statistik Utama -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Total Kamar</h3>
                    <p class="text-3xl font-black text-slate-900">{{ $total_kamar ?? 0 }}</p>
                </div>
                <div class="flex items-center justify-center w-14 h-14 rounded-xl bg-blue-100">
                    <svg class="w-7 h-7 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-slate-400 mt-3">Jumlah seluruh unit kamar.</p>
        </div>
        
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Kamar Terisi</h3>
                    <p class="text-3xl font-black text-emerald-600">{{ $total_kamar_terisi ?? 0 }}</p>
                </div>
                <div class="flex items-center justify-center w-14 h-14 rounded-xl bg-emerald-100">
                    <svg class="w-7 h-7 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-slate-400 mt-3">Unit yang sedang ditempati penghuni.</p>
        </div>
        
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Pendapatan Bulan Ini</h3>
                    <p class="text-2xl font-black text-indigo-600">Rp {{ number_format($pendapatan_bulan_ini ?? 0, 0, ',', '.') }}</p>
                </div>
                <div class="flex items-center justify-center w-14 h-14 rounded-xl bg-indigo-100">
                    <svg class="w-7 h-7 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-slate-400 mt-3">Total penerimaan pembayaran.</p>
        </div>
        
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Pengaduan Aktif</h3>
                    <p class="text-3xl font-black text-rose-600">{{ $total_pengaduan ?? 0 }}</p>
                </div>
                <div class="flex items-center justify-center w-14 h-14 rounded-xl bg-rose-100">
                    <svg class="w-7 h-7 text-rose-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-slate-400 mt-3">Laporan yang masih diproses.</p>
        </div>
    </div>

    <!-- Riwayat Pembayaran Bulan Ini -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="p-6 border-b border-slate-200 flex items-center gap-3">
            <svg class="w-6 h-6 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                <path d="M11 17h2v-6h-2v6zm1-15C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-14c-3.31 0-6 2.69-6 6h12c0-3.31-2.69-6-6-6z"/>
            </svg>
            <div>
                <h2 class="text-lg font-black text-slate-900">Riwayat Pembayaran Bulan Ini</h2>
                <p class="text-xs text-slate-500 mt-1">Semua setoran dari penghuni dalam periode bulan ini.</p>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50 text-slate-500 font-bold uppercase tracking-wider text-[10px]">
                        <th class="py-3 px-4">Tanggal</th>
                        <th class="py-3 px-4">Penghuni</th>
                        <th class="py-3 px-4">Kamar</th>
                        <th class="py-3 px-4">Jumlah Pembayaran</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                    @forelse($pembayarans_bulan_ini ?? [] as $pembayaran)
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-3.5 px-4 text-slate-500">{{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->translatedFormat('d M Y') }}</td>
                        <td class="py-3.5 px-4 font-bold text-slate-900">{{ $pembayaran->penghuni->nama ?? '-' }}</td>
                        <td class="py-3.5 px-4 text-slate-500">{{ $pembayaran->penghuni->kamar->nomor_kamar ?? '-' }}</td>
                        <td class="py-3.5 px-4 font-bold text-emerald-600">Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="py-8 text-center text-slate-400">Belum ada pembayaran bulan ini.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
        <!-- Tren Hunian Kamar -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-200 flex items-center gap-3">
                <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4V4c0-1.1-.9-2-2-2zm-2 12H4V4h14v10z"/>
                </svg>
                <div>
                    <h2 class="text-lg font-black text-slate-900">Daftar Kamar & Status Hunian</h2>
                    <p class="text-xs text-slate-500 mt-1">Kondisi terkini setiap unit kamar.</p>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="border-b border-slate-200 bg-slate-50 text-slate-500 font-bold uppercase tracking-wider text-[10px]">
                            <th class="py-3 px-4">Nomor Kamar</th>
                            <th class="py-3 px-4">Harga Bulanan</th>
                            <th class="py-3 px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                        @forelse($kamars ?? [] as $kamar)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="py-3.5 px-4 font-bold text-slate-900">{{ $kamar->nomor_kamar }}</td>
                            <td class="py-3.5 px-4">Rp {{ number_format($kamar->harga_bulanan, 0, ',', '.') }}</td>
                            <td class="py-3.5 px-4">
                                <span class="inline-flex items-center rounded-full px-3 py-1 text-[10px] font-bold uppercase tracking-wider {{ $kamar->status === 'Terisi' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                                    {{ $kamar->status }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="py-8 text-center text-slate-400">Belum ada kamar terdaftar.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Status Pengaduan -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-200 flex items-center gap-3">
                <svg class="w-6 h-6 text-rose-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
                <div>
                    <h2 class="text-lg font-black text-slate-900">Status Pengaduan Aktif</h2>
                    <p class="text-xs text-slate-500 mt-1">Laporan penghuni yang masih dalam proses penanganan.</p>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="border-b border-slate-200 bg-slate-50 text-slate-500 font-bold uppercase tracking-wider text-[10px]">
                            <th class="py-3 px-4">Tanggal</th>
                            <th class="py-3 px-4">Penghuni</th>
                            <th class="py-3 px-4">Kamar</th>
                            <th class="py-3 px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                        @forelse($pengaduans_aktif ?? [] as $pengaduan)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="py-3.5 px-4 text-slate-500">{{ \Carbon\Carbon::parse($pengaduan->tanggal_pengaduan)->translatedFormat('d M Y') }}</td>
                            <td class="py-3.5 px-4 font-bold text-slate-900">{{ $pengaduan->penghuni->nama ?? '-' }}</td>
                            <td class="py-3.5 px-4 text-slate-500">{{ $pengaduan->penghuni->kamar->nomor_kamar ?? '-' }}</td>
                            <td class="py-3.5 px-4">
                                <span class="inline-flex items-center rounded-full px-3 py-1 text-[10px] font-bold uppercase tracking-wider bg-amber-100 text-amber-700">
                                    {{ $pengaduan->status_penanganan }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="py-8 text-center text-slate-400">Tidak ada pengaduan aktif.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Ringkasan Total Pendapatan -->
    <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 rounded-2xl border border-indigo-200 shadow-lg p-8 text-white">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-xs font-bold uppercase tracking-wider opacity-80 mb-2">Total Penghuni</h3>
                <p class="text-4xl font-black">{{ $total_penghuni ?? 0 }} Orang</p>
            </div>
            <div>
                <h3 class="text-xs font-bold uppercase tracking-wider opacity-80 mb-2">Total Pendapatan Keseluruhan</h3>
                <p class="text-4xl font-black">Rp {{ number_format($total_pendapatan ?? 0, 0, ',', '.') }}</p>
            </div>
            <div>
                <h3 class="text-xs font-bold uppercase tracking-wider opacity-80 mb-2">Tingkat Hunian</h3>
                <p class="text-4xl font-black">{{ $total_kamar > 0 ? round(($total_kamar_terisi / $total_kamar) * 100) : 0 }}%</p>
            </div>
        </div>
    </div>
</div>
@endsection
