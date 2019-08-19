<?php
/**
 * Emmanuel
 *
 * @var string
 */

class App
{

    public function email_alert($email,$description,$parameters){
    	$email_facade = new Email;
    	$email_facade->email_alert($email,$description,$parameters);
    }
}

