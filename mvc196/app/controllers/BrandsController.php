<?php

class BrandsController extends BaseController
{
    private $tableBrand = 'brands';
    private $tableProduct = 'products';
    public function __construct()
    {
        parent::__construct();
    }
    public function index($id)
    {
        //show product type 
        $data = $this->headerData;
        $this->loadView('header', $data);
        $idBrand   = $id[0];
        $getBrandModel = $this->loadModel('brandModel');
        $i = $getBrandModel->countRecord($this->tableBrand, $this->tableProduct, $idBrand);
        $number_row = $i;
        if (isset($id[1]) && isset($id[2])) {
            $numberProductOnPage = $id[1];
            $currentPage  = $id[2];
        }
        if (!isset($id[2]) && !isset($id[1]) || isset($id[2]) && !isset($id[1]) || !isset($id[2]) && isset($id[1])) {
            $currentPage = 1;
            $numberProductOnPage = 8;
        }
        $number_page = ceil($number_row / $numberProductOnPage);
        $data['number_page']  = [];
        array_push($data['number_page'], $number_page, $numberProductOnPage, $currentPage);
        $offset = ($currentPage - 1) * $numberProductOnPage;
        $data['getData_byProduct_type'] = $getBrandModel->GetProductByIdPagination($this->tableBrand, $this->tableProduct, $idBrand, $numberProductOnPage, $offset);
        $this->loadView('productViewbyBrand', $data);
        $this->loadView('footer', $data);
    }

    //admin function 
    public function create()
    {
        session::checkLoginSession();
        $this->loadViewAdmin('header');
        $this->loadViewAdmin('dashboardView');
        $this->loadViewAdmin('brand/add_Brands');
        $this->loadViewAdmin('footer');
    }
    public function insert()
    {
        session::checkLoginSession();
        $brandName = $_POST['tenhieusp'];
        $brandStatus = $_POST['tinhtrang'];
        $data  = [
            'name' => $brandName,
            'status' => $brandStatus
        ];
        $getBrandModel = $this->loadModel('brandModel');
        $isStored =  $getBrandModel->insertBrand($this->tableBrand, $data);
        if ($isStored == true) {
            session::set('message_success', 'Lưu hiệu sản phẩm thành công!');
            header("Location:" . BASE_URL . "brands/list");
        } else {
            session::set('message_fail', 'Lưu hiệu sản phẩm không thành công!');
            header("Location:" . BASE_URL . "brands/list");
        }
    }
    public function list($pagination)
    {
        //model process
        session::checkLoginSession();
        $getBrandModel = $this->loadModel('brandModel');
        $data = $this->processPaginationProduct($getBrandModel, $this->tableBrand, $pagination, 'list_Brands', 'id');
        //view process
        $this->loadViewAdmin('header');
        $this->loadViewAdmin('dashboardView');
        $this->loadViewAdmin('brand/list_BrandsView', $data);
        $this->loadViewAdmin('footer');
    }
    public function delete($id)
    {
        session::checkLoginSession();
        //model process
        $conditon = "id='$id[0]'";
        $getBrandModel = $this->loadModel('brandModel');
        $isDeleted = $getBrandModel->deleteBrand($this->tableBrand, $conditon);
        if ($isDeleted == true) {
            session::set('message_success', 'Xóa sản phẩm thành công!');
            header("Location:" . BASE_URL . "brands/list");
        } else {
            session::set('message_fail', 'Xóa sản phẩm không thành công!');
            header("Location:" . BASE_URL . "brands/list");
        }
    }
    public function edit($id)
    {
        //model process
        session::checkLoginSession();
        $conditon = "id = '$id[0]'";
        $getBrandModel = $this->loadModel('brandModel');
        $data['list_Brands'] = $getBrandModel->selectBrandById($this->tableBrand, $conditon);
        //view process
        $this->loadViewAdmin('header');
        $this->loadViewAdmin('dashboardView');
        $this->loadViewAdmin('brand/editBrandView', $data);
        $this->loadViewAdmin('footer');
    }
    public function update($id)
    {
        session::checkLoginSession();
        $conditon = "id = '$id[0]'";
        $getBrandModel = $this->loadModel('brandModel');
        $brandName = $_POST['tenhieusp'];
        $brandStatus = $_POST['tinhtrang'];
        $data  = [
            'name' => $brandName,
            'status' => $brandStatus
        ];
        $isUpdated = $getBrandModel->updateBrand($this->tableBrand, $data, $conditon);
        if ($isUpdated == true) {
            session::set('message_success', 'Cập nhật hiệu sản phẩm thành công!');
            header("Location:" . BASE_URL . "brands/list");
        } else {
            session::set('message_fail', 'Cập nhật hiệu sản phẩm không thành công!');
            header("Location:" . BASE_URL . "brands/list");
        }
    }
}
