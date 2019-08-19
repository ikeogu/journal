<?php
/**
 * Emmanuel
 *
 * @var string
 */

namespace App\Strategies;

use App\Facades\App;
use App\Strategies\Email;
use SendGrid;
use Response;

class EmailStrategy extends App
{
    //
    public $email;
    public $description;
    public $subject;
    public $themessage;
    public $from = 'Support';
    // public $key = "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" ; // dyke
    public $key = "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" ;  // kyleads



    public function send_support(){
        $et = new Email_templates;
        $admins = ['ikeogu322@gmail.com'];
        $subject = 'Support Message';
        $themessage = $et->support_message($this->parameters);
        foreach ($admins as $key => $value) {
            $this->email = $value;
            $this->subject = $subject;
            $this->themessage = $themessage;
            Email::sendgrid();
        }
    }

    public function email_alert($email,$description,$parameters)
    {
        $this->description = strtolower($description);
        $this->parameters = $parameters;
        $et = new Email_templates;
        if (!empty($email) AND !empty($description)) {
            if ($description == 'welcome') {
                $subject = 'Kyleads Welcome';
                $themessage = $et->welcome_message($parameters);
            }elseif ($description == 'forgot_password') {
                $subject = 'Forgot password';
                $themessage = $et->forgot_password($parameters);
            }elseif ($description == 'changed_password') {
                $subject = 'Password Changed';
                $themessage = $et->changed_password($parameters);
            }elseif ($description == 'activate_account') {
                $subject = 'Activate Account';
                $themessage = $et->activate_account($parameters);
            }elseif ($description == 'support_response') {
                $subject = 'Support Message';
                $themessage = $et->support_response($parameters);
                Email::send_support();
            }elseif ($description == 'resend_confirmation_link') {
                $subject = 'Confirmation link';
                $themessage = $et->resend_confirmation_link($parameters);
            }else{
                $data = ['status'=>'warning','message'=>'template not found'];
            }
            $this->email = $email;
            $this->subject = $subject;
            $this->themessage = $themessage;
            $data = Email::sendgrid();
        }else{
            $data = ['status'=>'warning','message'=>'email and description is required'];
        }
        return Response::json($data);
    }

    private function sendgrid()
    {
        //if (env('APP_ENV') == 'production') {
            if (!empty($this->themessage) AND !empty($this->subject)) {
                $the_mailer = new SendGrid($this->key);
                $from = new SendGrid\Email($this->from, "hello@kyleads.com");
                $to = new SendGrid\Email("Customer", $this->email);
                $content = new SendGrid\Content("text/html", $this->themessage);
                $mail = new SendGrid\Mail($from, $this->subject, $to, $content);
                $response = $the_mailer->client->mail()->send()->post($mail);
                $data = ['status'=>'success','message'=>'email sent'];
                return $data;
            }
        //}
    }
}
