<?php

namespace Materialize\Widget;

/**
 * Class NavbarMaterialize
 * @package Materialize\Widget
 */
class NavbarMaterialize extends Navbar
{
    /**
     * @return string
     */
    public function getHTML()
    {
        return $this->getBlock(__DIR__ . '/view/navbarMaterialize.phtml');
    }

    /**
     * @param LinkNavbar $link
     * @return NavbarMaterialize
     */
    public function addLink(LinkNavbar $link)
    {
        $this->_links[] = $link;

        return $this;
    }
}