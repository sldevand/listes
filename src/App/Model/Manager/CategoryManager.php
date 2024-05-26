<?php

namespace App\Model\Manager;

use App\Model\Entity\Category;
use SFram\Model\ManagerPDO;

/**
 * Class CategoryManager
 * @package App\Model\Manager
 */
class CategoryManager extends ManagerPDO
{
    /**
     * @var ItemManager
     */
    protected $itemManager;

    /**
     * CategoryManager constructor.
     * @param \PDO $dao
     * @param ItemManager $itemManager
     * @param array $args
     * @throws \Exception
     */
    public function __construct(
        \PDO $dao,
        ItemManager $itemManager,
        array $args = []
    ) {
        parent::__construct($dao, $args);
        $this->setTableName('category');
        $this->entity = new Category();
        $this->itemManager = $itemManager;
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete($id)
    {
        $this->itemManager->deleteByCategoryId($id);

        return parent::delete($id);
    }
}
