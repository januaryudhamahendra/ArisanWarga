@extends('layouts.app')

@section('content')
<h4>Tambah Jadwal Arisan</h4>
<form action="{{ route('arisans.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Iuran (Rp)</label>
        <input type="number" name="iuran" step="0.01" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Pemenang (opsional)</label>
        <select name="pemenang_id" class="form-control">
            <option value="">-- Belum Ada --</option>
            @foreach($pesertas as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-success">Simpan</button>
    <a class="btn btn-secondary" href="{{ route('arisans.index') }}">Kembali</a>
</form>
@endsection
