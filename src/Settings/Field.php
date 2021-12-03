<?php
namespace CalisiaCore\Settings;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

use CalisiaCore\Interfaces\IRenderer;

class Field{
   // public $optionGroup;
    public $optionName;
    public $input;
    public $id;
    public $title;
    public $page;
    public $sectionId;
    public $template;

    private $renderer;
    
    function __construct(IRenderer $renderer){
        $this->renderer = $renderer;
    }

    

    public function add(){
        \add_settings_field(
            $this->id,
            $this->title,
            [$this, 'render'],
            $this->page, 
            $this->sectionId
        );
    }

    public function render(){

        $this->input->id = $this->id;
        $this->input->name = $this->optionName . '[' . $this->id . ']';
        //$this->input->class = 'my-input-class';
        
        if($this->template){
            $this->input->render($this->renderer, true, $this->template);
        }else{
            $this->input->render($this->renderer);
        }
    }

    
}