<?php
namespace CalisiaCore\Inputs;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}


class Input{
    public $label = "label";
    public $type = "text";
    public $id;
    public $name;
    public $class;
    public $value;

    public function Render(\CalisiaCore\Interfaces\IRenderer $renderer, bool $render = true, string $template = CALISIA_CORE_ROOT . '/templates/inputs/default-input'){
        return $renderer->render(
            $template,
            [
                'label' => $this->label,
                'type' => $this->type,
                'id' => $this->id,
                'name' => $this->name,
                'class' => $this->class,
                'value' => $this->value
            ],
            $render
        );
    }
}

