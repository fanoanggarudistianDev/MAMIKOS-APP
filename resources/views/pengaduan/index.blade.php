@extends('layouts.app')

@section('konten_utama')
<div class="space-y-8">
    <div class="border-b border-slate-200 pb-5">
        <h1 class="text-2xl font-black text-slate-900">Ajukan Kendala di Kos</h1>
        <p class="text-xs text-slate-500 mt-0.5">Laporkan masalah atau kebutuhan perbaikan yang Anda alami di kos.</p>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 items-start">
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs">
            <h3 class="text-xs font-black text-slate-900 uppercase tracking-wider mb-4">⚠️ Form Pengaduan</h3>
            <form action="/pengaduan" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1.5">Nama Penghuni</label>
                    <select name="penghuni_id" class="w-full border border-slate-200 bg-slate-50/50 px-3 py-2 rounded-xl text-xs font-bold text-slate-700 focus:outline-none focus:border-indigo-500 focus:bg-white transition" required>
                        <option value="">-- Pilih Penghuni --</option>
                        @foreach($penghunis as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }} (Kamar {{ $p->kamar->nomor_kamar ?? '-' }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1.5">Judul Kendala</label>
                    <input type="text" name="deskripsi_keluhan" class="w-full border border-slate-200 bg-slate-50/50 px-3.5 py-2 rounded-xl text-xs font-medium focus:outline-none focus:border-indigo-500 focus:bg-white transition" placeholder="Contoh: AC rusak, kebocoran, listrik padam" required>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1.5">Tanggal Pengaduan</label>
                    <input type="date" name="tanggal_pengaduan" class="w-full border border-slate-200 bg-slate-50/50 px-3 py-2 rounded-xl text-xs font-medium focus:outline-none focus:border-indigo-500 focus:bg-white transition" required>
                </div>
                <button type="submit" class="w-full bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs py-2.5 rounded-xl transition shadow-md cursor-pointer">Kirim Pengaduan</button>
            </form>
        </div>

        <div class="xl:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-200">
                <h2 class="text-sm font-black text-slate-900 uppercase tracking-wider">Riwayat Pengaduan</h2>
                <p class="text-xs text-slate-500 mt-2">Lihat status permasalahan yang sudah diajukan.</p>
            </div>
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50 text-slate-500 font-bold uppercase tracking-wider text-[10px]">
                        <th class="py-3 px-4">Penghuni</th>
                        <th class="py-3 px-4">Kamar</th>
                        <th class="py-3 px-4">Tanggal</th>
                        <th class="py-3 px-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                    @forelse($pengaduans as $pengaduan)
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-3.5 px-4 font-bold text-slate-900">{{ $pengaduan->penghuni->nama ?? 'Unknown' }}</td>
                        <td class="py-3.5 px-4 text-slate-500">{{ $pengaduan->penghuni->kamar->nomor_kamar ?? '-' }}</td>
                        <td class="py-3.5 px-4 text-slate-500">{{ \Carbon\Carbon::parse($pengaduan->tanggal_pengaduan)->translatedFormat('d F Y') }}</td>
                        <td class="py-3.5 px-4">
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-[10px] font-bold uppercase tracking-wider {{ $pengaduan->status_penanganan === 'Proses' ? 'bg-amber-100 text-amber-700' : 'bg-emerald-100 text-emerald-700' }}">
                                {{ $pengaduan->status_penanganan }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="py-8 text-center text-slate-400">Belum ada pengaduan yang diajukan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection