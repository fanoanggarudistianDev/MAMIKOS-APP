<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $fillable = ['nomor_kamar', 'harga_bulanan', 'status'];

    public function penghunis()
    {
        return $this->hasMany(Penghuni::class);
    }
}