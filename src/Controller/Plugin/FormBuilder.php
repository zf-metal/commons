<?php

namespace ZfMetal\Commons\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class FormBuilder extends AbstractPlugin {

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

    public function __invoke(\Doctrine\ORM\EntityManager $em, $entityName, $addSubmit = true) {
        $this->em = $em;
        $builder = new \DoctrineORMModule\Form\Annotation\AnnotationBuilder($this->getEm());
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
