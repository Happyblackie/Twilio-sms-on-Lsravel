<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Exception;
use Twilio\Rest\Client;
  
class TwilioSMSController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $receiverNumber = "+254743828215";//recipient number
        $message = "All About Laravel";
  
        try {
  
            $account_sid = getenv("TWILIO_SID"); /* all are from twilio .env file */
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
  
            $client = new Client($account_sid, $auth_token);//making client requests
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);

            dd('SMS Sent Successfully.');
            return('SMS Sent Successfully.');//message success
  
        } catch (Exception $e) { //otherwise error
            dd("Error: ". $e->getMessage());
        }
    }
}