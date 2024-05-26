<?php

namespace Materialize\Widget;

/**
 * Class RaisedButton
 * @package Materialize\Widget
 */
class RaisedButton extends Button
{
    /**
     * @return string
     */
    public function getHtml()
    {
        return $this->getBlock(__DIR__.'/view/raisedButton.phtml');
    }
}
