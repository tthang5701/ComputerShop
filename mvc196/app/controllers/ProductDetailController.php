<?php

class ProductDetailController extends BaseController
{
    private $tableProducts = null;
    private $tableCategory = null;
    private $tableBrands = null;
    public function __construct()
    {
        parent::__construct();
        $this->tableProducts = 'products';
        $this->tableBrands = 'brands';
        $this->tableCategory = 'categories';
    }
    public function index($id)
    {

        //get data for header
        $data = $this->headerData;
        $this->loadView('header', $data);
        // show product detail content
        $condition = $id[0];
        $productModel = $this->loadModel('productModel');
        $this->updateViewCount($productModel, $condition);
        $data['product'] = $productModel->getProductDetailInfor($this->tableProducts, $this->tableBrands, $this->tableCategory, $condition);
        // get data categories list 
        $categoryModel = $this->loadModel('category');
        $data['categories'] = $categoryModel->selectcaretoryProductsByAll($this->tableCategory);
        $this->loadView('product_detail', $data);
        $this->loadView('footer', $data);
    }
    public function updateViewCount($productModel, $id)
    {
        $product = $productModel->selectProductByBrandName($this->tableProducts, $id);
        $data = [
            'view_count' => $product[0]['view_count'] + 1,
        ];
        $productModel->updateViewCountNumber($this->tableProducts, $data, "id=$id");
    }
}
