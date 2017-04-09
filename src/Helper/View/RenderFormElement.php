<?php

namespace ZfMetal\Commons\Helper\View;

use Zend\View\Helper\AbstractHelper;

class RenderFormElement extends AbstractHelper {

    const partial_prefix = "zf-metal/commons/form-element/";

    /**
     *
     * @var \ZfMetal\Commons\Options\ModuleOptions
     */
    private $moduleOptions;
    private $style;
    private $partial;

    function __construct(\ZfMetal\Commons\Options\ModuleOptions $moduleOptions) {
        $this->moduleOptions = $moduleOptions;
    }

    public function __invoke($element, $style = null) {

        if ($style) {
            $this->setStyle($style);
        }



        switch ($element->getAttribute('type')) {
            case 'hidden':
                $this->partial = $this->buildPartial('hidden');

                break;
            case 'file':
                $this->partial = $this->buildPartial('file');

                break;
            case 'radio':
                $this->partial = $this->buildPartial('radio');
                
                break;
            case 'checkbox':
            case 'DoctrineModule\Form\Element\ObjectMultiCheckbox':
                $this->partial = $this->buildPartial('checkbox');

                break;
            case 'submit':
            case 'button':
                $this->partial = $this->buildPartial('submit');
                break;
            default:
                $this->partial = $this->buildPartial('default');
                $element->setAttribute('class', 'form-control');
                break;
        }

        return $this->view->partial($this->partial, array("element" => $element));
    }

    protected function buildPartial($type) {
        return self::partial_prefix . $this->getStyle() . "/" . $type;
    }

    protected function getStyle() {
        if (!$this->style) {
            $this->style = $this->moduleOptions->getFormStyle();
        }
        return $this->style;
    }

    protected function setStyle($style) {
        if (!array_key_exists($style, \ZfMetal\Commons\Consts::STYLE)) {
            throw new Exception("style " . $style . " not exist.");
        }
        $this->style = $style;
    }

    function getModuleOptions() {
        return $this->moduleOptions;
    }

    function setModuleOptions(\ZfMetal\Commons\Options\ModuleOptions $moduleOptions) {
        $this->moduleOptions = $moduleOptions;
    }

}
