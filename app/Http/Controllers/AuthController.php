<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

      public function authenticate(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

    

        $credentials = $request->only('email', 'password');

        

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
           
            return redirect()->intended(route('dashboard'));
        }


       
        return back()->withInput()->with('error', 'Login Failed');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
