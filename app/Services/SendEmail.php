<?php
declare(strict_types=1);
namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Services\Contracts\SendEmailInterface;

class SendEmail implements SendEmailInterface
{


	/** 
    * Send Email function after user has been deleted from the system
    * 
    * @param array
    * @return void
    */
	public function sendMail(array $userDetails)
	{
		Mail::send([], [], function ($message)use($userDetails) {
		  	$message->to($userDetails['email'])
		    	->subject('Your Details Have Been Deleted From Our Records')
		    	->setBody("Hi {$userDetails['name']},\n\n 
		    		As per your request, your account data has been deleted from our records.\n We’re sorry to see you go,
		    		but you can always come back if you change your mind.\n
					Best regards,\n
					Home Team."); 
			});

	}
}