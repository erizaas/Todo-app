@extends('layout')

@section('content')
@include('sweetalert::alert')

    @if (Auth::check())
    <nav class="rounded-5 navbar navbar-expand-lg bg-light" style="margin: 1%">
    <div class="container-fluid ">
        <a class="navbar-brand" href="/dashboard">Todo App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link" href="/data">Data</a>
            <a class="nav-link" href="/create">Create</a>
            <a class="nav-link" href="/logout">Logout</a>
        </div>
        </div>
    </div>
    </nav>
    @endif
    @if(session('successUpdate'))
        <div class="alert alert-success">
            {{session('successUpdate')}}
        </div>
    @endif
    @if(session('successDelete'))
        <div class="alert alert-warning">
            {{session('successDelete')}}
        </div>
    @endif
    @if(session('done'))
        <div class="alert alert-success">
            {{session('done')}}
        </div>
    @endif
    
<table class="table table striped table-bordered table-light text-center" style="border-radius: 30px;margin-bottom: 559px">
    <tr>
        <td>No</td>
        <td>Kegiatan</td>
        <td>Deskripsi</td>
        <td>Batas Waktu</td>
        <td>Status</td>
        <td >Aksi</td>
    </tr>
    @php
        $no = 1;
    @endphp
    @foreach ($todos as $todo)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $todo['tittle'] }}</td>
        <td>{{ $todo['description'] }}</td>
        {{-- Carbon: Package date pada laravel, nantinya si date yang 2022-11-22 formatnya jadi 22 November, 2022 --}}
        <td>{{ \Carbon\Carbon::parse($todo['date'])->format('j F, Y')}}</td>
        {{-- Konsep Ternary, if statusnya 1 nampilin teks complated kalo 0 nampilin teks on-process status tuh boolean kan? cuman antara 1 atau 0 --}}
        <td>{{ $todo['status'] ? 'Complated' : 'On-Process'}}</td>
        <td class="d-flex">
            {{-- karena path {id} merupakan path dinamis, jadi kita harus isi path dinamis tersebut. karena kita mengisinya dengan data dinamis/data dari database jadi buat isi nya pake kurung kurawal dua kali --}}
            <button class="btn btn-primary me-1" style="margin-left:20%;" onclick="location.href='/edit/{{$todo['id']}}'">Edit</button>
            {{-- fitur delete harus menggunakan form lagi. tombol hapusnnya disimpan di tag button --}}
            <form action="/destroy/{{$todo['id']}}" method="post" style="display: flex">
                @csrf
                {{-- menimpan method="POST", karena di route nya menggunakan method delete --}}
                @method('DELETE')
                
                <button type="submit" class="btn btn-warning me-1 text-light" >Hapus</button>
            </form>
            @if($todo['status'] == 0)
            <form action="/completed/{{$todo['id']}}" method="post">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success">Completed</button>
            </form>
            @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection