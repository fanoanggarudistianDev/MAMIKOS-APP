# Presentasi: Manajemen Kos — Ringkasan Kode

---

## Slide 1 — Judul
- Aplikasi: MAMIKOS-APP
- Fokus: arsitektur & alur fitur manajemen kos
- Files utama: `app/Http/Controllers/KosController.php`, `routes/web.php`, models di `app/Models`

---

## Slide 2 — Arsitektur & Peran
- Controller: `KosController` (dashboard, landing, CRUD kamar/penghuni/pembayaran/pengaduan)
- Routes: grup `auth` dan nested `admin` di `routes/web.php`
- Models: `User`, `Penghuni`, `Kamar`, `Pembayaran`, `Pengaduan` (Eloquent relations)
- Views: Blade templates untuk admin & penghuni

---

## Slide 3 — Contoh: `dashboard()`
- Mengecek role user (admin vs penghuni)
- Admin: tampilkan statistik (total kamar, kamar terisi/tersedia, total penghuni, pendapatan, pengaduan)
- Penghuni: tampilkan data penghuni terkait + riwayat pembayaran
- Optimasi: gunakan `Auth::user()` dan `Carbon::now()` untuk analisis statis

---

## Slide 4 — Model & Relasi
- `Penghuni` belongsTo `Kamar`; hasMany `Pembayaran`, `Pengaduan`
- `Kamar` hasMany `Penghuni`
- Relasi diberi return types (`BelongsTo`, `HasMany`) untuk memperbaiki diagnostics IDE

---

## Slide 5 — Validasi & Keamanan
- Semua input `store*` memakai `$request->validate(...)` (unique, exists, numeric, date)
- Middleware: `auth` untuk akses manajemen; `admin` untuk halaman sensitif
- Setelah tambah penghuni: update status kamar (`Terisi`)

---

## Slide 6 — Perbaikan teknis & Cara verifikasi
- Perbaikan: import model, tambahkan return types, ganti helper global, hapus import tak terpakai
- Perintah verifikasi cepat:

```bash
# regenerate autoload (jalankan di environment yang punya composer)
composer dump-autoload -o

# bersihkan cache Laravel
php artisan optimize:clear
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

- Jika editor masih merah: restart VS Code / reload PHP language server

---

## Slide 7 — Rekomendasi & Next Steps
- Tambah seed data untuk demo (admin, penghuni, kamar, pembayaran)
- Buat unit/integration test untuk `dashboard` dan `store*`
- Pertimbangkan logging audit untuk aksi admin


---

*File presentasi dibuat di `PRESENTATION.md`.*
