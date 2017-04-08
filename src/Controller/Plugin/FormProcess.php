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

    /**
     * Define if push msj in flashmessenger
     */
    protected $flash = true;

    /**
     * Status form validation
     * 
     * @var boolean
     */
    protected $status = null;

    /**
     * Errors in form validation
     * 
     * @var array
     */
    protected $errors;

    function getEm() {
        return $this->em;
    }

    function getForm() {
        return $this->form;
    }

    function getRequest() {
        return $this->request;
    }

    function getObject() {
        return $this->object;
    }

    function getFlash() {
        return $this->flash;
    }

    function getErrors() {
        return $this->errors;
    }

    function setObject($object) {
        $this->object = $object;
    }

    function getStatus() {
        return $this->status;
    }

    public function __invoke(\Doctrine\ORM\EntityManager $em, \Zend\Form\Form $form, $flash = true) {
        $this->em = $em;
        $this->form = $form;
        $this->flash = $flash;

        if ($this->getController()->getRequest()->isPost()) {
            $this->form->setData($this->getController()->getRequest()->getPost());

            if ($this->form->isValid()) {
                $this->getEm()->persist($this->form->getObject());
                $this->getEm()->flush();
                $this->status = true;
                if ($this->flash) {
                    $this->getController()->flashMessenger()->addSuccessMessage('Form ok');
                }
                
            } else {
                $this->status = false;
                $this->erroToFlash();
            }

        }
        return $this;
    }

    public function getResult() {
        $json["status"] = $this->status;
        $json["errors"] = $this->errors;
        return $json;
    }

    protected function erroToFlash() {
        if ($this->flash) {
            $this->getController()->flashMessenger()->addErrorMessage('Form Invalid');
        }
        foreach ($this->form->getMessages() as $key => $messages) {
            foreach ($messages as $msj) {
                $s = "<strong>Field: </strong>" . $key . " <strong>Error:</strong> " . $msj;
                $this->errors[] = $s;
                if ($this->flash) {
                    $this->getController()->flashMessenger()->addErrorMessage($s);
                }
            }
        }
    }

}
