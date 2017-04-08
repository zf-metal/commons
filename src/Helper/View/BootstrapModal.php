<?php

namespace ZfMetal\Commons\Helper\View;

use Zend\View\Helper\AbstractHelper;

class BootstrapModal extends AbstractHelper {

    protected $modalId = "metalModal";
    protected $modalClass = null;
    protected $modalJs = false;

    public function __invoke($modalId = "metalModal", $modalJs = true, $modalClass = null) {
        $this->modalId = $modalId;
        $this->modalClass = $modalClass;
        $this->modalJs = $modalJs;
        if ($this->modalJs) {
            $this->view->headScript()->appendScript($this->view->partial('zf-metal/commons/modal/js/modal.js'), 'text/javascript');
        }
        $this->view->HeadStyle()->appendStyle($this->view->partial('zf-metal/commons/modal/css/modal.css'));
        echo $this->view->partial('zf-metal/commons/modal/modal', ['modalId' => $this->modalId, 'modalClass' => $this->modalClass, 'modalJs' => $this->modalJs]);
    }

}
