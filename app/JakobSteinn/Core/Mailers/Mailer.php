<?php namespace JakobSteinn\Core\Mailers;

use Illuminate\Support\Facades\Mail;
use JakobSteinn\Users\Customer;

abstract class Mailer {

	public function sendTo($email, $subject, $view, $data = [])
	{
		return Mail::queue($view, $data, function($message) use ($subject, $email)
		{
			$message->to($email)
					->subject($subject);
		});
	}
}
