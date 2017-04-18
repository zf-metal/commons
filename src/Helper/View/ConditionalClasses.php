<?php

namespace ZfMetal\Commons\Helper\View;

use Zend\View\Helper\AbstractHelper;

class ConditionalClasses extends AbstractHelper {

    public function __invoke($classes = array()) {

        $html = '';

        foreach ($classes as $name => $bool) {
            if (is_int($name)) {
                $name = $bool;
                $bool = TRUE;
            }
            if ($bool) {
                $html .= $name . ' ';
            }
        }

        if (!empty($html)) {
            return ' class="' . trim($html) . '"';
        }
        return '';
    }

}
