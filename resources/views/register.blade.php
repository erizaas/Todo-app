@extends('layout')

@section('content')
    <body>
        <div class="kotak_register">
		<p class="tulisan_register"><strong>Sign Up</strong></p>
		@error('password')
		<div class="alert alert-danger">{{ $message }}</div>
		@enderror
			<form action="/register" method="POST">
			@csrf
			<div class="nmclass">
				<label>Name</label>
				<input  id="form_login"type="text" name="name" class="rounded-3" placeholder="Enter name" required>
			</div>
            <div class="emlclass">
				<label>Email</label>
				<input id="form_login" type="text" name="email" class="rounded-3" placeholder="Enter email" required>
			</div>
            <div class="usrclass">
				<label>Username</label>
				<input id="form_login" type="text" name="username" class="rounded-3" placeholder="Enter username" required>
			</div>
			<div class="pwsclass">
				<label>Password</label>
				<input id="form_login" type="password" name="password" class="rounded-3" placeholder="Enter password" required>
			</div>
 
			<div class="text-center">
				<input type="submit" class="tombol_login rounded-3 mb-3" value="REGISTER NOW">
				{{-- <i type="button" class="fa-regular fa-left-long" onclick="location.href='/#'"></i> --}}
				<a href="/#" style="text-decoration: none;" class="text-center">BACK LOGIN</a>
			</div>
		</form>

		{{ session('berhasil') }}
		
	</div> 
@endsection