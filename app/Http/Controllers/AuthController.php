<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
      return view('login');
    }

    public function loginPost(Request $request){
      if (Auth::attempt(['email' => $request->email,'password' => $request->password])){
        return redirect()->route('homepage');
      }
      return redirect()->route('admin.login')->withErrors('Email adresi veya Şifre hatalı!');
    }

    public function logout(){
      Auth::logout();
      return redirect()->route('admin.login');
    }
}
