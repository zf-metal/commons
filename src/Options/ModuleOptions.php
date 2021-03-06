<?php

namespace ZfMetal\Commons\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions {


    /**
     *
     * @var string
     */
    protected $title;


    /**
     *
     * @var string
     */
    protected $tabTitle;


    /**
     *
     * @var string
     */
    protected $pageTitle;


    /**
     *
     * @var string
     */
    protected $domain;



    /**
     *
     * @var string
     */
    protected $copyright;

    /**
     *
     * @var string
     */
    protected $author;



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

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTabTitle()
    {
        return $this->tabTitle;
    }

    /**
     * @param string $tabTitle
     */
    public function setTabTitle($tabTitle)
    {
        $this->tabTitle = $tabTitle;
    }

    /**
     * @return string
     */
    public function getPageTitle()
    {
        return $this->pageTitle;
    }

    /**
     * @param string $pageTitle
     */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
    }



    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return string
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * @param string $copyright
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
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
