<?php

namespace ZfMetal\Commons\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class FormProcess extends AbstractPlugin {

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @var \Zend\Form\Form
     */
    protected $form;

    /**
     * @var \Zend\Http\Request
     */
    protected $request;

    /**
     * @var 
     */
    protected $object;

    function getEm() {
        return $this->em;
    }

    function setEm(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    function getForm() {
        return $this->form;
    }

    function setForm(\Zend\Form\Form $form) {
        $this->form = $form;
    }

  
    public function __invoke(\Doctrine\ORM\EntityManager $em, \Zend\Form\Form $form) {
        $this->em = $em;
        $this->form = $form;

        if ($this->getController()->getRequest()->isPost()) {
            $this->form->setData($this->getController()->getRequest()->getPost());

            if ($this->form->isValid()) {
                $this->getEm()->persist($this->form->getObject());
                $this->getEm()->flush();
                $this->getController()->flashMessenger()->addSuccessMessage('Form ok');
                return true;
            } else {
                $this->erroToFlash();
                return false;
            }
        }
    }

    protected function erroToFlash() {
        $this->getController()->flashMessenger()->addErrorMessage('Form Invalid');
        foreach ($this->form->getMessages() as $key => $messages) {
            foreach ($messages as $msj) {
                $this->getController()->flashMessenger()->addErrorMessage("Field: " . $key . " - Error: " . $msj);
            }
        }
    }

}
