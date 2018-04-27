<?php

namespace ZfMetal\Commons\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use \DoctrineORMModule\Form\Annotation\AnnotationBuilder as DoctrineAnnotationBuilder;

class FormElementManager extends AbstractPlugin {


    protected $formElementManager;

    /**
     * @return mixed
     */
    public function getFormElementManager()
    {
        return $this->formElementManager;
    }

    /**
     * @param mixed $formElementManager
     */
    public function setFormElementManager($formElementManager)
    {
        $this->formElementManager = $formElementManager;
    }


    function __construct($formElementManager) {
        $this->formElementManager = $formElementManager;
    }

    public function __invoke() {
       return $this->formElementManager;
    }

}
