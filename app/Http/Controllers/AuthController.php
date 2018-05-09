<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\User;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    }

    public function register()
    {
        return view('register');
    }

    public function makeUser()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'checkbox' => 'required'
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        Mail::to($user)->send(new Welcome($user));

        auth()->login($user);

        return redirect()->home();
    }

    public function login()
    {
        return view('login');
    }

    public function startSession()
    {
        if (!auth()->attempt(request(['email', 'password']))) {
            return back();
        }

       return redirect()->intended();
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->home();
    }
}
