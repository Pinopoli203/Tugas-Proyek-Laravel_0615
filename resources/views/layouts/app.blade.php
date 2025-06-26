<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CuanKilat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('cuan.index') }}">CuanKilat</a>
            @if(Auth::check())
            <form action="{{ route('logout') }}" method="POST" class="d-flex ms-auto">
                @csrf
                <button class="btn btn-outline-light" type="submit">Logout</button>
            </form>
            @endif
            <a href="{{ route('password.edit') }}" class="btn btn-warning">Ubah Password</a>
        </div>
    </nav>

    <div class="container">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>

</body>

</html>