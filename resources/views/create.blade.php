@extends('layout')

@section('content')
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
    <form action="/store" method="POST" style="max-width: 500px; margin: auto; margin-bottom: 220px" >
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- untuk mengirim data ke controller yang nantinya di tampung oleh Request $request -->
    @csrf
        <div class="d-flex flex-column text-dark">
            <label style="color: black;">Title</label>
            <input type="text" name="tittle" class="rounded-1">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex flex-column text-dark">
            <label style="color: black;">Date</label>
            <input type="date" name="date" class="rounded-1">
            @error('date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex flex-column text-dark">
            <label style="color: black;">Description</label>
            <textarea name="description" class="rounded-1" id="" cols="30" rows="10"></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <button type="submit" class="tombol_login">Kirim</button>
    </form>
@endsection