<?php

namespace ZfMetal\Commons\Service;

class FormBuilder {

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
        if(!$this->em){
            throw new \Exception("EntityManager not set.");
        }
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
    
    function __construct(\DoctrineORMModule\Form\Annotation\AnnotationBuilder $doctrineAnnotationBuilder = null, \Zend\Form\Factory $zendFormFactory = null, \Doctrine\ORM\EntityManager $em = null) {
        $this->doctrineAnnotationBuilder = $doctrineAnnotationBuilder;
        $this->zendFormFactory = $zendFormFactory;
        $this->em = $em;
    }
    
    function __invoke(\Doctrine\ORM\EntityManager $em, $entityName, $addSubmit = true, $addId = false) {
        return $this->generate($em, $entityName,$addSubmit,$addId);
    }

        /**
     * Generate a Form from Entity
     * 
     * @param \Doctrine\ORM\EntityManager $em
     * @param string $entityName
     * @param boolean $addSubmit
     * @return \Zend\Form\Form
     */
    public function generate(\Doctrine\ORM\EntityManager $em, $entityName, $addSubmit = true, $addId = false) {
        $this->setEm($em);
        $builder = $this->getDoctrineAnnotationBuilder();
        $form = $builder->createForm($entityName);

        if ($addSubmit) {
            $form->add([
                'name' => 'submit',
                'type' => 'Zend\Form\Element\Submit',
                'attributes' => [
                    'value' => "Submit",
                    'class' => 'btn btn-primary',
                ]
            ]);
        }

        if ($addId and !$form->has('id')) {

            $form->add([
                'name' => 'id',
                'type' => 'Zend\Form\Element\Hidden'
            ]);
        }

        $form->setHydrator(new \DoctrineModule\Stdlib\Hydrator\DoctrineObject($this->getEm()));
        return $form;
    }

}
