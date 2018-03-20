<?php

namespace ZfMetal\Commons\Service;


class Layout
{

    /**
     *
     * @var string
     */
    protected $title;


    /**
     *
     * @var string
     */
    protected $tabTitle;

    /**
     *
     * @var string
     */
    protected $domain;

    /**
     * Layout constructor.
     * @param string $title
     * @param string $tabTitle
     * @param string $domain
     */
    public function __construct($title, $tabTitle, $domain)
    {
        $this->title = $title;
        $this->tabTitle = $tabTitle;
        $this->domain = $domain;
    }


    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTabTitle()
    {
        return $this->tabTitle;
    }

    /**
     * @param string $tabTitle
     */
    public function setTabTitle($tabTitle)
    {
        $this->tabTitle = $tabTitle;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }



}