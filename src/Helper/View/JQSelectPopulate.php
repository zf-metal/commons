<?php

namespace ZfMetal\Commons\Helper\View;

use Zend\View\Helper\AbstractHelper;

class JQSelectPopulate extends AbstractHelper {

    public function __invoke($url, $origin, $destination) {

        $body = 'function populate_' . $destination . '(){' . PHP_EOL;

        $body .= '$.getJSON( "' . $url . '", {id: $("[name  =\'' . $origin . '\']").val()} ,function( data ) {
         var options = $("[name  =\'' . $destination . '\']");
         options.find(\'option\').remove().end()
         $.each( data, function(key,val) {
             options.append(new Option(val,key));
         });
     });' . PHP_EOL;

        $body .= '}' . PHP_EOL;

        $body .= '$("[name  =\'' . $origin . '\']").change(populate_' . $destination . ');';


        return $body;
    }

}
