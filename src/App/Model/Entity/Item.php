<?php

namespace App\Model\Entity;

use SFram\Model\Entity;

/**
 * Class Item
 * @package App\Model
 */
class Item extends Entity
{
    /**
     * @var int $categoryId
     */
    protected $categoryId;

    /**
     * @var string $content
     */
    protected $content;

    /**
     * @var string $createdAt
     */
    protected $createdAt;

    /**
     * @var bool $checked
     */
    protected $checked;

    /**
     * @return bool
     */
    public function isChecked()
    {
        return $this->checked;
    }

    /**
     * @param bool $checked
     * @return Item
     */
    public function setChecked($checked)
    {
        $this->checked = $checked;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     * @return Item
     */
    public function setCreatedAt(string $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     * @return Item
     */
    public function setCategoryId(int $categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }


    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Item
     */
    public function setContent(string $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id(),
            'content' => $this->getContent(),
            'checked' => $this->isChecked(),
            'titleId' => $this->getCategoryId(),
            'createdAt' => $this->getCreatedAt()
        ];
    }
}
