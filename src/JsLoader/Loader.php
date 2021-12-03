<?php
namespace CalisiaCore\JsLoader;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class JsLoader{
    public function load($name, $filePath, $validator, $deps = array(), $ver = false, $in_footer = false){
        if($validator() === true){
            wp_enqueue_script($name, $filePath, $deps, $ver, $in_footer);
            return true;
        }
        return false;
    }

    public function injectObject($scriptName, $jsObjectName, $values){
        wp_localize_script( $scriptName, $jsObjectName, $values );
    }
}