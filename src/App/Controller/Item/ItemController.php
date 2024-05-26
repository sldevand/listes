<?php

namespace App\Controller\Item;

use App\Model\Entity\Item;
use App\Model\Manager\CategoryManager;
use App\Model\Manager\ItemManager;
use Materialize\Widget\AddListModal;
use Materialize\Widget\CategoryWidget;
use Materialize\Widget\FloatingActionButton;
use Materialize\Widget\ItemWidget;
use Materialize\Widget\RaisedButton;
use Materialize\Widget\WarningModal;
use SFram\Controller\AbstractController;
use SFram\Http\HTTPRequest;

class ItemController extends AbstractController
{
    /**
     * @var ItemManager
     */
    protected $itemManager;

    /**
     * @var CategoryManager
     */
    protected $categoryManager;

    /**
     * ItemController constructor.
     * @param HTTPRequest $request
     * @param ItemManager $itemManager
     * @param CategoryManager $categoryManager
     */
    public function __construct(
        HTTPRequest $request,
        ItemManager $itemManager,
        CategoryManager $categoryManager
    ) {
        parent::__construct($request);
        $this->itemManager = $itemManager;
        $this->categoryManager = $categoryManager;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function index()
    {
        $fabAddItem = new FloatingActionButton(['id' => 'addItem', 'icon' => 'add', 'fixed' => true]);
        $backButton = new RaisedButton(['id' => 'back', 'title' => 'Retour', 'icon' => 'arrow_back']);
        $removeButton = new RaisedButton(['id' => 'deleteList', 'title' => 'Suppr', 'icon' => 'delete']);
        $addItemModal = new AddListModal(['id' => 'addItemModal',
            'title' => 'Entrez le nom de l\'élément :',
            'content' => '']);
        $removeItemModal = new WarningModal(['id' => 'removeItemModal',
            'title' => 'Voulez-vous vraiment supprimer cet élément?',
            'content' => '']);
        $deleteListModal = new WarningModal(['id' => 'deleteListModal',
            'title' => 'Voulez-vous vraiment supprimer la liste?']);

        $category = $this->categoryManager->getUnique($_GET['listId']);
        $items = $this->itemManager->getListByCategoryId($_GET['listId']);

        if (empty($category)) {
            return header('Location: ' . BASE_URI);
        }

        $listWidget = new CategoryWidget($category);
        $itemWidgets = [];
        foreach ($items as $item) {
            $itemWidgets[] = new ItemWidget($item);
        }

        return $this->getBlock(
            __DIR__ . '/view/items.phtml',
            $fabAddItem,
            $backButton,
            $removeButton,
            $addItemModal,
            $removeItemModal,
            $deleteListModal,
            $listWidget,
            $itemWidgets
        );
    }

    /**
     * @throws \Exception
     */
    public function create()
    {
        $data = $this->request->postData('addItem');

        $data = array_merge($data, [
            'createdAt' => date("Y-m-d H:i:s"),
            'checked' => false
        ]);

        $item = new Item($data);

        return $this->itemManager->save($item);
    }

    /**
     * @throws \Exception
     */
    public function update()
    {
        $data = $this->request->postData('updateItem');
        $item = new Item($data);

        return $this->itemManager->save($item);
    }

    /**
     * @return int
     */
    public function delete()
    {
        $data = $this->request->postData('deleteItem');

        return $this->itemManager->delete($data['id']);
    }
}
