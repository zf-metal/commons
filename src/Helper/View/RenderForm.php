<?php

namespace ZfMetal\Commons\Helper\View;

use Zend\View\Helper\AbstractHelper;

class RenderForm extends AbstractHelper {

    
     const partial_prefix = "zf-metal/commons/form/";
    
    /**
     *
     * @var \ZfMetal\Commons\Options\ModuleOptions
     */
    private $moduleOptions;
    private $style;
    private $columns;
    private $partial;

    function __construct(\ZfMetal\Commons\Options\ModuleOptions $moduleOptions) {
        $this->moduleOptions = $moduleOptions;
    }

    public function __invoke($form, $style = null, $columns = null) {

        if ($style) {
            $this->setStyle($style);
        }

        if ($columns) {
            $this->setColumns($columns);
        }

        return $this->view->partial($this->getPartial(), array("form" => $form,"style" => $this->getStyle()) );
    }
    
    protected function getPartial(){
        if(!$this->partial){
            $this->buildPartial();
        }
        return $this->partial;
    }

    protected function buildPartial() {
        return self::partial_prefix . $this->getColumns();
    }

    protected function getStyle() {
        if (!$this->style) {
            $this->style = $this->moduleOptions->getFormStyle();
        }
        return $this->style;
    }

    protected function setStyle($style) {
        if (!array_key_exists($style, \ZfMetal\Commons\Constant\Form::STYLE)) {
            throw new Exception("style " . $style . " not exist.");
        }
        $this->style = $style;
    }
    
      protected function setColumns($columns) {
        if (!array_key_exists($columns, \ZfMetal\Commons\Constant\Form::COLUMNS)) {
            throw new Exception("columns " . $columns . " not exist.");
        }
        $this->columns = $columns;
    }
    
    function getColumns() {
        return $this->columns;
    }



}
