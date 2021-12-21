<?php
namespace CalisiaCore\Factories;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

use CalisiaCore\Mail\Mailer;
use CalisiaCore\Mail\WpMail;

class MailerFactory{
    public static function create(){

        $service = new WpMail();

        return new Mailer($service);
    }
}