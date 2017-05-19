<?php

namespace ZfMetal\Commons\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use \DoctrineORMModule\Form\Annotation\AnnotationBuilder as DoctrineAnnotationBuilder;

class FormBuilder extends AbstractPlugin {

    /**
     *
     * @var \ZfMetal\Commons\Service\FormBuilder
     */
    protected $serviceFormBuilder;

    function getServiceFormBuilder() {
        if(!$this->serviceFormBuilder){
            throw new Exception("Service Form Builder need be Injected");
        }
        return $this->serviceFormBuilder;
    }

        
    function setFormBuilder(\ZfMetal\Commons\Service\FormBuilder $formBuilder) {
        $this->formBuilder = $formBuilder;
        return $this;
    }

    function __construct(\ZfMetal\Commons\Service\FormBuilder $serviceFormBuilder) {
        $this->serviceFormBuilder = $serviceFormBuilder;
    }

    public function __invoke(\Doctrine\ORM\EntityManager $em, $entityName, $addSubmit = true, $addId = false) {
        $serviceFormBuilder =  $this->getServiceFormBuilder();
        return $serviceFormBuilder($em, $entityName, $addSubmit, $addId);
    }

}
