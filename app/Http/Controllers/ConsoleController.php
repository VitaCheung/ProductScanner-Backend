<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class ConsoleController extends Controller
{
    // public function authenticate(Request $request): RedirectResponse
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);
 
    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         Auth::loginUsingId(1);
    //         return redirect()->intended('dashboard');
    //     }
    //     if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
    //         // The user is being remembered...
    //         Auth::loginUsingId(1, $remember = true);
    //         return redirect()->intended('dashboard');
    //     }
 
    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ])->onlyInput('email');
    // }



    public function loginForm()
    {
        return view('console.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect('/console/dashboard');
        } else {
            // Invalid email/password combination
            return back()->withErrors([
                'email' => 'Invalid email/password combination',
            ]);
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout(); // Use the 'web' guard for session-based authentication
        return redirect('/');
    }


    public function dashboard()
    {
        return view('console.dashboard');
    }


}
