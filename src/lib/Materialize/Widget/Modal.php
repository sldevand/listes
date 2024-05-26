<?php

namespace Materialize\Widget;

/**
 * Class Modal
 * @package Materialize\Widget
 */
abstract class Modal extends Widget
{
    /**
     * @var string
     */
    protected $_title;

    /**
     * @return string
     */
    public function title()
    {
        return $this->_title;
    }

    /**
     * @param string $title
     * @return Modal
     */
    public function setTitle(string $title)
    {
        $this->_title = $title;

        return $this;
    }
}
