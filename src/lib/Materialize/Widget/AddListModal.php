<?php

namespace Materialize\Widget;

/**
 * Class AddListModal
 * @package Materialize\Widget
 */
class AddListModal extends Modal
{
    /**
     * @return false|string
     */
    public function getHtml()
    {
        return $this->getBlock(__DIR__ . '/view/addListModal.phtml');
    }
}
