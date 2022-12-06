<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
class LoginController extends Controller
{
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::success('Selamat', 'Kamu Berhasil Login!');
            return redirect()->intended('dashboard');
        }
 
        return back()->with('error', 'Login Gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('logout', 'Berhasil Logout!');
    }
}
