<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kamar extends Model
{
    use HasFactory;
    protected $fillable = ['nomor_kamar', 'harga_bulanan', 'status'];

    public function penghunis(): HasMany
    {
        return $this->hasMany(Penghuni::class);
    }
}