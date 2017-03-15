<?php

namespace ZfMetal\Commons\Form;

use Zend\Form\Form;

class Base extends \Zend\Form\Form {

    public function __construct() {
        parent::__construct('Base');

        $this->add([
            'name' => 'submitbtn',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => [
                'value' => "Submit",
                'class' => 'btn btn-primary',
            ]
        ]);
    }

}
