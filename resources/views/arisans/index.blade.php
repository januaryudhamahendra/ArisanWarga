@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Jadwal Arisan</h3>
    <a class="btn btn-primary" href="{{ route('arisans.create') }}">Tambah Jadwal</a>
</div>

<table class="table table-bordered">
    <thead><tr><th>Tanggal</th><th>Iuran</th><th>Pemenang</th><th>Terbayar</th><th>Aksi</th></tr></thead>
    <tbody>
    @foreach($arisans as $a)
        @php
            // notifikasi jatuh tempo: tanggal <= sekarang + 3 hari
            $isDueSoon = \Carbon\Carbon::parse($a->tanggal)->lte(\Carbon\Carbon::now()->addDays(3)) && \Carbon\Carbon::parse($a->tanggal)->gte(\Carbon\Carbon::now());
            $paidCount = $a->pembayarans->where('status_bayar', true)->count();
        @endphp
        <tr @if($isDueSoon) style="background:#fff3cd" @endif>
            <td>{{ $a->tanggal->format('Y-m-d') }}</td>
            <td>Rp {{ number_format($a->iuran,0,',','.') }}</td>
            <td>{{ $a->pemenang ? $a->pemenang->nama : '-' }}</td>
            <td>{{ $paidCount }} orang</td>
            <td>
                <a class="btn btn-warning btn-sm" href="{{ route('arisans.edit', $a) }}">Edit</a>
                <form action="{{ route('arisans.destroy', $a) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Hapus arisan?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
