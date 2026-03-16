<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Models\StudentDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        
        $credentials = $request->only('id_birth_cert_no', 'password');

        // Attempt authentication based on id_birth_cert_no
        $studentDetails = StudentDetails::where('id_birth_cert_no', $credentials['id_birth_cert_no'])->first();

        if ($studentDetails && Auth::attempt(['id' => $studentDetails->user_id, 'password' => $credentials['password']])) {           
             return redirect()->intended('/students/dashboard'); 
        }
        return redirect()->back()->withErrors(['error' => 'Invalid credentials']);
    }
      
    public function admin_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            if (auth()->user()->role === 'admin') {
                return redirect()->intended(route('admin.home'));
            } elseif (auth()->user()->role === 'chief') {
                return redirect()->intended(route('chief.home'));
            } else {
                Auth::logout();
                return redirect()->back()->with('error', 'You do not have access to this section.');
            }
        } else {
            return redirect()->back()->withInput($request->only('email'))->withErrors([
                'email' => 'The provided credentials are incorrect.',
            ]);
        }
    }

    public function admin_login_view()
    {
        return view('auth.login');
    }
    
    

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home')->with('warning', 'You have been logged out.'); 
    }
}
