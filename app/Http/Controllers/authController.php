<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class authController extends Controller
{
    public function login()
    {
        return view('auth.login', ['title' => 'login']);
    }
    public function authlogin(request $request)
    {
        $validasi = $request->validate([
            // 'email' => ['required', 'email:dns'],
            'name' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();
            if (auth()->user()->level == 'user') {
                Alert::info('login berhasil', 'Hai ' . auth()->user()->name);
                return redirect()->intended('/');
            } else {
                Alert::info('login berhasil', 'Hai ' . auth()->user()->name);
                return redirect()->intended('/');
            }
        } else {
            Alert::warning('login gagal', 'hayo pake akun orang ya');
            return back()->with('gagal', 'login anda gagal!');
        }
    }
    public function logout(request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::success('logout berhasil', 'terima kasih');
        return redirect('/login');
    }
}
