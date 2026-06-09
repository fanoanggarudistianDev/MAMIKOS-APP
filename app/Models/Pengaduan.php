<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = ['penghuni_id', 'deskripsi_keluhan', 'tanggal_pengaduan', 'status_penanganan'];

    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class);
    }
}