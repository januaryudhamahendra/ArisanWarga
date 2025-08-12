<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = ['peserta_id','arisan_id','amount','status_bayar'];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'peserta_id');
    }

    public function arisan()
    {
        return $this->belongsTo(Arisan::class, 'arisan_id');
    }
}
