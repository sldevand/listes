<?php
include_once __DIR__ . '/../setup.php';

use App\Controller\Category\CategoryController;
use App\Controller\Item\ItemController;
use App\Model\Manager\CategoryManager;
use App\Model\Manager\ItemManager;
use Connector\PDO\PDOFactory;
use Materialize\Widget\LinkNavbar;
use Materialize\Widget\NavbarMaterialize;
use SFram\Http\HTTPRequest;

/** @var string $dbfile */
PDOFactory::setPdoAddress($dbfile);
$bdd = PDOFactory::getSqliteConnexion();

try {
    $request = new HTTPRequest();

    $itemManager = new ItemManager($bdd);
    $categoryManager = new CategoryManager($bdd, $itemManager);
    $itemController = new ItemController($request, $itemManager, $categoryManager);
    $categoryController = new CategoryController($request, $categoryManager);

    if (isset($_POST['addCategory'])) {
        $categoryController->create();
    } elseif (isset($_POST['updateCategory'])) {
        $categoryController->update();
    } elseif (isset($_POST['deleteCategory'])) {
        $categoryController->delete();
    } elseif (isset($_POST['addItem'])) {
        $itemController->create();
    } elseif (isset($_POST['updateItem'])) {
        $itemController->update();
    } elseif (isset($_POST['deleteItem'])) {
        $itemController->delete();
    } elseif (isset($_GET['listId'])) {
        $content = $itemController->index();
    } else {
        $content = $categoryController->index();
    }
} catch (Exception $e) {
    $content = "ERROR : " . $e->getMessage();
}

$navbar = new NavbarMaterialize(['title' => 'Listes', 'logo' => 'Listes']);
$navbar->addLink(new LinkNavbar('Accueil', 'index.php', 'home'));

require CONTROLLER . '/listes_layout.php';
