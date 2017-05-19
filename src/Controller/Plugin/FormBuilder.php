<?php

namespace ZfMetal\Commons\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use \DoctrineORMModule\Form\Annotation\AnnotationBuilder as DoctrineAnnotationBuilder;

class FormBuilder extends AbstractPlugin {

    /**
     *
     * @var \ZfMetal\Commons\Service\FormBuilder
     */
    protected $formBuilder;

    function getFormBuilder() {
        return $this->formBuilder;
    }

    function setFormBuilder(\ZfMetal\Commons\Service\FormBuilder $formBuilder) {
        $this->formBuilder = $formBuilder;
        return $this;
    }

    function __construct(\ZfMetal\Commons\Service\FormBuilder $formBuilder) {
        $this->formBuilder = $formBuilder;
    }

    public function __invoke(\Doctrine\ORM\EntityManager $em, $entityName, $addSubmit = true, $addId = false) {
        return $this->formBuilder($em, $entityName, $addSubmit, $addId);
    }

}
