@extends('layouts.app')

@section('konten_utama')
<div class="space-y-8">
    <div class="border-b border-slate-200 pb-5">
        <h1 class="text-2xl font-black text-slate-900">Pembayaran Sewa (Kas Masuk)</h1>
        <p class="text-xs text-slate-500 mt-0.5">Catat setoran tagihan bulanan langsung dari penghuni aktif.</p>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 items-start">
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs">
            <h3 class="text-xs font-black text-slate-900 uppercase tracking-wider mb-4">💰 Catat Setoran</h3>
            <form action="/pembayaran" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1.5">Nama Penghuni</label>
                    <select name="penghuni_id" class="w-full border border-slate-200 bg-slate-50/50 px-3 py-2 rounded-xl text-xs font-bold text-slate-700 focus:outline-none focus:border-indigo-500 focus:bg-white transition" required>
                        <option value="">-- Pilih Penyewa --</option>
                        @foreach($penghunis as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }} (Unit {{ $p->kamar->nomor_kamar ?? '-' }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1.5">Jumlah Setoran (Rp)</label>
                    <input type="number" name="jumlah_bayar" class="w-full border border-slate-200 bg-slate-50/50 px-3.5 py-2 rounded-xl text-xs font-medium focus:outline-none focus:border-indigo-500 focus:bg-white transition" required>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1.5">Tanggal Buku Kas</label>
                    <input type="date" name="tanggal_bayar" class="w-full border border-slate-200 bg-slate-50/50 px-3 py-2 rounded-xl text-xs font-medium focus:outline-none focus:border-indigo-500 focus:bg-white transition" required>
                </div>
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs py-2.5 rounded-xl transition shadow-md cursor-pointer">Simpan Pembayaran</button>
            </form>
        </div>

        <div class="xl:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50 text-slate-500 font-bold uppercase tracking-wider text-[10px]">
                        <th class="py-3 px-4">Nama Penghuni</th>
                        <th class="py-3 px-4">Tanggal Setor</th>
                        <th class="py-3 px-4">Jumlah Pembayaran</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                    @forelse($pembayarans as $pembayaran)
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-3.5 px-4 font-bold text-slate-900">{{ $pembayaran->penghuni->nama ?? 'Umum' }}</td>
                        <td class="py-3.5 px-4 text-slate-500">{{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->translatedFormat('d F Y') }}</td>
                        <td class="py-3.5 px-4 font-bold text-emerald-600">Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="py-8 text-center text-slate-400">Belum ada riwayat jurnal keuangan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection