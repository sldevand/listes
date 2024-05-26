<?php

namespace Materialize\Widget;

/**
 * Class LinkNavbar
 * @package Materialize\Widget
 */
class LinkNavbar extends Widget
{
    /**
     * @var string $_title
     */
    protected $_title;

    /**
     * @var string $_link
     */
    protected $_link;

    /**
     * @var string $_icon
     */
    protected $_icon;

    /**
     * @var string $_align
     */
    protected $_align;


    /**
     * LinkNavbar constructor.
     * @param string $title
     * @param $link
     * @param array $data
     * @param string $icon
     */
    public function __construct($title, $link, $icon = '', $data = [])
    {
        parent::__construct($data);
        $this->setTitle($title);
        $this->setLink($link);
        $this->setIcon($icon);
    }

    /**
     * @return string
     */
    public function getHtml()
    {
       return $this->getBlock(__DIR__ . '/view/linkNavbar.phtml');
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->_title;
    }

    /**
     * @return string
     */
    public function icon()
    {
        return $this->_icon;
    }

    /**
     * @return string
     */
    public function link()
    {
        return $this->_link;
    }

    /**
     * @param $title
     * @return LinkNavbar
     */
    public function setTitle($title)
    {
        $this->_title = $title;

        return $this;
    }

    /**
     * @param $icon
     * @return LinkNavbar
     */
    public function setIcon($icon)
    {
        $this->_icon = $icon;

        return $this;
    }

    /**
     * @param $link
     * @return LinkNavbar
     */
    public function setLink($link)
    {
        $this->_link = $link;

        return $this;
    }
}