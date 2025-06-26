<?php

namespace App\Http\Controllers;

use App\Movie;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\returnArgument;
use App\User;

class MenuController extends Controller
{
    public function home()
    {
        return view('home', ['key' => 'home']);
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

    public function savemovie(Request $request)
    {
        if ($request->hasFile('poster')) {
            $file_name = time() . '-' . $request->file('poster')->getClientOriginalName();
            $path = $request->file('poster')->storeAs('poster', $file_name, 'public');
        } else {
            $path = '';
        }

        Movie::create([
            'imDB' => $request->imDB,
            'title' => $request->title,
            'year' => $request->year,
            'genre' => $request->genre,
            'poster' => $path
        ]);

        return redirect('/movie')->with('alert', 'Data Berhasil di Simpan');
    }

    public function editmovie($id)
    {
        $id = Movie::find($id);
        return view('editmovie', ['key' => 'movie', 'id_movie' => $id]);
    }

    public function updatemovie($id, Request $request)
    {
        $movie = Movie::find($id);
        $movie->imDB = $request->imDB;
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->genre = $request->genre;

        if ($request->poster) {
            if ($movie->poster) {
                Storage::disk('public')->delete($movie->poster);
            }

            $file_name = time() . '-' . $request->file('poster')->getClientOriginalName();
            $path = $request->file('poster')->storeAs('poster', $file_name, 'public');

            $movie->poster = $path;
        }

        $movie->save();
        return redirect('movie')->with('alert', 'Data Berhasil di Ubah');
    }

    public function deletemovie($id)
    {
        // Mengambil ID movie yang akan di hapus 
        $mv = Movie::find($id);

        // mengecek apakah ada poster dari data yang akan di hapus 
        if ($mv->poster) {
            Storage::disk('public')->delete($mv->poster);
        }

        $mv->delete();
        return redirect('/movie')->with('alert', 'Data Berhasil di Hapus');
    }

    public function login()
    {
        return view('login');
    }

    public function ceklogin(Request $request)
    {
        if (!Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            return redirect('/');
        } else {
            return redirect('/home');
        }
    }

    public function ubahpass()
    {
        return view('formpass', ['key' => '']);
    }

    public function updatepass(Request $request)
    {
        if ($request->password == $request->konfirmasi_password) {
            $user = Auth::user();

            $user->password = bcrypt($request->password);
            /** @var \App\Models\User $user */
            $user = Auth::user();


            return redirect('/formpass')->with('info', 'Password Berhasil di Ubah');
        } else {
            return redirect('/formpass')->with('info', 'Password Gagal di Ubah');
        }
    }
    
    public function searchMovie()
    {
        return view('searchmovie');
    }
}
