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
    protected $pageTitle;

    /**
     *
     * @var string
     */
    protected $domain;


    /**
     *
     * @var string
     */
    protected $copyright;

    /**
     *
     * @var string
     */
    protected $author;

    /**
     * Layout constructor.
     * @param string $title
     * @param string $tabTitle
     * @param string $domain
     * @param string $copyright
     * @param string $author
     */
    public function __construct($title, $tabTitle,$pageTitle, $domain, $copyright, $author)
    {
        $this->title = $title;
        $this->tabTitle = $tabTitle;
        $this->pageTitle = $pageTitle;
        $this->domain = $domain;
        $this->copyright = $copyright;
        $this->author = $author;
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
    public function getPageTitle()
    {
        return $this->pageTitle;
    }

    /**
     * @param string $pageTitle
     */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
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

    /**
     * @return string
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * @param string $copyright
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }





}