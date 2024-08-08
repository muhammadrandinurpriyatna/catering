<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function signIn()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
        return view('pages.sign-in');
    }

    public function signInAction(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }else{
            return redirect()->back()->withErrors(['error' => 'Invalid credentials.']);
        }
    }

    public function signUp()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
        return view('pages.sign-up'); 
    }

    public function signUpAction(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:customer,merchant',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        Auth::login($user);

        return redirect()->intended('dashboard');
    }

    public function signOut()
    {
        Auth::logout();
        return redirect()->route('sign-in');
    }
}
