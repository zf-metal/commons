<?php

namespace ZfMetal\Commons\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use ZfMetal\Commons\Service\Layout;


class LayoutHelper extends AbstractPlugin {

    /**
     * @var Layout
     */
    protected $layout = null;

    function __construct(Layout $layout)
    {
        $this->layout = $layout;
    }

    public function __invoke()
    {
        return $this->layout;
    }

}
