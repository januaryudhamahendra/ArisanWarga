<?php

namespace App\Http\Controllers;

use App\Models\Arisan;
use App\Models\Peserta;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ArisanController extends Controller
{
    public function index()
    {
        $arisans = Arisan::with('pemenang','pembayarans.peserta')->orderBy('tanggal','desc')->get();
        return view('arisans.index', compact('arisans'));
    }

    public function create()
    {
        $pesertas = Peserta::orderBy('nama')->get();
        return view('arisans.create', compact('pesertas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'iuran' => 'required|numeric|min:0',
            'pemenang_id' => 'nullable|exists:pesertas,id'
        ]);

        Arisan::create($request->all());
        return redirect()->route('arisans.index')->with('success','Arisan ditambahkan.');
    }

    public function edit(Arisan $arisan)
    {
        $pesertas = Peserta::orderBy('nama')->get();
        return view('arisans.edit', compact('arisan','pesertas'));
    }

    public function update(Request $request, Arisan $arisan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'iuran' => 'required|numeric|min:0',
            'pemenang_id' => 'nullable|exists:pesertas,id'
        ]);

        $arisan->update($request->all());
        return redirect()->route('arisans.index')->with('success','Arisan diperbarui.');
    }

    public function destroy(Arisan $arisan)
    {
        $arisan->delete();
        return redirect()->route('arisans.index')->with('success','Arisan dihapus.');
    }
}
