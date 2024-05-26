<?php

namespace Materialize\Widget;

use App\Model\Entity\Category;

/**
 * Class CategoryWidget
 * @package Materialize\Widget
 */
class CategoryWidget extends Widget
{
    /**
     * @var Category $category
     */
    protected $category;

    /**
     * CategoryWidget constructor.
     * @param Category $category
     * @param array $data
     */
    public function __construct(
        Category $category,
        array $data = []
    ) {
        parent::__construct($data);
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        return $this->getBlock(__DIR__ . '/view/categoryWidget.phtml');
    }
}
