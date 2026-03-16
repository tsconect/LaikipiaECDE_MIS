<?php

namespace App\Http\Controllers;

use App\Models\Cheque;
use App\Classes\SendSms;
use Illuminate\Http\Request;
use App\Models\ChequeTransaction;
use App\Models\StudentApplications;

class ChequeController extends Controller
{
    public function index()
    {
        $data = Cheque::all();
        return view('backoffice.cheques.index', compact('data'));
    }

    public function create()
    {
        
        return view('backoffice.cheques.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cheque_number' => 'required',
            'amount' => 'required',
            
        ]);
        $cheque = new Cheque();
        $cheque->cheque_number = $request->cheque_number;
        $cheque->amount = $request->amount;
        $cheque->balance = $request->amount;
        $cheque->school = $request->school_name;
        $cheque->contact_person = $request->contact_person;
        $cheque->status = $request->status;
        $cheque->students = 0;
        $cheque->release_date = now();
        $cheque->save();
        return redirect()->route('admin.cheques.all')->with('success', 'Cheque created successfully');
    }

    public function view($id)
    {
        $cheque = Cheque::find($id);
        return view('backoffice.cheques.view', compact('cheque'));
    }

    public function assign($id)
    {
        $cheque = Cheque::find($id);
        $applications =  StudentApplications::whereHas('committeeReviews')
            ->whereDoesntHave('transactions')
            ->get();
        return view('backoffice.cheques.assign', compact('cheque', 'applications'));
    }
    public function assign_student(Request $request){
        $studentId = $request->student_id;
        $cheque = Cheque::find($request->cheque_id);
        $amount = $request->amount;

        $newBalance = $cheque->balance - $amount;

        if ($newBalance < 0) {
            return back()->with('error','Insufficient balance.Amount allocated is greater than the remaining balance. Please allocate a lesser amount.');

        }

        $cheque->update([
            'balance' => $newBalance,
            'students' => $cheque->students +1,
        ]);

        $application =  StudentApplications::find($request->application_id);

        $application->update([
            'status' => 'Cheque released',
        ]);

            
        if($application->student->user->phone_number){
            $phoneNumber = $application->student->user->phone_number;   
            if (substr($phoneNumber, 0, 1) === '0') {
                $phoneNumber = '254' . substr($phoneNumber, 1);
            }
            $name = $request->name;
            $responseStatusCodes =[];
            $sendSms = new SendSms();
            $message = "Hello ".$application->student->user->first_name.", your cheque of Ksh". $request->amount." has been disbursed. Contact ".$cheque->contact_person." for more information.";

            $statusCode = $sendSms->sendSms($phoneNumber, $message);
        
        }



        $transaction = new ChequeTransaction();
        $transaction->transaction_type = 'student_assignment';
        $transaction->cheque_id = $request->cheque_id;
        $transaction->application_id = $request->application_id;
        $transaction->amount =  $request->amount;
        $transaction->balance = $newBalance; 
        $transaction->save();
        
        return back()->with('success','Students assigned successfully.');

        


    }

    public function assign_students(Request $request)
    {
        $studentIds = $request->input('student_ids', []);
        $studentAmounts = $request->input('student_amounts', []);

        // Find the cheque
        $cheque = Cheque::find($request->cheque_id);

    
        $totalAssignedAmount = array_sum($studentAmounts);

        $totalStudents = count($studentIds);


        $newBalance = $cheque->balance - $totalAssignedAmount;


        if ($newBalance < 0) {
            return back()->with('error','Insufficient balance.Amount allocated is greater than the remaining balance. Please allocate a lesser amount.');

        }

        $cheque->update([
            'balance' => $newBalance,
            'students' => $totalStudents,
        ]);

        foreach ($studentIds as $index => $studentId) {
            $application =  StudentApplications::find($studentId);

            $application->update([
                'status' => 'Cheque released',
            ]);

            
            if($application->student->user->phone_number){
                $phoneNumber = $application->student->user->phone_number;   
                if (substr($phoneNumber, 0, 1) === '0') {
                    $phoneNumber = '254' . substr($phoneNumber, 1);
                }
                $name = $request->name;
                $responseStatusCodes =[];
                $sendSms = new SendSms();
                $message = "Hello ".$application->student->user->first_name.", your cheque of Ksh". $studentAmounts[$index]." has been disbursed. Contact ".$cheque->contact_person." for more information.";

                $statusCode = $sendSms->sendSms($phoneNumber, $message);
            
        

            }



            $transaction = new ChequeTransaction();
            $transaction->transaction_type = 'student_assignment';
            $transaction->cheque_id = $request->cheque_id;
            $transaction->application_id = $studentId;
            $transaction->amount = $studentAmounts[$index];
            $transaction->balance = $newBalance; 
            $transaction->save();
        }
        return back()->with('success','Students assigned successfully.');
    }


}
