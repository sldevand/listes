<?php

namespace SFram\Model\Manager\ModuleVersion;

use SFram\Model\Entity\ModuleVersion;
use SFram\Model\ManagerPDO;


/**
 * Class ModuleVersionManagerPDO
 * @package SFram\Model\Manager\ModuleVersion
 */
class ModuleVersionManagerPDO extends ManagerPDO
{
    /**
     * ModuleVersionManagerPDO constructor.
     * @param \PDO $dao
     */
    public function __construct(\PDO $dao)
    {
        parent::__construct($dao);
        $this->tableName = 'module_version';
        $this->entity = new ModuleVersion();
    }
}
