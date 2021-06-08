<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function indexLogin(){
        return view('auth.login');
    }
    public function indexRegister(){
        return view('auth.register');
    }

    
    
    
    
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($request->rememberme) {
            $rememberme = true;
        } else {
            $rememberme = false;
        }
        
        if ( Auth::attempt($request->only('email', 'password'), $rememberme) ) {
            return redirect()->route('index');
        } else {
            return back()->with('fail', 'Terjadi Kesalahan, Mohon kontak Contact Person');
        }
    }
    
    
    
    
    
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'whatsapp' => '',
            'alamat' => '',
            'ongkir' => '',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('index');
        } else {
            return back()->with('fail', 'Terjadi Kesalahan, Mohon kontak Contact Person');
        }
    }

    
    
    
    
    public function logout() {
        if (Auth::user()) {
            Auth::logout();
        }
        return redirect()->route('index');
    }
}
