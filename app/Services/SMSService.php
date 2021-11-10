<?php 
namespace App\Services;
use Auth;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
class SMSService 
{
	public static function notify($number,$message)
    {
        $twilio_number = env("TWILIO_NUMBER");
        $account=env("TWILIO_ACCOUNT_SID");
        $auth_token=env("TWILIO_AUTH_TOKEN");
        $client = new Client($account,$auth_token);
        $client->messages->create(
            // Where to send a text message (your cell phone?)
            $number,
            array(
                'from' => $twilio_number,
                'body' => $message
            )
        );
        
                
    }
}