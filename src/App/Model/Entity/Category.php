<?php

namespace App\Model\Entity;

use SFram\Model\Entity;

/**
 * Class Category
 * @package App\Model\Entity
 */
class Category extends Entity
{
    /**
     * @var string $name
     */
    protected $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id(),
            'name' => $this->getName()
        ];
    }
}
