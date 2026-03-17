<?php

namespace App\Http\Controllers;

use App\Classes\SendSms;
use App\Helpers\PhoneHelper;
use App\Models\SMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CommunicationController extends Controller
{
    public function index(){

        $response = Http::get('https://tsconect.com/api/partner/balance', [
            'api_token' => 'NLSJAexZkbcgIClGwmYfz1pFxLx18WOYaI6dcLIxnWZ0T1iI2uG5dZb9vPxW',

        ]);

        $data = $response->json();




        $status     = $data['status'];
        $balance    = $data['balance'];
        $usage      = $data['usage'];
        $totalCost  = $data['total_cost'];
        $history    = $data['history'];
        $sendSms = new SendSms();

        // $message = 'TEST MESSAGE.';
        // $phoneNumber = '0798985851';
        //   $phoneNumber = PhoneHelper::normalizePhoneNumber($phoneNumber);
        // if (substr($phoneNumber, 0, 1) === '0') {
        //     $phoneNumber = '254' . substr($phoneNumber, 1);
        // }
        // $statusCode = $sendSms->sendSms($phoneNumber, $message);
        return view('admin.sms.index', compact('status', 'balance', 'usage', 'totalCost', 'history'));






    
    }

    public function sms_logs(Request $request){
        $query = SMS::query();

        // if ($request->filled('q')) {
        //     $q = $request->q;
        //     $query->where(function($sub) use ($q) {
        //         $sub->where('phone_number', 'like', '%' . $q . '%')
        //             ->orWhere('message', 'like', '%' . $q . '%');
        //             // ->orWhere('name', 'like', '%' . $q . '%');
        //     });
        // }

        // if ($request->filled('status')) {
        //     $query->where('status', $request->status);
        // }

        $messages = $query->latest()->get();

        $stats = [
            'total' => SMS::count(),
            'sent' => SMS::where('status', 'Sent')->count(),
            'failed' => SMS::where('status', 'Failed')->count(),
            'today' => SMS::whereDate('created_at', now()->today())->count(),
        ];

        return view('admin.sms.sms-logs', compact('messages', 'stats'));
    }

    public function sendSms(Request $request){
        $request->validate([
            'name' => 'nullable',
            'phone_number' => 'required|string',
            'message' => 'required|string',

        ]);

        $phoneNumber = PhoneHelper::normalizePhoneNumber($request->phone_number);
        if(!$phoneNumber){
            
            return redirect()->back()->with('error', 'Invalid number');
            
        }



        $sendSms = new SendSms();
        $message =  $request->message;
        $statusCode = $sendSms->sendSms($phoneNumber, $message);

        return redirect()->back()->with('success', 'Message sent successfully');
        return $statusCode;
    }
}
