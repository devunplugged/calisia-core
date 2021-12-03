<?php
namespace CalisiaCore\Factories;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}


class InputFactory{
    public static function Create(string $type){
        switch($type){
            case 'input': return new \CalisiaCore\Inputs\Input(); break;
        }
    }
}
