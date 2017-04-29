<?php

namespace ZfMetal\Commons\Helper\View;

use Zend\View\Helper\AbstractHelper;

class StatusAvgClass extends AbstractHelper {

    public function __invoke($value, $avg, $conditional = \ZfMetal\Commons\Consts::CONDITIONAL_ASC) {

        $min = $avg * .85;
        $max = $avg * 1.15;

        if (!$value){
            return 'info';
        }
        
        $result = 0;
        switch (true) {
            case ($value < $min):
                $result = -1;
                break;
            case ($value > $max):
                $result = 1;
                break;
        }

        switch ($result) {
            case 0:
                return 'warning';
                break;
            case -1:
                return $conditional=='desc'?'success':'danger';
                break;
            case 1:
                return $conditional=='asc'?'success':'danger';
                break;
        }
    }

}
