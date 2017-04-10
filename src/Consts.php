<?php

namespace ZfMetal\Commons;

/**
 * Description of Form
 *
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
class Consts {

    //FORMS
    const COLUMNS_ONE = "one";
    const COLUMNS_TWO = "two";
    const COLUMNS_THREE = "three";
    const COLUMNS_FOUR = "four";
    const STYLE_VERTICAL = "vertical";
    const STYLE_VERTICAL_LG = "vertical-lg";
    const STYLE_HORIZONTAL = "horizontal";
    const STYLE_HORIZONTAL_LG = "horizontal-lg";
    const STYLE_INLINE = "inline";
    const STYLE_PLACEHOLDER = "placeholder";
    const COLUMNS = [
        self::COLUMNS_ONE => self::COLUMNS_ONE,
        self::COLUMNS_TWO => self::COLUMNS_TWO,
        self::COLUMNS_THREE => self::COLUMNS_THREE,
        self::COLUMNS_FOUR => self::COLUMNS_FOUR,
    ];
    const STYLE = [
        self::STYLE_VERTICAL => self::STYLE_VERTICAL,
        self::STYLE_HORIZONTAL => self::STYLE_HORIZONTAL,
        self::STYLE_INLINE => self::STYLE_INLINE,
        self::STYLE_PLACEHOLDER => self::STYLE_PLACEHOLDER,
    ];
    //MENU
    const STYLE_MENU_VERTICAL = "vertical";
    const STYLE_MENU_HORIZONTAL = "horizontal";
    const STYLES_MENU = [
        self::STYLE_MENU_HORIZONTAL => self::STYLE_MENU_HORIZONTAL,
        self::STYLE_MENU_VERTICAL => self::STYLE_MENU_VERTICAL
    ];

}
