<?php


namespace App\Classes;

class SendSms
{
    public function sendSms($phoneNumber, $message)
    {
        $baseUrl = env('SMS_API_BASE_URL');
        $apiKey = env('SMS_API_KEY');
        $username = env('SMS_API_USERNAME');
        $password = env('SMS_API_PASSWORD');
        $senderId = env('SMS_API_SENDER_ID');


        $curl = curl_init();

        curl_setopt_array( $curl, [
            CURLOPT_URL => 'https://quicksms.advantasms.com/api/services/sendsms/',
            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',


        ] );
        curl_setopt($curl, CURLOPT_POSTFIELDS,Array(

            "apikey"=>"d904e2e5969b4a5e269257d9b7cd2149",
            "partnerID"=>"9538",
            "message"=>$message,
            "shortcode"=>"LAIKIPIACG",
            "mobile"=>$phoneNumber

        ));
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_HEADER, false );
        curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );
        $response = curl_exec( $curl );

        
        $status = json_decode($response, true); 
        

        $err = curl_error( $curl );

        curl_close( $curl );
    
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }

       
      
        
      
    }



   
}
