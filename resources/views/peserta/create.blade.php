@extends('layouts.app')

@section('content')
<h4>Tambah Peserta</h4>
<form action="{{ route('peserta.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control">
    </div>
    <div class="mb-3">
        <label>No HP</label>
        <input type="text" name="no_hp" class="form-control">
    </div>
    <button class="btn btn-success">Simpan</button>
    <a class="btn btn-secondary" href="{{ route('peserta.index') }}">Kembali</a>
</form>
@endsection
