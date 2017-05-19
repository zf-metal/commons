<?php

namespace ZfMetal\Commons\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class FormProcess extends AbstractPlugin {

    /**
     *
     * @var \ZfMetal\Commons\Service\FormProcess
     */
    protected $formProcess;

    function getFormProcess() {
        return $this->formProcess;
    }

    function setFormProcess(\ZfMetal\Commons\Service\FormProcess $formProcess) {
        $this->formProcess = $formProcess;
        return $this;
    }

    function __construct(\ZfMetal\Commons\Service\FormProcess $formProcess) {
        $this->formProcess = $formProcess;
    }

    public function __invoke(\Doctrine\ORM\EntityManager $em, \Zend\Form\Form $form, $flash = true, $msjOk = null, $msjFail = null) {
        if ($msjOk) {
            $this->formProcess->setMsjOk($msjOk);
        }
        if ($msjFail) {
            $this->formProcess->setMsjFail($msjFail);
        }
        return $this->formProcess($em, $form, $flash);
    }

}
