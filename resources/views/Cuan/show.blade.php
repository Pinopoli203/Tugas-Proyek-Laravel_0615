@extends('layouts.app')

@section('content')
<h1>Detail Pengguna</h1>

<p><strong>Nama:</strong> {{ $user->name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Role:</strong> {{ $user->role }}</p>
<p><strong>Bio:</strong> {{ $user->bio }}</p>
@endsection
