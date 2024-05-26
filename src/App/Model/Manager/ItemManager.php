<?php

namespace App\Model\Manager;

use App\Model\Entity\Item;
use SFram\Model\ManagerPDO;

/**
 * Class ItemManager
 * @package App\Model\Manager
 */
class ItemManager extends ManagerPDO
{
    /**
     * ItemManager constructor.
     * @param \PDO $dao
     * @param array $args
     * @throws \Exception
     */
    public function __construct(\PDO $dao, array $args = [])
    {
        parent::__construct($dao, $args);
        $this->setTableName('item');
        $this->entity = new Item();
    }

    /**
     * @param int $id
     * @return array
     * @throws \Exception
     */
    public function getListByCategoryId(int $id)
    {
        $sql = "SELECT * FROM $this->tableName WHERE categoryId=:id";

        $q = $this->prepare($sql);
        $q->bindValue(':id', $id);
        $q->execute();
        $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $this->getEntityName());
        $entity = $q->fetchAll();
        $q->closeCursor();

        return $entity;
    }

    /**
     * @param int $categoryId
     * @return int
     */
    public function deleteByCategoryId(int $categoryId)
    {
        return $this->dao->exec("DELETE FROM $this->tableName WHERE categoryId = " . $categoryId);

    }
}
