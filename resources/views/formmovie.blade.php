@extends('layouts.main')
@section('title', 'Form Add Movie')
@section('content')
    <div class="container-fluid pt-3">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <form action="/save" method="post" enctype="multipart/form/-data">
                    @csrf
                    <div class="form-group">
                        <label>imDB</label>
                        <input type="number" name="imDB" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Year</label>
                        <input type="number" min="1900" max="2100" name="year" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Genre</label>
                        <select name="genre" class="form-control">
                            <option value="0">--Pilih Genre--</option>
                            <option value="Horor">Horor</option>
                            <option value="Fiksi">Fiksi</option>
                            <option value="Triler">Triler</option>
                            <option value="Komendi">Komendi</option>
                            <option value="Anime">Anime</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Poster</label>
                        <input type="file" accept="image/*" name="poster" class="form-control-file">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection