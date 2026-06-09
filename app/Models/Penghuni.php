<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penghuni extends Model
{
    use HasFactory;

    // Menentukan kolom yang boleh diisi massal
    protected $fillable = ['nama', 'no_hp', 'kamar_id', 'tanggal_masuk'];

    // Relasi balik ke model Kamar
    public function kamar(): BelongsTo
    {
        return $this->belongsTo(Kamar::class);
    }

    // Relasi ke model Pembayaran
    public function pembayarans(): HasMany
    {
        return $this->hasMany(Pembayaran::class);
    }

    // Relasi ke model Pengaduan
    public function pengaduans(): HasMany
    {
        return $this->hasMany(Pengaduan::class);
    }
}