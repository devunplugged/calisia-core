<?php
namespace CalisiaCore\Metaboxes;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

use CalisiaCore\Interfaces\IRenderer;

class Metabox{
    public $id;
    public $title;
    public $screen; //where to display metabox
    public $context; //context in which to display metabox; place on screen
    public $priority;
    public $template = CALISIA_CORE_ROOT . '/templates/default-metabox';
    public $templateVars = [];
    private $renderer;
    
    function __construct(IRenderer $renderer){
        $this->renderer = $renderer;
    }

    public function add(){
        \add_meta_box( 
            $this->id, 
            $this->title, 
            [$this, 'render'], 
            $this->screen, 
            $this->context, 
            $this->priority
        );
    }

    public function render(){
        $this->renderer->render(
            $this->template,
            [
                'templateVars' => $this->templateVars,
            ]
        );
    }
    
}