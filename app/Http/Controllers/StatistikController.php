<?php

namespace App\Http\Controllers;

use App\Models\Arisan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use DB;

class StatistikController extends Controller
{
    public function index()
    {
        // total pemasukan = jumlah pembayaran lunas (amount)
        $total_pemasukan = Pembayaran::where('status_bayar', true)->sum('amount');

        // total payout = jumlah arisan yang sudah ada pemenang * iuran masing2
        $total_payout = Arisan::whereNotNull('pemenang_id')->sum('iuran');

        $saldo = $total_pemasukan - $total_payout;

        // ringkasan per arisan
        $arisans = Arisan::withCount(['pembayarans as paid_count' => function($q){
            $q->where('status_bayar', true);
        }])->orderBy('tanggal','desc')->get();

        return view('statistik.index', compact('total_pemasukan','total_payout','saldo','arisans'));
    }
}
