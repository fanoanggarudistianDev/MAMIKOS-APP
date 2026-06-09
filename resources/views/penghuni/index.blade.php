@extends('layouts.app')

@section('konten_utama')
<div class="space-y-8">
    <div class="border-b border-slate-200 pb-5">
        <h1 class="text-2xl font-black text-slate-900">Registrasi Penghuni Kos</h1>
        <p class="text-xs text-slate-500 mt-0.5">Daftarkan penghuni baru dan plot ke dalam unit kamar yang masih kosong.</p>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 items-start">
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs">
            <h3 class="text-xs font-black text-slate-900 uppercase tracking-wider mb-4">📋 Formulir Check-In</h3>
            <form action="/penghuni" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1.5">Nama Lengkap</label>
                    <input type="text" name="nama" class="w-full border border-slate-200 bg-slate-50/50 px-3.5 py-2 rounded-xl text-xs font-medium focus:outline-none focus:border-indigo-500 focus:bg-white transition" required>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1.5">Nomor WhatsApp</label>
                    <input type="text" name="no_hp" placeholder="08123xxxx" class="w-full border border-slate-200 bg-slate-50/50 px-3.5 py-2 rounded-xl text-xs font-medium focus:outline-none focus:border-indigo-500 focus:bg-white transition" required>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1.5">Pilih Kamar</label>
                    <select name="kamar_id" class="w-full border border-slate-200 bg-slate-50/50 px-3 py-2 rounded-xl text-xs font-bold text-slate-700 focus:outline-none focus:border-indigo-500 focus:bg-white transition" required>
                        <option value="">-- Pilih Kamar Kosong --</option>
                        @foreach($kamars as $k)
                            <option value="{{ $k->id }}">Kamar {{ $k->nomor_kamar }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1.5">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="w-full border border-slate-200 bg-slate-50/50 px-3 py-2 rounded-xl text-xs font-medium focus:outline-none focus:border-indigo-500 focus:bg-white transition" required>
                </div>
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs py-2.5 rounded-xl transition shadow-md cursor-pointer">Finalisasi Pendaftaran</button>
            </form>
        </div>

        <div class="xl:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50 text-slate-500 font-bold uppercase tracking-wider text-[10px]">
                        <th class="py-3 px-4">Nama Penghuni</th>
                        <th class="py-3 px-4">Kontak / HP</th>
                        <th class="py-3 px-4">Unit Kamar</th>
                        <th class="py-3 px-4">Mulai Sewa</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                    @forelse($penghunis as $p)
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-3.5 px-4 font-bold text-slate-900">{{ $p->nama }}</td>
                        <td class="py-3.5 px-4 text-slate-500">{{ $p->no_hp }}</td>
                        <td class="py-3.5 px-4"><span class="bg-indigo-50 text-indigo-700 font-bold px-2 py-0.5 rounded border border-indigo-100">Room {{ $p->kamar->nomor_kamar ?? '-' }}</span></td>
                        <td class="py-3.5 px-4 text-slate-500">{{ \Carbon\Carbon::parse($p->tanggal_masuk)->translatedFormat('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="py-8 text-center text-slate-400">Belum ada penghuni aktif yang terdaftar.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection