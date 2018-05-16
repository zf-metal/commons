<?php

namespace ZfMetal\Commons\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class FormProcess extends AbstractPlugin {

    /**
     *
     * @var \ZfMetal\Commons\Service\FormProcess
     */
    protected $serviceFormProcess;

    function getServiceFormProcess() {
        return $this->serviceFormProcess;
    }

    
    function __construct(\ZfMetal\Commons\Service\FormProcess $serviceFormProcess) {
        $this->serviceFormProcess = $serviceFormProcess;
    }

    public function __invoke(\Doctrine\ORM\EntityManager $em, \Zend\Form\Form $form, $flash = true, $msjOk = null, $msjFail = null, $data = null) {
        if ($msjOk) {
            $this->getServiceFormProcess()->setMsjOk($msjOk);
        }
        if ($msjFail) {
            $this->getServiceFormProcess()->setMsjFail($msjFail);
        }
        $serviceFormProcess = $this->getServiceFormProcess();
        return $serviceFormProcess($em, $form, $flash, $data);
    }

}
