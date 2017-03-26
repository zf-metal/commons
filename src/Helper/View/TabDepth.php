<?php

namespace ZfMetal\Commons\Helper\View;

use Zend\View\Helper\AbstractHelper;

/**
 * TabDepth
 * Return string whith tab (\t) * depth
 */
class TabDepth extends AbstractHelper {


    public function __invoke($string = null, $depth = null) {
        return $this->depth($depth).$string;
    }
    
    protected function depth($depth){
        $r = "";
        for($i=0;$i<=$depth;$i++){
            $r .= chr(9);
        }
        return $r;
    }

  
}
