<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arisan extends Model
{
    use HasFactory;

    protected $fillable = ['tanggal','iuran','pemenang_id'];

    protected $dates = ['tanggal'];

    public function pemenang()
    {
        return $this->belongsTo(Peserta::class, 'pemenang_id');
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class, 'arisan_id');
    }
}
