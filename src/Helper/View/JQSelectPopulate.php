<?php

namespace ZfMetal\Commons\Helper\View;

use Zend\View\Helper\AbstractHelper;

class JQSelectPopulate extends AbstractHelper {

    public function __invoke($url, $origin, $destination) {

        $body = '$.getJSON( "' . $url . '", {id: $("#' . $origin . '").val()} ,function( data ) {
                    var options = $("#' . $destination . '");
                    $.each( data, function(key, val) {
                        options.append(new Option(key, val));
                    });
                });';
        
        return $body;
    }

}
