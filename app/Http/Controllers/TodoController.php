<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([
            'tittle' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:8',
        ]);

        // yg ' ' = nama column
        // yg $request-> = value name di input
        // kenapa kirim 5 data pdhl di input ada 3 inputan? kalau dicek di table todos itu kan ada 6 column yg harus diisi, salah satunya column done_date yg nullable, kalau nullable itu gausa diisi gpp jd ga diisi dulu
        // user_id ngambil id dari fitur auth (history login), supaya tau itu todo punya siapa
        // column status kan boolean, jd klostatus si todo blm dikerjain = 0
        Todo::create([
            'tittle'=> $request->tittle,
            'date' => $request->date,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'status' => 0,
        ]);
        Alert::success('Kamu berhasil menambahkan data Todo!');
        //kalau berhasil tambah ke db, bakal diarahin ke halama dashboard dengan menampilkan pemberitahuan
        return redirect('/dashboard');
    }

    public function data()
    {
        // ambil data dari table todos
        $todos = Todo::all();
        //compact untuk mengirim data ke bladenya
        // isi di compact harus sama kaya nama variablenya ex:$todos
        return view('data', compact('todos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // parameter $id mengambil data path dinamis {id}
        // ambil satu baris data yang memiliki value column id sama dengan data path dinamis id yang dikirim ke route
        $todo = Todo::where('id', $id)->first();
        // kemudian arahkan/tampilkan file view yang bernama edit.blade.php dan dikirimkan data dari $todo ke file edit tersebut dengan bantuan compact
        return view('edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validasi
        $request ->validate([
            'tittle' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:8',
        ]);
        // cari baris data yang punya value column id sama dengan id yang dikirimkan ke route
        Todo::where('id', $id)->update([
            'tittle'=> $request->tittle,
            'date' => $request->date,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'status' => 0,
        ]);
        // kalau berhasil, arahkan ke halaman data dengan pemberitahuan berhasil
        return redirect('/data')->with('successUpdate', 'Berhasil Mengubah Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // cari data yang mau dihapus, kalo ketemu langsung hapus datanya
        Todo::where('id', $id)->delete();
        // kalau berhasil arahin balik ke halaman data dengan pemberitahuan
        return redirect('/data')->with('successDelete', 'Berhasil menghapus data ToDo!');
    }
    
    public function updateToComplated(Request $request, $id)
    {
        // cari data yang akan di update
        // baru setelahnya data di update ke database melalui model
        // status tipemya npp;eam (0/1) : 0 (on-process) & 1 (complated)
        // carbon : package laravel yg mengelola segala hal yang berhubungan dengan date
        // now(): mengambil tanggal hari ini
        Todo::where('id', '=',$id)->update([
            'status' => 1,
            'done_time' => \Carbon\Carbon::now()
        ]);
        // jika berhasil, akan dibalikkan ke halaman awal (halaman tempat button complated berada). kembalikan dengan pemberitahuan
        
        return redirect()->back()->with('done', 'ToDo telah selesai dikerjakan!');
    }
}
