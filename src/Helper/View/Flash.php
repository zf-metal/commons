<?php

namespace ZfMetal\Commons\Helper\View;

use Zend\View\Helper\AbstractHelper;

class Flash extends AbstractHelper {

    public function __invoke() {
            echo $this->view->flashMessenger()->render('success', array('alert', 'alert-success'));
            echo $this->view->flashMessenger()->render('warning', array('alert', 'alert-warning'));
            echo $this->view->flashMessenger()->render('default', array('alert', 'alert-info'));
            echo $this->view->flashMessenger()->render('error', array('alert', 'alert-danger'));
        
    }

}
