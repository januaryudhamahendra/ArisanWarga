<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'no_hp'];

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'peserta_id');
    }

    public function menangArisans()
    {
        return $this->hasMany(Arisan::class, 'pemenang_id');
    }
}
