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
    public $settingsPageSlug;
    public $text;

    private $renderer;
    
    function __construct(IRenderer $renderer){
        $this->renderer = $renderer;
    }

    public function add(){
        \add_settings_section( 
            $this->id,
            $this->title,
            [$this, 'render'],
            $this->settingsPageSlug 
        );
    }

    public function render(){
   
        $this->renderer->render(
            $this->template,
            [
                'text' => $this->text
            ]
        );
    }  
}