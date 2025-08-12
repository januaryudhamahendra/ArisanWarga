@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Daftar Peserta Arisan</h3>
    <a class="btn btn-primary" href="{{ route('peserta.create') }}">Tambah Peserta</a>
</div>

<table class="table table-bordered">
    <thead><tr><th>No</th><th>Nama</th><th>Alamat</th><th>Kontak</th><th>Aksi</th></tr></thead>
    <tbody>
    @foreach($pesertas as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->alamat }}</td>
            <td>{{ $p->no_hp }}</td>
            <td>
                <a class="btn btn-warning btn-sm" href="{{ route('peserta.edit', $p) }}">Edit</a>
                <form action="{{ route('peserta.destroy', $p) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Hapus peserta?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
