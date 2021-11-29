<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
use Reminder;
use Mail;
use App\User;

class ForgotPassword extends Controller
{
    public function forgot(){
    	return view('security.forgot');
    }
    public function password(Request $request){
    	//return view('security.forgot');
    	$user = User::whereEmail($request->email)->first();
    	if ($user==null) {
    		return redirect()->back()->with(['error'=>'Email does not exist']);
    	} 
    	$user = Sentinel::findById($user->id);
    	$reminder = Reminder::exists($user) ? : Reminder::create($this->sendEmail($user, $reminder->code));

    	return redirect()->back()->with(['succes' => 'Reset code submitted successfully to your email']);
    }
    public function sendEmail($user, $code){
    	Mail::send('email.forgot',
    	['user'=>$user, 'code' => $code],
    	//$message->to($user->email);
    	function($message) use ($user){
    		$message->to($user->email);
    		$message->subject(" $user->name, reser your password");
    	});
    }
}
