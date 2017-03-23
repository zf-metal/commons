<?php

namespace ZfMetal\Commons\Helper\View;

use Zend\View\Helper\AbstractHelper;

class RenderMenu extends AbstractHelper {

    const partial_prefix = "zf-metal/commons/menu/";

    protected $style = \ZfMetal\Commons\Consts::STYLE_MENU_HORIZONTAL;
    protected $menu = "default";
    protected $ulClass = "nav navbar-nav";
    protected $partial = null;
  

    public function __invoke($style = null, $menu = null, $ulClass = null) {

        if ($style) {
            $this->setStyle($style);
        }

        if ($menu) {
            $this->setMenu($menu);
        }

        if ($ulClass) {
            $this->setUlClass($ulClass);
        }

        return $this->view->partial($this->getPartial(), [
                    "menu" => $this->getMenu(),
                    "style" => $this->getStyle(),
                    "ulClass" => $this->getUlClass()
        ]);
    }

    protected function getPartial() {
        if (!$this->partial) {
            $this->partial = self::partial_prefix . $this->getStyle();
        }

        return $this->partial;
    }

    function getMenu() {
        return $this->menu;
    }

    function setMenu($menu) {
        $this->menu = $menu;
    }

    function getUlClass() {
        return $this->ulClass;
    }

    function setUlClass($ulClass) {
        $this->ulClass = $ulClass;
    }

    protected function getStyle() {
        return $this->style;
    }

    protected function setStyle($style) {
        if (!array_key_exists($style, \ZfMetal\Commons\Consts::STYLES_MENU)) {
            throw new Exception("style " . $style . " not exist.");
        }
        $this->style = $style;
    }


}
