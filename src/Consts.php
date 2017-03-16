<?php

namespace ZfMetal\Commons;

/**
 * Description of Form
 *
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
class Consts {

    const COLUMNS_ONE = "one";
    const COLUMNS_TWO = "two";
    const COLUMNS_THREE = "three";
    const COLUMNS_FOUR = "four";
    
    const STYLE_VERTICAL = "vertical";
    const STYLE_HORIZONTAL = "horizontal";
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
    
}
