<?php

namespace Materialize\Widget;

/**
 * Class WarningModal
 * @package Materialize\Widget
 */
class WarningModal extends Modal
{
    /**
     * @return false|string
     */
    public function getHtml()
    {
        return $this->getBlock(__DIR__ . '/view/warningModal.phtml');
    }
}
