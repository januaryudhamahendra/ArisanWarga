@extends('layouts.app')

@section('content')
<h4>Catat Pembayaran</h4>
<form action="{{ route('pembayaran.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Arisan</label>
        <select name="arisan_id" class="form-control" required>
            <option value="">-- Pilih Arisan --</option>
            @foreach($arisans as $a)
                <option value="{{ $a->id }}">{{ $a->tanggal->format('Y-m-d') }} — Rp {{ number_format($a->iuran,0,',','.') }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Peserta</label>
        <select name="peserta_id" class="form-control" required>
            <option value="">-- Pilih Peserta --</option>
            @foreach($pesertas as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-success">Simpan (Lunas)</button>
    <a class="btn btn-secondary" href="{{ route('pembayaran.index') }}">Kembali</a>
</form>
@endsection
