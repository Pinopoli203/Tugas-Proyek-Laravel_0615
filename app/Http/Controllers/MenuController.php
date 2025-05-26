<?php

namespace App\Http\Controllers;

use App\Movie;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function dosen()
    {
        return view('dosen');
    }

    public function mahasiswa()
    {
        return view('mahasiswa');
    }

    public function skripsi()
    {
        return view('skripsi');
    }

    public function index()
    {
        return view('welcome');
    }

    public function savemovie(Request $request)
    {
        if ($request->hasFile('poster')) {
            $file_name = time() . '-' . $request->file('poster')->getClientOriginalName();
            $path = $request->file('poster')->storeAs('poster', $file_name, 'public');
        } else {
            $path = '';
        }

        Movie::create([
            'ImDB' => $request->imDB,
            'title' => $request->title,
            'year' => $request->year,
            'genre' => $request->genre,
            'poster' => $path
        ]);

        return redirect('/movie');
    }

    public function movie()
    {
        $movie = Movie::orderBy('id', 'desc')->get();
        return view('movie', ['key' => 'movie', 'mv' => $movie]);
    }

    public function addmovie()
    {
        return view('formmovie', ['key' => 'movie']);
    }

    public function kategori()
    {
        return view('kategori', ['key' => 'kategori']);
    }

    public function genre()
    {
        return view('genre');
    }

    public function editMovie()
    {
        $id = Movie::find($id);
        return view('editMovie', ['key' => 'movie', 'id' => $id]);
    }

    public function updatemovie($id, request $request)
    {
        $movie = Movie::find($id);
        $movie->ImDB = $request->imDB;
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->genre = $request->genre;

        if ($request->poster)
        {
            if($movie->poster)
            {
            Storage::disk('public')->delete($movie->poster);
            }

        $file_name = time() . '-' . $request->file('poster')->getClientOriginalName();
        $path = $request->file('poster')->storeAs('poster', $file_name,'public');

        $movie->poster = $path;
    }
        $movie->save();

        return redirect('movie');
    }
}
