@extends('layouts.app')

@section('konten_utama')
<div class="space-y-8">
    <div class="border-b border-slate-200 pb-5">
        <h1 class="text-2xl font-black text-slate-900">Manajemen Kamar Kos</h1>
        <p class="text-xs text-slate-500 mt-0.5">Kelola nomor unit, harga bulanan, dan pantau ketersediaan kamar.</p>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 items-start">
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs">
            <h3 class="text-xs font-black text-slate-900 uppercase tracking-wider mb-4">🆕 Daftarkan Kamar</h3>
            <form action="/kamar" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1.5">Nomor Kamar</label>
                    <input type="text" name="nomor_kamar" placeholder="Contoh: A-10" class="w-full border border-slate-200 bg-slate-50/50 px-3.5 py-2 rounded-xl text-xs font-medium focus:outline-none focus:border-indigo-500 focus:bg-white transition" required>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 uppercase mb-1.5">Harga Bulanan (Rp)</label>
                    <input type="number" name="harga_bulanan" placeholder="Contoh: 1500000" class="w-full border border-slate-200 bg-slate-50/50 px-3.5 py-2 rounded-xl text-xs font-medium focus:outline-none focus:border-indigo-500 focus:bg-white transition" required>
                </div>
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs py-2.5 rounded-xl transition shadow-md shadow-indigo-600/10 cursor-pointer">Simpan Unit Kamar</button>
            </form>
        </div>

        <div class="xl:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50 text-slate-500 font-bold uppercase tracking-wider text-[10px]">
                        <th class="py-3 px-4">Nomor Kamar</th>
                        <th class="py-3 px-4">Harga Sewa</th>
                        <th class="py-3 px-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                    @forelse($kamars as $kamar)
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-3.5 px-4 font-bold text-slate-900">{{ $kamar->nomor_kamar }}</td>
                        <td class="py-3.5 px-4">Rp {{ number_format($kamar->harga_bulanan, 0, ',', '.') }} /bln</td>
                        <td class="py-3.5 px-4">
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold {{ $kamar->status == 'Tersedia' ? 'bg-emerald-50 text-emerald-600 border border-emerald-200' : 'bg-slate-100 text-slate-500 border border-slate-200' }}">
                                {{ $kamar->status }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="py-8 text-center text-slate-400">Belum ada unit kamar terdaftar.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection