<?php

namespace App\Controller\Category;

use App\Model\Entity\Category;
use App\Model\Manager\CategoryManager;
use Materialize\Widget\AddListModal;
use Materialize\Widget\CategoryWidget;
use Materialize\Widget\FloatingActionButton;
use SFram\Controller\AbstractController;
use SFram\Http\HTTPRequest;

class CategoryController extends AbstractController
{
    /**
     * @var CategoryManager
     */
    protected $categoryManager;

    /**
     * CategoryController constructor.
     * @param HTTPRequest $request
     * @param CategoryManager $categoryManager
     */
    public function __construct(
        HTTPRequest $request,
        CategoryManager $categoryManager
    ) {
        parent::__construct($request);
        $this->categoryManager = $categoryManager;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function index()
    {
        $fabAddList = new FloatingActionButton(['id' => 'addList', 'icon' => 'add', 'fixed' => true]);
        $addListmodal = new AddListModal(['id' => 'addListModal',
            'title' => 'Entrez le titre de la liste :',
            'content' => 'Blablbla']);

        $categories = $this->categoryManager->getList();
        $categoriesWidgets = [];
        foreach ($categories as $category) {
            $categoriesWidgets[] = new CategoryWidget($category);
        }

        return $this->getBlock(__DIR__ . '/view/all.phtml', $fabAddList, $addListmodal, $categoriesWidgets);
    }

    /**
     * @throws \Exception
     */
    public function create()
    {
        $data = $this->request->postData('addCategory');
        $category = new Category($data);

        return $this->categoryManager->save($category);
    }

    /**
     * @throws \Exception
     */
    public function update()
    {
        $data = $this->request->postData('updateCategory');
        $category = new Category($data);

        return $this->categoryManager->save($category);
    }

    /**
     * @return int
     */
    public function delete()
    {
        $data = $this->request->postData('deleteCategory');

        return $this->categoryManager->delete($data['id']);
    }
}
