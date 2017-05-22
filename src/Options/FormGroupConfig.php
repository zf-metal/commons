<?php

namespace ZfMetal\Commons\Options;

use Zend\Stdlib\AbstractOptions;

class FormGroupConfig extends AbstractOptions {

    const TYPE_HORIZONTAL = "horizontal";
    const TYPE_VERTICAL = "vertical";
    const COLUMN_CLASS = [
        \ZfMetal\Commons\Consts::COLUMNS_ONE => 'col-lg-12 col-md-12 col-xs-12',
        \ZfMetal\Commons\Consts::COLUMNS_TWO => 'col-lg-6 col-md-6 col-xs-12',
        \ZfMetal\Commons\Consts::COLUMNS_THREE => 'col-lg-4 col-md-4 col-xs-12',
        \ZfMetal\Commons\Consts::COLUMNS_FOUR => 'col-lg-3 col-md-3 col-xs-12'
    ];

    /**
     *
     * @var string 
     */
    protected $id;

    /**
     *
     * @var string 
     */
    protected $type = self::TYPE_VERTICAL;

    /**
     *
     * @var string 
     */
    protected $columns = \ZfMetal\Commons\Consts::COLUMNS_ONE;

    /**
     *
     * @var string 
     */
    protected $title = null;

    /**
     *
     * @var string 
     */
    protected $style = \ZfMetal\Commons\Consts::STYLE_VERTICAL;

    /**
     *
     * @var array 
     */
    protected $fields = array();
    
    function getColumnClass() {
        return self::COLUMN_CLASS[$this->getColumns()];
    }

    protected function setColumns($columns) {
        if (!array_key_exists($columns, \ZfMetal\Commons\Consts::COLUMNS)) {
            throw new \Exception("columns " . $columns . " not exist.");
        }
        $this->columns = $columns;
    }

    function getColumns() {
        return $this->columns;
    }

    function getType() {
        return $this->type;
    }

    function getTitle() {
        return $this->title;
    }

    function getStyle() {
        return $this->style;
    }

    function getFields() {
        return $this->fields;
    }

    function setType($type) {
        $this->type = $type;
        return $this;
    }

    function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    function setStyle($style) {
        if (!array_key_exists($style, \ZfMetal\Commons\Consts::STYLE)) {
            throw new \Exception("style " . $style . " not exist.");
        }
        $this->style = $style;
        return $this;
    }

    function setFields($fields) {
        $this->fields = $fields;
        return $this;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = str_replace(" ", "", $id);
        return $this;
    }

}
