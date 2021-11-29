<?php
namespace CalisiaCore\Logger;

class Logger{
    public static function log($element, $type='exception'){
    
        ob_start();
            print_r($element);
        $content = ob_get_contents();
        ob_end_clean();
        
        if($type!='screen'){
            self::to_file($content, $type);
        }else{
            echo '<pre>';
            echo $content;
            echo '</pre>';
        }
    }
    
    private static function to_file($text, $type){
        $fp = fopen(CALISIA_CORE_ROOT . '/logs/' . $type . '-log.txt', 'a');//opens file in append mode.
        fwrite($fp, date('Y-m-d H:i'). ': '. $text . '\n ');
        fclose($fp);
    }
}