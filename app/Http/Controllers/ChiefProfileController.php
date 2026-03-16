<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ChiefProfileController extends Controller
{
   
    public function show()
    {
        return view('chief.profile.user-profile');
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
        ]);
        

        auth()->user()->update([
            'first_name' => $request->get('firstname'),
            'last_name' => $request->get('lastname'),
            'email' => $request->get('email') ,
            'phone_number' => $request->get('phone'),
            'role' => 'chief',
        ]);

       

        return back()->with('success', 'Profile updated successfully');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'old-password' => ['required'],
            'password' => ['required', 'min:5'],
            'confirm-password' => ['same:password']
        ]);

        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            if (password_verify($request->old_password, $existingUser->password)) {
                $existingUser->update([
                    'password' => $request->password
                ]);
                return redirect('login');
            } else {

                return back()->with('error', 'Your old password does not match');
            }
        } else {
            return back()->with('error', 'User not found');
        }

        return redirect('login');
    }
}
