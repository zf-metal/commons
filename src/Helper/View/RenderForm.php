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

    public function __invoke($form, $style = null, $columns = null, array $classes = []) {

        if ($style) {
            $this->setStyle($style);
        }

        if ($columns) {
            $this->setColumns($columns);
        }

        $this->applyClasses($form, $classes);

        return $this->view->partial($this->getPartial(), array("form" => $form, "style" => $this->getStyle()));
    }

    protected function applyClasses($form, $classes) {
        if (is_array($classes)) {
            foreach ($form->getElements() as $element) {
                foreach ($classes as $class) {
                    $element->setAttribute('class', $class);
                }
            }
        }
    }

    protected function getPartial() {
        if (!$this->partial) {
            $this->partial = $this->buildPartial();
        }

        return $this->partial;
    }

    protected function buildPartial() {
        return self::partial_prefix . $this->getColumns();
    }

    protected function getStyle() {
        if (!$this->style) {
            $this->style = $this->getModuleOptions()->getFormStyle();
        }
        return $this->style;
    }

    protected function setStyle($style) {
        if (!array_key_exists($style, \ZfMetal\Commons\Consts::STYLE)) {
            throw new Exception("style " . $style . " not exist.");
        }
        $this->style = $style;
    }

    protected function setColumns($columns) {
        if (!array_key_exists($columns, \ZfMetal\Commons\Consts::COLUMNS)) {
            throw new \Exception("columns " . $columns . " not exist.");
        }
        $this->columns = $columns;
    }

    function getColumns() {
         if (!$this->columns) {
            $this->columns = $this->getModuleOptions()->getFormColumns();
        }
        return $this->columns;
    }
    
    function getModuleOptions() {
        return $this->moduleOptions;
    }

    function setModuleOptions(\ZfMetal\Commons\Options\ModuleOptions $moduleOptions) {
        $this->moduleOptions = $moduleOptions;
    }



}
