@extends('layouts.app')

@section('content')
<h3>Statistik Keuangan</h3>

<div class="row mb-3">
    <div class="col-md-4">
        <div class="card p-3">
            <h5>Total Pemasukan</h5>
            <h3>Rp {{ number_format($total_pemasukan,0,',','.') }}</h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-3">
            <h5>Total Diberikan ke Pemenang</h5>
            <h3>Rp {{ number_format($total_payout,0,',','.') }}</h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-3">
            <h5>Saldo Kas</h5>
            <h3>Rp {{ number_format($saldo,0,',','.') }}</h3>
        </div>
    </div>
</div>

<h5>Ringkasan Per Arisan</h5>
<table class="table table-bordered">
    <thead><tr><th>Tanggal</th><th>Iuran</th><th>Sudah Bayar</th></tr></thead>
    <tbody>
    @foreach($arisans as $a)
        <tr>
            <td>{{ $a->tanggal->format('Y-m-d') }}</td>
            <td>Rp {{ number_format($a->iuran,0,',','.') }}</td>
            <td>{{ $a->paid_count }} orang</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
