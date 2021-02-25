<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('admin.login');
    }

    public function login()
    {
        $this->validate(request(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = request()->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return back()->withError('email or password is wrong');
        }

        return redirect()->intended('admin/dashboard');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
