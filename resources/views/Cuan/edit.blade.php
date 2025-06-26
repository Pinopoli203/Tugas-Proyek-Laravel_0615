@extends('layouts.app')

@section('content')
<h2>Edit Pengguna</h2>

<form method="POST" action="{{ route('cuan.update', $user->id) }}" class="mt-3">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Role</label>
        <select name="role" class="form-select">
            <option value="client" {{ $user->role == 'client' ? 'selected' : '' }}>Client</option>
            <option value="freelancer" {{ $user->role == 'freelancer' ? 'selected' : '' }}>Freelancer</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Bio</label>
        <textarea name="bio" class="form-control">{{ $user->bio }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Perbarui</button>
    <a href="{{ route('cuan.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection