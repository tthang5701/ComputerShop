<?php

class CategoryController extends BaseController
{
    private $tableNews = null;
    private $tableCategories = null;
    public function __construct()
    {
        parent::__construct();
        $this->tableCategories = 'categories';
        $this->tableNews = 'news';
    }
    //admin funciton 
    public function create()
    {
        session::checkLoginSession();
        $this->loadViewAdmin('header');
        $this->loadViewAdmin('dashboardView');
        $this->loadViewAdmin('caretoryProduct/add_CaretoryProduct');
        $this->loadViewAdmin('footer');
    }
    public function list($pagination)
    {
        session::checkLoginSession();
        //model process
        $categoriesModel = $this->loadModel('category');
        $data = $this->processPaginationProduct($categoriesModel, $this->tableCategories, $pagination, 'lis_caretoryProduct', 'id');
        //view process
        $this->loadViewAdmin('header');
        $this->loadViewAdmin('dashboardView');
        $this->loadViewAdmin('caretoryProduct/list_CaretoryProductView', $data);
        $this->loadViewAdmin('footer');
    }
    public function insert()
    {
        session::checkLoginSession();
        $caretoryProductName = $_POST['tenloaisp'];
        $caretoryProductStatus = $_POST['tinhtrang'];
        $data  = [
            'name' => $caretoryProductName,
            'status' => $caretoryProductStatus
        ];
        $categoriesModel = $this->loadModel('category');
        $isStored = $categoriesModel->insertcaretoryProducts($this->tableCategories, $data);
        if ($isStored == true) {
            session::set('message_success', 'Lưu loại sản phẩm thành công!');
            header("Location:" . BASE_URL . "Category/list");
        } else {
            session::set('message_fail', 'Lưu loại sản phẩm thất bại!');
            header("Location:" . BASE_URL . "Category/list");
        }
    }
    public function delete($id)
    {
        session::checkLoginSession();
        $conditon = "id='$id[0]'";
        $categoriesModel = $this->loadModel('category');
        $isDeleted = $categoriesModel->deletecaretoryProduct($this->tableCategories, $conditon);
        if ($isDeleted == true) {
            session::set('message_success', 'Xóa loại sản phẩm thành công!');
            header("Location:" . BASE_URL . "Category/list");
        } else {
            session::set('message_fail', 'Xóa loại sản phẩm thất bại!');
            header("Location:" . BASE_URL . "Category/list");
        }
    }
    public function edit($id)
    {
        //model process
        session::checkLoginSession();
        $conditon = "id='$id[0]'";
        $categoriesModel = $this->loadModel('category');
        $data['lis_caretoryProduct'] = $categoriesModel->selectcaretoryProductById($this->tableCategories, $conditon);
        $this->loadViewAdmin('header');
        $this->loadViewAdmin('dashboardView');
        $this->loadViewAdmin('caretoryProduct/edit_CaretoryProductView', $data);
        $this->loadViewAdmin('footer');
    }
    public function update($id)
    {
        session::checkLoginSession();
        $conditon = "id='$id[0]'";
        $updatecaretoryProduct  = $this->loadModel('category');
        $caretoryProductName = $_POST['tenloaisp'];
        $caretoryProductStatus = $_POST['tinhtrang'];
        $data  = [
            'name' => $caretoryProductName,
            'status' => $caretoryProductStatus
        ];
        $isUpdated = $updatecaretoryProduct->updatecaretoryProducts($this->tableCategories, $data, $conditon);
        if ($isUpdated == true) {
            session::set('message_success', 'Cập nhật loại sản phẩm thành công!');
            header("Location:" . BASE_URL . "Category/list");
        } else {
            session::set('message_fail', 'Cập nhật loại sản phẩm thất bại!');
            header("Location:" . BASE_URL . "Category/list");
        }
    }
}
