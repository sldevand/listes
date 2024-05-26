<?php

namespace Materialize\Widget;

use App\Model\Entity\Item;

/**
 * Class ItemWidget
 * @package Materialize\Widget
 */
class ItemWidget extends Widget
{
    /**
     * @var Item $item
     */
    protected $item;

    /**
     * ItemWidget constructor.
     * @param Item $item
     * @param array $data
     */
    public function __construct(Item $item, $data = [])
    {
        parent::__construct($data);
        $this->item = $item;
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        $decoration = 'none';
        $color = 'black';

        if ($this->item->isChecked()) {
            $decoration = 'line-through';
            $color = 'lightgray';
        }

        return $this->getBlock(__DIR__. '/view/itemWidget.phtml', $decoration, $color);
    }
}

