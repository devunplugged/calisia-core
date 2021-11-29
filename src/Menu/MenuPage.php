<?php
namespace CalisiaCore\Menu;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

use CalisiaCore\Interfaces\IRenderer;

class MenuPage{
    public $pageTitle;
    public $menuTitle;
    public $capability;
    public $menuSlug;
    public $template = CALISIA_CORE_ROOT . '/templates/default-settings-page';
    public $templateVars = [];
    public $iconUrl = '';
    public $position = null;
    public $settingsPage = 'my-settings-page';
    public $optionGroup = 'my-option-group';
    public $saveButtonText = 'Save';


    private $renderer;
    
    function __construct(IRenderer $renderer){
        $this->renderer = $renderer;
    }

    public function Add(){
        \add_menu_page(
            $this->pageTitle,
            $this->menuTitle,
            $this->capability,
            $this->menuSlug,
            [$this, 'Render'],
            $this->iconUrl,
            $this->position
        );
    }

    public function Render(){
        $this->renderer->render(
            $this->template,
            [
                'title' => $this->pageTitle,
                'settingsPage' => $this->settingsPage,
                'optionGroup' => $this->optionGroup,
                'templateVars' => $this->templateVars,
                'saveButtonText' => $this->saveButtonText,
            ]
        );
    }
}