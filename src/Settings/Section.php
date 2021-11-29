<?php
namespace CalisiaCore\Settings;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

use CalisiaCore\Interfaces\IRenderer;

class Section{
    public $id;
    public $title;
    public $template = CALISIA_CORE_ROOT . '/templates/default-settings-section';
    public $pageSlug;
    public $text;

    private $renderer;
    
    function __construct(IRenderer $renderer){
        $this->renderer = $renderer;
    }

    public function Add(){
        \add_settings_section( 
            $this->id,
            $this->title,
            [$this, 'Render'],
            $this->pageSlug 
        );
    }

    public function Render(){
   
        $this->renderer->render(
            $this->template,
            [
                'text' => $this->text
            ]
        );
    }  
}