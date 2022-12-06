@extends('layout')
@section('content')
@include('sweetalert::alert')
@if (Auth::check())
    <nav class="rounded-5 navbar navbar-expand-lg bg-light" style="margin-top: 22%">
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
@if(session('isGuest'))
<div style="color: white">
    <h2>
        <b>
            <i>
                {{ session('isGuest') }}
            </i>
        </b>
    </h2>
</div>
@endif
@endsection