@extends('layouts.app')

@section('content')
<h2>Tambah Pengguna</h2>

<form method="POST" action="{{ route('cuan.store') }}" class="mt-3">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Role</label>
        <select name="role" class="form-select">
            <option value="client">Client</option>
            <option value="freelancer">Freelancer</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Bio</label>
        <textarea name="bio" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('cuan.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection