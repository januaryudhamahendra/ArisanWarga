<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Arisan Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ route('arisans.index') }}">Arisan Warga</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('peserta.index') }}">Peserta</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('arisans.index') }}">Arisan</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pembayaran.index') }}">Pembayaran</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('statistik.index') }}">Statistik</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</div>

</body>
</html>
