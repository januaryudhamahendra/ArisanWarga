<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Arisan;
use App\Models\Peserta;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        // Tampilkan pembayaran grouped by arisan
        $arisans = Arisan::with('pembayarans.peserta')->orderBy('tanggal','desc')->get();
        return view('pembayaran.index', compact('arisans'));
    }

    public function create()
    {
        $arisans = Arisan::orderBy('tanggal','desc')->get();
        $pesertas = Peserta::orderBy('nama')->get();
        return view('pembayaran.create', compact('arisans','pesertas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'peserta_id' => 'required|exists:pesertas,id',
            'arisan_id' => 'required|exists:arisans,id',
        ]);

        $arisan = Arisan::findOrFail($request->arisan_id);

        $data = [
            'peserta_id' => $request->peserta_id,
            'arisan_id' => $request->arisan_id,
            'amount' => $arisan->iuran,
            'status_bayar' => true
        ];

        // update or create (agar unik peserta+arisan)
        Pembayaran::updateOrCreate(
            ['peserta_id' => $request->peserta_id, 'arisan_id' => $request->arisan_id],
            $data
        );

        return redirect()->route('pembayaran.index')->with('success','Pembayaran dicatat (lunas).');
    }

    // Toggle status pembayaran (untuk convenience)
    public function toggle(Pembayaran $pembayaran)
    {
        if($pembayaran->status_bayar){
            $pembayaran->update(['status_bayar'=>false,'amount'=>0]);
        }else{
            $pembayaran->update(['status_bayar'=>true,'amount'=>$pembayaran->arisan->iuran]);
        }

        return back()->with('success','Status pembayaran diperbarui.');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return back()->with('success','Data pembayaran dihapus.');
    }
}
