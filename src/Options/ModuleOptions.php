<?php

namespace ZfMetal\Commons\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions {

    /**
     *
     * @var string
     */
    protected $formStyle;

    /**
     *
     * @var integer 
     */
    protected $formColumns;

    /**
     * Constructor
     */
    public function __construct($options = null) {
        $this->__strictMode__ = false;
        parent::__construct($options);
    }

    function getFormStyle() {
        return $this->formStyle;
    }

    function getFormColumns() {
        return $this->formColumns;
    }

    function setFormStyle($formStyle) {
        $this->formStyle = $formStyle;
    }

    function setFormColumns($formColumns) {
        $this->formColumns = $formColumns;
    }




}
