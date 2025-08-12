@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Manajemen Pembayaran</h3>
    <a class="btn btn-primary" href="{{ route('pembayaran.create') }}">Catat Pembayaran</a>
</div>

@foreach($arisans as $ar)
    <div class="card mb-3">
        <div class="card-header">
            <strong>{{ $ar->tanggal->format('Y-m-d') }} — Rp {{ number_format($ar->iuran,0,',','.') }}</strong>
            <span class="ms-3">Pemenang: {{ $ar->pemenang->nama ?? '-' }}</span>
        </div>
        <div class="card-body">
            <table class="table">
                <thead><tr><th>No</th><th>Peserta</th><th>Status</th><th>Aksi</th></tr></thead>
                <tbody>
                @php $i=1; @endphp
                @foreach($ar->pembayarans as $p)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $p->peserta->nama }}</td>
                        <td>
                            @if($p->status_bayar)
                                <span class="badge bg-success">Lunas</span>
                            @else
                                <span class="badge bg-danger">Belum</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('pembayaran.toggle', $p) }}" method="POST" style="display:inline">
                                @csrf
                                <button class="btn btn-sm btn-secondary">Toggle</button>
                            </form>
                            <form action="{{ route('pembayaran.destroy', $p) }}" method="POST" style="display:inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if($ar->pembayarans->isEmpty())
                <div class="text-muted">Belum ada pembayaran dicatat.</div>
            @endif
        </div>
    </div>
@endforeach
@endsection
