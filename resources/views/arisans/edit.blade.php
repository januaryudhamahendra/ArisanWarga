@extends('layouts.app')

@section('content')
<h4>Edit Jadwal Arisan</h4>
<form action="{{ route('arisans.update', $arisan) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="{{ $arisan->tanggal->format('Y-m-d') }}" required>
    </div>
    <div class="mb-3">
        <label>Iuran (Rp)</label>
        <input type="number" name="iuran" step="0.01" class="form-control" value="{{ $arisan->iuran }}" required>
    </div>
    <div class="mb-3">
        <label>Pemenang (opsional)</label>
        <select name="pemenang_id" class="form-control">
            <option value="">-- Belum Ada --</option>
            @foreach($pesertas as $p)
                <option value="{{ $p->id }}" {{ $arisan->pemenang_id == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-success">Update</button>
    <a class="btn btn-secondary" href="{{ route('arisans.index') }}">Kembali</a>
</form>
@endsection
