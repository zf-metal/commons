<?php

namespace ZfMetal\Commons\Service;

class FormProcess {

    /**
     * @var string
     */
    protected $msjOk;

    /**
     * @var string
     */
    protected $msjFail;

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
     * @var \Zend\Mvc\Plugin\FlashMessenger
     */
    protected $flashMessenger;

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

    function __construct(\Zend\Http\Request $request, \Zend\Mvc\Plugin\FlashMessenger\FlashMessenger $flashMessenger, \ZfMetal\Commons\Options\ModuleOptions $moduleOptions) {
        $this->request = $request;
        $this->flashMessenger = $flashMessenger;
        $this->setMsjOk($moduleOptions->getFormProcessMsjOk());
        $this->setMsjFail($moduleOptions->getFormProcessMsjFail());
    }

    function __invoke(\Doctrine\ORM\EntityManager $em, \Zend\Form\Form $form, $flash = true) {
        return $this->process($em, $form, $flash);
    }

    public function process(\Doctrine\ORM\EntityManager $em, \Zend\Form\Form $form, $flash = true, $data = null) {
        $this->em = $em;
        $this->form = $form;
        $this->flash = $flash;

        if ($this->getRequest()->isPost() || $data) {

            if(!$data){
                $data = $this->getRequest()->getPost();
            }

            $this->form->setData($data);

            if ($this->form->isValid()) {
                $this->getEm()->persist($this->form->getObject());
                $this->getEm()->flush();
                $this->status = true;
                if ($this->flash) {
                    $this->getFlashMessenger()->addSuccessMessage($this->getMsjOk());
                }
            } else {
                $this->status = false;
                $this->erroToFlash();
            }
        }
        return $this;
    }

    /**
     * Keep compatible
     * 
     * @return array
     */
    public function getResult() {
        return $this->getArrayResult();
    }

    public function getArrayResult() {
        $a["status"] = $this->status;
        $a["errors"] = $this->errors;
        if (method_exists($this->form->getObject(), 'getId')) {
            $a["id"] = $this->form->getObject()->getId();
        }
        return $a;
    }

    public function getJsonResult() {
        return json_encode($this->getArrayResult());
    }

    protected function erroToFlash() {
        if ($this->flash) {
            $this->getFlashMessenger()->addErrorMessage($this->getMsjFail());
        }
        foreach ($this->form->getMessages() as $key => $messages) {
            foreach ($messages as $msj) {
                $msj = "" . $key . ": " . $msj;
                $this->errors[] = $msj;
                if ($this->flash) {
                    $this->getFlashMessenger()->addErrorMessage($msj);
                }
            }
        }
    }

    function getMsjOk() {
        return $this->msjOk;
    }

    function getMsjFail() {
        return $this->msjFail;
    }

    function setMsjOk($msjOk) {
        $this->msjOk = $msjOk;
        return $this;
    }

    function setMsjFail($msjFail) {
        $this->msjFail = $msjFail;
        return $this;
    }
    function getFlashMessenger() {
        return $this->flashMessenger;
    }



}
