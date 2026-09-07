<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Redis;

class AuthController extends Controller {

    public function login() {
        return view('auth/login');
    }

    public function loginProses(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required'        => 'Username tidak boleh kosong!',
            'password.required'     => 'Password tidak boleh kosong!'
        ]);

        $data = array(
            'username' => $request->username,
            'password' => $request->password,
        );

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->back()->with('error', 'Username atau Password salah!');// with untuk memberi session error dengan pesan
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
