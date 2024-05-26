<?php

namespace Materialize\Widget;

/**
 * Class FloatingActionButton
 * @package Materialize\Widget
 */
class FloatingActionButton extends Button
{
    /**
     * @var bool
     */
    protected $_fixed = false;

    /**
     * @return bool
     */
    public function fixed()
    {
        return $this->_fixed;
    }

    /**
     * @param bool $fixed
     * @return FloatingActionButton
     */
    public function setFixed(bool $fixed)
    {
        $this->_fixed = $fixed;

        return $this;
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        return $this->getBlock(__DIR__ . '/view/floatingActionButton.phtml');
    }
}