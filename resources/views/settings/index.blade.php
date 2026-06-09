@extends('layouts.app')

@section('konten_utama')
<div class="space-y-8">
    <!-- Header -->
    <div class="border-b border-slate-200 pb-5">
        <div class="flex items-center gap-3 mb-2">
            <svg class="w-8 h-8 text-slate-700" fill="currentColor" viewBox="0 0 24 24">
                <path d="M19.14 12.94c.04-.3.06-.61.06-.94 0-.32-.02-.64-.07-.94l2.03-1.58c.18-.14.23-.41.12-.62l-1.92-3.32c-.12-.22-.37-.29-.59-.22l-2.39.96c-.5-.38-1.03-.7-1.62-.94l-.36-2.54c-.04-.24-.24-.41-.48-.41h-3.84c-.24 0-.43.17-.47.41l-.36 2.54c-.59.24-1.13.57-1.62.94l-2.39-.96c-.22-.09-.47 0-.59.22L2.74 8.87c-.12.21-.08.48.1.62l2.03 1.58c-.05.3-.09.63-.09.94s.02.64.07.94l-2.03 1.58c-.18.14-.23.41-.12.62l1.92 3.32c.12.22.37.29.59.22l2.39-.96c.5.38 1.03.7 1.62.94l.36 2.54c.05.24.24.41.48.41h3.84c.24 0 .44-.17.47-.41l.36-2.54c.59-.24 1.13-.56 1.62-.94l2.39.96c.22.08.47 0 .59-.22l1.92-3.32c.12-.22.07-.48-.1-.62l-2.01-1.58zM12 15.6c-1.98 0-3.6-1.62-3.6-3.6s1.62-3.6 3.6-3.6 3.6 1.62 3.6 3.6-1.62 3.6-3.6 3.6z"/>
            </svg>
            <h1 class="text-2xl font-black text-slate-900">Pengaturan Sistem</h1>
        </div>
        <p class="text-xs text-slate-500 mt-1">Konfigurasi informasi kos, tarif, dan aturan manajemen.</p>
    </div>

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-2xl p-4">
            <h3 class="font-bold text-red-900 text-sm mb-2">Terdapat Kesalahan:</h3>
            <ul class="list-disc list-inside space-y-1 text-sm text-red-800">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 rounded-2xl p-4 flex items-center gap-3">
            <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
            </svg>
            <p class="text-sm text-emerald-800">{{ session('success') }}</p>
        </div>
    @endif

    <form action="{{ route('settings.update') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Informasi Kos -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-200 bg-gradient-to-r from-blue-50 to-transparent">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                    </svg>
                    <h2 class="text-lg font-black text-slate-900">Informasi Kos</h2>
                </div>
            </div>
            <div class="p-6 space-y-4">
                <!-- Nama Kos -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Kos <span class="text-rose-600">*</span></label>
                    <input type="text" name="nama_kos" value="{{ $setting->nama_kos }}" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition" placeholder="Masukkan nama kos Anda">
                </div>

                <!-- Alamat Kos -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Lengkap</label>
                    <textarea name="alamat_kos" rows="3" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition" placeholder="Jalan, nomor, kelurahan, kecamatan, kota">{{ $setting->alamat_kos }}</textarea>
                </div>

                <!-- Grid 2 Kolom -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Telepon -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nomor Telepon</label>
                        <input type="tel" name="telepon_kos" value="{{ $setting->telepon_kos }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition" placeholder="081234567890">
                    </div>

                    <!-- Email Notifikasi -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Email Notifikasi</label>
                        <input type="email" name="email_notifikasi" value="{{ $setting->email_notifikasi }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition" placeholder="admin@kos.com">
                    </div>
                </div>

                <!-- Deskripsi Kos -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Kos</label>
                    <textarea name="deskripsi_kos" rows="4" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition" placeholder="Tuliskan deskripsi singkat tentang kos Anda (fasilitas, lokasi strategis, dll)">{{ $setting->deskripsi_kos }}</textarea>
                </div>
            </div>
        </div>

        <!-- Tarif & Jadwal Pembayaran -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-200 bg-gradient-to-r from-emerald-50 to-transparent">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    <h2 class="text-lg font-black text-slate-900">Tarif & Jadwal Pembayaran</h2>
                </div>
            </div>
            <div class="p-6 space-y-4">
                <!-- Tarif Default -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Tarif Bulanan Default <span class="text-rose-600">*</span></label>
                    <div class="flex items-center gap-2">
                        <span class="text-slate-600 font-bold">Rp</span>
                        <input type="number" name="tarif_default" value="{{ $setting->tarif_default }}" required min="0" step="10000" class="flex-1 px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition" placeholder="500000">
                        <span class="text-slate-500 text-sm">/bulan</span>
                    </div>
                    <p class="text-xs text-slate-500 mt-2">Tarif default yang akan digunakan saat menambahkan kamar baru.</p>
                </div>

                <!-- Tanggal Jatuh Tempo -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Tanggal Jatuh Tempo Pembayaran <span class="text-rose-600">*</span></label>
                    <select name="tgl_jatuh_tempo_pembayaran" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition">
                        <option value="">-- Pilih Tanggal --</option>
                        @for($i = 1; $i <= 31; $i++)
                            <option value="{{ $i }}" {{ $setting->tgl_jatuh_tempo_pembayaran == $i ? 'selected' : '' }}>
                                Tanggal {{ $i }}
                            </option>
                        @endfor
                    </select>
                    <p class="text-xs text-slate-500 mt-2">Penghuni harus membayar cicilan sebelum tanggal ini setiap bulannya.</p>
                </div>
            </div>
        </div>

        <!-- Policy Kos -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-200 bg-gradient-to-r from-indigo-50 to-transparent">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/>
                    </svg>
                    <h2 class="text-lg font-black text-slate-900">Policy Kos</h2>
                </div>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Aturan & Kebijakan Kos</label>
                    <textarea name="policy_kos" rows="6" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition font-mono text-xs" placeholder="• Jam malam pukul 22:00
• Tidak boleh membawa tamu lawan jenis setelah jam 20:00
• Dilarang merokok di dalam kamar
• Jaga kebersihan area umum
• Biaya listrik/air ditanggung penghuni">{{ $setting->policy_kos }}</textarea>
                    <p class="text-xs text-slate-500 mt-2">Masukkan aturan kos dalam format bullet point atau teks biasa.</p>
                </div>
            </div>
        </div>

        <!-- Status Sistem -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-200 bg-gradient-to-r from-rose-50 to-transparent">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-rose-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                    </svg>
                    <h2 class="text-lg font-black text-slate-900">Status Sistem</h2>
                </div>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-3">Status Kos <span class="text-rose-600">*</span></label>
                    <div class="space-y-2">
                        <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg cursor-pointer hover:bg-slate-50 transition {{ $setting->status === 'aktif' ? 'border-emerald-500 bg-emerald-50' : '' }}">
                            <input type="radio" name="status" value="aktif" {{ $setting->status === 'aktif' ? 'checked' : '' }} required class="w-4 h-4 text-emerald-600">
                            <div>
                                <p class="font-bold text-slate-900">Aktif</p>
                                <p class="text-xs text-slate-600">Sistem kos sedang beroperasi normal</p>
                            </div>
                        </label>

                        <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg cursor-pointer hover:bg-slate-50 transition {{ $setting->status === 'nonaktif' ? 'border-rose-500 bg-rose-50' : '' }}">
                            <input type="radio" name="status" value="nonaktif" {{ $setting->status === 'nonaktif' ? 'checked' : '' }} required class="w-4 h-4 text-rose-600">
                            <div>
                                <p class="font-bold text-slate-900">Nonaktif</p>
                                <p class="text-xs text-slate-600">Sistem kos dalam pemeliharaan atau ditutup</p>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer dengan Action Buttons -->
        <div class="flex gap-3 justify-end pt-6 border-t border-slate-200">
            <a href="{{ route('dashboard') }}" class="px-6 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-900 font-bold rounded-lg transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm-5 16c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-10H5V5h10v4z"/>
                </svg>
                Simpan Perubahan
            </button>
        </div>
    </form>

    <!-- Info Box -->
    <div class="bg-blue-50 border border-blue-200 rounded-2xl p-4 flex gap-3">
        <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
        </svg>
        <div class="text-sm text-blue-900">
            <p class="font-bold mb-1">💡 Tips Pengaturan</p>
            <ul class="list-disc list-inside space-y-1 text-blue-800 text-xs">
                <li>Perbarui informasi kos secara berkala agar selalu terkini</li>
                <li>Pastikan email notifikasi valid untuk menerima laporan sistem</li>
                <li>Aturkan tanggal jatuh tempo sesuai dengan kebutuhan bisnis Anda</li>
                <li>Policy kos akan ditampilkan kepada penghuni saat registrasi</li>
            </ul>
        </div>
    </div>
</div>
@endsection
