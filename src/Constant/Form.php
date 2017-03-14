<?php

namespace ZfMetal\Commons\Constant;

/**
 * Description of Form
 *
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
class Form {

    const ONE_COLUMNS = "one";
    const TWO_COLUMNS = "two";
    const THREE_COLUMNS = "three";
    const FOUR_COLUMNS = "four";
    
    const VERTICAL = "vertical";
    const HORIZONTAL = "horizontal";
    const INLINE = "inline";
    const PLACEHOLDER = "placeholder";
    
    const COLUMNS = [
        self::ONE_COLUMNS => self::ONE_COLUMNS,
        self::TWO_COLUMNS => self::TWO_COLUMNS,
        self::THREE_COLUMNS => self::THREE_COLUMNS,
        self::FOUR_COLUMNS => self::FOUR_COLUMNS,
        ];
    
    const TYPE = [
        self::VERTICAL => self::VERTICAL,
        self::HORIZONTAL => self::HORIZONTAL,
        self::INLINE => self::INLINE,
        self::PLACEHOLDER => self::PLACEHOLDER,
        ];
    
}
