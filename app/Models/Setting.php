<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'nama_kos',
        'alamat_kos',
        'telepon_kos',
        'email_notifikasi',
        'tarif_default',
        'deskripsi_kos',
        'tgl_jatuh_tempo_pembayaran',
        'policy_kos',
        'status',
    ];
}
