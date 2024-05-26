<?php

namespace Materialize\Widget;

/**
 * Class Button
 * @package Materialize\Widget
 */
abstract class Button extends Widget
{
    /**
     * @var string
     */
    protected $_title = null;

    /**
     * @var string
     */
    protected $_icon = null;

    /**
     * @var string
     */
    protected $_align = 'left';

    /**
     * @var string
     */
    protected $_size = '';

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
    public function align()
    {
        return $this->_align;
    }

    /**
     * @return string
     */
    public function size()
    {
        return $this->_size;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * @param $icon
     */
    public function setIcon($icon)
    {
        $this->_icon = $icon;
    }

    /**
     * @param $align
     * @return Button
     */
    public function setAlign($align)
    {
        $this->_align = $align === 'right' ? $align : 'left';

        return $this;
    }


    /**
     * @param string $size
     * @return Button
     */
    public function setSize($size)
    {
        if ($size === 'large') {
            $this->_size = "-$size";
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getIconHtml()
    {
        $icon = '';
        if (!is_null($this->icon())) {
            $icon = '<i class="material-icons ' . $this->align() . '">' . $this->icon() . '</i>';
        }

        return $icon;
    }
}