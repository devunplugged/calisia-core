<?php
namespace CalisiaCore\Exceptions;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class CalisiaException extends \Exception{
    private $userMessage;

    public function __construct($message, $userMessage){
        parent::__construct($message);
        $this->userMessage = $userMessage;
    }

    public function getUserMessage(){
        return $this->userMessage;
    }
    
}