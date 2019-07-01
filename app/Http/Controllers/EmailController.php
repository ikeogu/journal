<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Notification;
use App\Notifications\MailSent;

class EmailController extends Controller
{
    //



    public function send(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'subject' => 'min:3',
            'body' => 'string',
            'name' => 'required'
        ]);

        $data = [

            'subject' => $request->subject,

            'bodyMessage' => $request->body,
            'name' => $request->name
        ];
        $emailAddress =[
            'email' => $request->email
        ];

        Mail::send('Mail.send', $data, function($message) use ($data){
            $message->from(auth()->user()->email, auth()->user()->name);
            $message->to($emailAddress['email']);
            $message->subject($data['subject']);
        });

        Notification::route('mail', $request->email)
            ->notify(new MailSent());
            return redirect(route('about'));
    }



}
