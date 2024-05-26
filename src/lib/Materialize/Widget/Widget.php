<?php

namespace Materialize\Widget;

use Sfram\Model\Hydrator;
use SFram\Traits\Block;

/**
 * Class Widget
 * @package Materialize\Widget
 */
abstract class Widget
{
    use Hydrator;
    use Block;

    /**
     * @var string
     */
    protected $_id;

    /**
     * Widget constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    /**
     * @return string
     */
    public function id()
    {
        return $this->_id;
    }

    /**
     * @param string $id
     * @return Widget
     */
    public function setId(string $id)
    {
        $this->_id = $id;

        return $this;
    }

    /**
     * @return string
     */
    abstract public function getHtml();
}
