<?php

namespace ZfMetal\Commons\Helper\View;

use Zend\View\Helper\AbstractHelper;

class SimplifyNumber extends AbstractHelper {

    public function __invoke($number = false) {
        
        if (!$number) {
            return false;
        }

        if (is_object($number) || is_array($number)) {
            throw new \Exception('Bag Data, the method waits a string or integer value.');
        }

        $value = (int) $number;

        if ($value >= 1000000) {
            $value = $value / 1000000;
            $value = round($value, 2);
            return $value . 'M';
        } else if ($value >= 1000) {
            $value = $value / 1000;
            $value = round($value, 1);
            return $value . 'k';
        }else{
            return $value;
        }
    }
}
