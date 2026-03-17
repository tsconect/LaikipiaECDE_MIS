<?php


namespace App\Classes;

use App\Helpers\PhoneHelper;
use App\Models\SMS;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendSms
{
    public function sendSms($phoneNumber, $message, $isOtp = null)
{


    $isOtp = $isOtp ?? null;
    try {



        $response = Http::post('https://tsconect.com/api/partner/send-sms', [
            'api_token' => 'NLSJAexZkbcgIClGwmYfz1pFxLx18WOYaI6dcLIxnWZ0T1iI2uG5dZb9vPxW',
            'sender_id' => 'TSPAY',
            'number'    => $phoneNumber,
            'message'   => $message,
            'is_otp'    => $isOtp,
        ]);

        $status = null;

    
        $phoneNumber = PhoneHelper::normalizePhoneNumber($phoneNumber);
        if(!$phoneNumber){
            $status = 'failed';
        }


        if ($response->successful()) {
            $data = $response->json();
            
            $status = 'success';

        } else {
            Log::error($response->json());
            $status = 'failed';
        }

        $cost = 1;

        $segments = ceil(strlen($message) / 160);
        $cost = $segments * $cost;

        $sms = new SMS();
        $sms->phone_number = $phoneNumber;
        $sms->date_sent = now();
        $sms->message = $message;
        $sms->created_by = auth()->id() ?? null;
        $sms->status = $status;
        $sms->cost = $cost??1;
        $sms->save();

       

        return $status;

    } catch (\Throwable $th) {
        //throw $th;
        
        Log::error($th);
    }
}


}
