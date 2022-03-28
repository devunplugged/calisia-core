<?php

namespace CalisiaCore\Renderer;

if (!defined('ABSPATH')) {
    exit();
}



class DefaultRenderer implements \CalisiaCore\Interfaces\IRenderer
{
    public function render(string $templatePath, array $args = [], bool $render = true)
    {

        foreach($args as $key => $value){
            $$key = $value;
        }


        if (!$render)
            ob_start();

        include  $templatePath . '.php';

        if (!$render) {
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
    }
}
