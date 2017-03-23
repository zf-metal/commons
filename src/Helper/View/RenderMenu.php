<?php

namespace ZfMetal\Commons\Helper\View;

use Zend\View\Helper\AbstractHelper;

class RenderMenu extends AbstractHelper {

    const partial_prefix = "zf-metal/commons/menu/";
    const STYLE_HORIZONTAL = "horizontal";
    const STYLE_VERTICAL = "vertical";
    const STYLES = [
        STYLE_HORIZONTAL => STYLE_HORIZONTAL,
        STYLE_VERTICAL => STYLE_VERTICAL
    ];

    protected $style;
    protected $menu = "default";
    protected $ulClass = "nav navbar-nav";

  

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
        if (!$this->style) {
            $this->style = $this->getModuleOptions()->getFormStyle();
        }
        return $this->style;
    }

    protected function setStyle($style) {
        if (!array_key_exists($style, SELF::STYLES)) {
            throw new Exception("style " . $style . " not exist.");
        }
        $this->style = $style;
    }


}
