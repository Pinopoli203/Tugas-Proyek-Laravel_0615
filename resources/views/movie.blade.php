@extends('layouts.main')
@section('title', 'Movie')
@section('content')
<div class="container-fluid pt-3">
    <div class="card">
        <div class="card-header">
            <a href="/movie/form-movie" class="btn btn-primary"><i class="bi bi-plus-square"></i> Movie</a>
        </div>
        <div class="card-body">
            <table id="example" class="display" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>imDB</th>
                        <th>title</th>
                        <th>year</th>
                        <th>genre</th>
                        <th>poster</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mv as $idx => $m)
                    <tr>
                        <td>{{ $idx+1 }}</td>
                        <td>{{ $m->imDB }}</td>
                        <td>{{ $m->title }}</td>
                        <td>{{ $m->year }}</td>
                        <td>{{ $m->genre }}</td>
                        <>
                            @if ($m->poster)
                            <img src="{{ asset('/storage/'.$m->poster) }}" alt="{{ $m->poster }}">
                            @else
                            <img src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-15.png" alt="No Image" width="50">
                            @endif
                            <td>
                                <a href="/movie/form-ubah" class="btn btn-success">EDIT</a>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection