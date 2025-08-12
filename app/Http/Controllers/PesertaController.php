<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $pesertas = Peserta::orderBy('nama')->get();
        return view('peserta.index', compact('pesertas'));
    }

    public function create()
    {
        return view('peserta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
        ]);

        Peserta::create($request->all());
        return redirect()->route('peserta.index')->with('success','Peserta ditambahkan.');
    }

    public function edit(Peserta $peserta)
    {
        return view('peserta.edit', compact('peserta'));
    }

    public function update(Request $request, Peserta $peserta)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $peserta->update($request->all());
        return redirect()->route('peserta.index')->with('success','Peserta diperbarui.');
    }

    public function destroy(Peserta $peserta)
    {
        $peserta->delete();
        return redirect()->route('peserta.index')->with('success','Peserta dihapus.');
    }
}
