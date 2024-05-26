<?php

define("ROOT", __DIR__);
include_once ROOT . "/vendor/autoload.php";
$config = parse_ini_file(ROOT . "/config.ini", true);
$env = $config['env'];
if ($env === "DEV") {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

define("PUBLIC", ROOT . "/public");
define("SRC", ROOT . "/src");
define("APP", SRC . "/App");
define("LIB", SRC . "/lib");
define("CONTROLLER", APP . "/Controller");
define("MODEL", APP . "/Model");

$dbfile = $config[$env]['dbfilepath'];
$siteTitle = 'Listes';

define("BASE_URI", $config[$env]['baseUri']);