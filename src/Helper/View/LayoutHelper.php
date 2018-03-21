<?php

namespace ZfMetal\Commons\Helper\View;

use Zend\View\Helper\AbstractHelper;
use ZfMetal\Commons\Service\Layout;

class LayoutHelper extends AbstractHelper
{

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
