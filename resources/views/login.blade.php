<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    @extends('layout')

@section('content')
            <div class="kotak_login">
                <p class="tulisan_login"><strong>Sign In</strong></p>
                @if(session('successRegister'))
                    <p class="text-success text-center alert alert-success rounded-3">{{ session('successRegister') }}</p>
                @endif
                @if(session('error'))
                    <p class="text-danger text-center alert alert-danger rounded-3">{{ session('error') }}</p>
                @endif
                @if(session('isLogin'))
                    <p class="text-warning text-center alert alert-warning rounded-3">{{ session('isLogin') }}</p>
                @endif
                @if(session('logout'))
                    <p class="text-success text-center alert alert-success rounded-3">{{ session('logout') }}</p>
                @endif 
                <form action="{{ route('login-baru') }}" method="POST">
                    @csrf
                    <div class="emlclass">
                        <label>Username</label>
                        <input id="form_login" type="text" name="username" class="rounded-3"  placeholder="Masukan Username" required>
                    </div>
                    <div class="pswdclass">
                        <label>Password</label>
                        <input id="form_login" type="password" name="password" class="rounded-3" placeholder="Masukan Password" required>
                    </div>
                    <div class="tmblclass text-center">
                        <button type="submit" class="tombol_login rounded-3 mb-3">LOGIN</button>
                        <a href="register" style="text-decoration: none;">don't have an account yet, sign up here !</a>
                    </div>

                    @endsection

                    
                </form>
                
            </body>
            </html>