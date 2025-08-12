@extends('layouts.app')

@section('content')
<h4>Edit Peserta</h4>
<form action="{{ route('peserta.update', $peserta) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $peserta->nama }}" required>
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="{{ $peserta->alamat }}">
    </div>
    <div class="mb-3">
        <label>No HP</label>
        <input type="text" name="no_hp" class="form-control" value="{{ $peserta->no_hp }}">
    </div>
    <button class="btn btn-success">Update</button>
    <a class="btn btn-secondary" href="{{ route('peserta.index') }}">Kembali</a>
</form>
@endsection
