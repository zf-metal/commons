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
     *
     * @var integer 
     */
    protected $formProcessMsjOk = "Registro guardado";
    
    /**
     *
     * @var integer 
     */
    protected $formProcessMsjFail = "Datos invalidos o incompletos. Por favor revisar formulario.";
    

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
    
    function getFormProcessMsjOk() {
        return $this->formProcessMsjOk;
    }

    function getFormProcessMsjFail() {
        return $this->formProcessMsjFail;
    }

    function setFormProcessMsjOk($formProcessMsjOk) {
        $this->formProcessMsjOk = $formProcessMsjOk;
        return $this;
    }

    function setFormProcessMsjFail($formProcessMsjFail) {
        $this->formProcessMsjFail = $formProcessMsjFail;
        return $this;
    }






}
