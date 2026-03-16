<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Classes\SendSms;
use Illuminate\Http\Request;
use App\Models\StudentDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|',
            'gender' => 'required|string',
            'id_birth_cert_no' => 'required|string|unique:student_details',
            'dateOfBirth' => 'required|date',
            'sub_county' => 'required|string',
            'ward' => 'required|string',
            'location' => 'required|string',
            'phone_number' => 'required|string|',
        ]);
        if ($request->password !== $request->c_password) {
            return back()->withInput($request->only('email'))
                         ->withErrors(['c_password' => 'The password confirmation does not match.']);
        }

        // Create the User
        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'middle_name' => 'n/a',
            'role' => 'student',
            'phone_number' => $validatedData['phone_number'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Hash the password
        ]);

        // Create the StudentDetails
        $studentDetails = new StudentDetails([
            'gender' => $validatedData['gender'],
            'id_birth_cert_no' => $validatedData['id_birth_cert_no'],
            'date_of_birth' => $validatedData['dateOfBirth'],
            'county' => 'Laikipia',
            'sub_county' => $validatedData['sub_county'],
            'ward' => $validatedData['ward'],
            'location' => $validatedData['location'],
            'location_id' => $validatedData['location'],

        ]);

        if($user->phone_number){
            $phoneNumber = $user->phone_number;   
            if (substr($phoneNumber, 0, 1) === '0') {
                $phoneNumber = '254' . substr($phoneNumber, 1);
            }
            $name = $request->name;
            $responseStatusCodes =[];
            $sendSms = new SendSms();
            $message = "Hello ".$user->first_name.", Your Registration to the Laikipia county Bursary system was Successful. To get notified  or to apply to open bursaries please login to  your account";

            $statusCode = $sendSms->sendSms($phoneNumber, $message);
        
       

        }

        $user->studentDetails()->save($studentDetails);

        return redirect()->back()->with('success', 'Registration successful.Now you can login.');
    }
}
