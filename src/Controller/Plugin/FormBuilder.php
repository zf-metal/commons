<?php

namespace ZfMetal\Commons\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use \DoctrineORMModule\Form\Annotation\AnnotationBuilder as DoctrineAnnotationBuilder;

class FormBuilder extends AbstractPlugin {

    /**
     *
     * @var \DoctrineORMModule\Form\Annotation\AnnotationBuilder
     */
    protected $doctrineAnnotationBuilder;

    /**
     *
     * @var \Zend\Form\Factory
     */
    protected $zendFormFactory;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    function getEm() {
        return $this->em;
    }

    function setEm(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    function getDoctrineAnnotationBuilder() {
        if (!$this->doctrineAnnotationBuilder) {
            $this->doctrineAnnotationBuilder = $this->buildDoctrineAnnotationBuilder();
        }
        return $this->doctrineAnnotationBuilder;
    }

    function setDoctrineAnnotationBuilder(\DoctrineORMModule\Form\Annotation\AnnotationBuilder $doctrineAnnotationBuilder) {
        $this->doctrineAnnotationBuilder = $doctrineAnnotationBuilder;
        return $this;
    }

    function buildDoctrineAnnotationBuilder() {
        $doctrineAnnotationBuilder = new \DoctrineORMModule\Form\Annotation\AnnotationBuilder($this->getEm());

        if ($this->getZendFormFactory()) {
            $doctrineAnnotationBuilder->setFormFactory($this->getZendFormFactory());
        }

        return $doctrineAnnotationBuilder;
    }

    function getZendFormFactory() {
        return $this->zendFormFactory;
    }

    function setZendFormFactory(\Zend\Form\Factory $zendFormFactory) {
        $this->zendFormFactory = $zendFormFactory;
        return $this;
    }

    /**
     * Generate a Form from Entity
     * 
     * @param \Doctrine\ORM\EntityManager $em
     * @param string $entityName
     * @param boolean $addSubmit
     * @return \Zend\Form\Form
     */
    public function __invoke(\Doctrine\ORM\EntityManager $em, $entityName, $addSubmit = true) {
        $this->em = $em;
        $builder = $this->getDoctrineAnnotationBuilder();
        $form = $builder->createForm($entityName);
        if ($addSubmit) {
            $form->add([
                'name' => 'submitbtn',
                'type' => 'Zend\Form\Element\Submit',
                'attributes' => [
                    'value' => "Submit",
                    'class' => 'btn btn-primary',
                ]
            ]);
        }
        $form->setHydrator(new \DoctrineModule\Stdlib\Hydrator\DoctrineObject($this->getEm()));
        return $form;
    }

}
