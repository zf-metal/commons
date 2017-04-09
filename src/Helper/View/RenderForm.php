<?php

namespace ZfMetal\Commons\Helper\View;

use Zend\View\Helper\AbstractHelper;

class RenderForm extends AbstractHelper {

    const partial = "zf-metal/commons/form/form";
    const column_class = [
        \ZfMetal\Commons\Consts::COLUMNS_ONE => 'col-lg-12 col-md-12 col-xs-12',
        \ZfMetal\Commons\Consts::COLUMNS_TWO => 'col-lg-6 col-md-6 col-xs-12',
        \ZfMetal\Commons\Consts::COLUMNS_THREE => 'col-lg-4 col-md-4 col-xs-12',
        \ZfMetal\Commons\Consts::COLUMNS_FOUR => 'col-lg-3 col-md-3 col-xs-12'
    ];

    /**
     *
     * @var \ZfMetal\Commons\Options\ModuleOptions
     */
    private $moduleOptions;
    private $style;
    private $columns;

    function __construct(\ZfMetal\Commons\Options\ModuleOptions $moduleOptions) {
        $this->moduleOptions = $moduleOptions;
    }

    public function __invoke($form, $style = null, $columns = null, array $groups = null) {

        if ($style) {
            $this->setStyle($style);
        }

        if ($columns) {
            $this->setColumns($columns);
        }

        return $this->view->partial(
                        self::partial, array(
                    "form" => $form,
                    "style" => $this->getStyle(),
                    'columnClass' => self::column_class[$this->getColumns()],
                    'groups' => $groups
        ));
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
