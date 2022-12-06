<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request){
        $validateDate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required|min:8',
        ]); 

        $validateDate['password'] = bcrypt($validateDate['password']);

        User::create($validateDate);

        // return back()->with('berhasil', 'Register Berhasil');
        return redirect(' /')->with('successRegister', 'Registrasi Berhasil! Silahkan Login');
    }
}
