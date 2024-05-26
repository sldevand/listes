<?php

namespace Connector\PDO;

use PDO;
use PDOException;

/**
 * Class PDOFactory
 */
class PDOFactory
{
    /**
     * @var string
     */
    public static $lastUsedConnexion = '';

    /**
     * @var string $pdoAdress
     */
    public static $pdoAdress = '';

    /**
     * @return PDO
     */
    public static function getSqliteConnexion()
    {
        try {
            $db = new PDO("sqlite:" . self::$pdoAdress);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PdoException $e) {
            die($e->getMessage());
        }

        self::$lastUsedConnexion = 'sqlite';

        return $db;
    }


    /**
     * @param string $address
     */
    public static function setPdoAddress($address)
    {
        self::$pdoAdress = $address;
    }
}
