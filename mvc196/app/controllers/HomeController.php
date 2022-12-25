<?php
class HomeController extends BaseController
{
    private $tableProduct = null;
    private $tableSlider = null;
    private $tableCategories = null;
    private $tableBrands = null;
    public function __construct()
    {
        parent::__construct();
        $this->tableProduct = 'products';
        $this->tableSlider = 'slider';
        $this->tableCategories = 'categories';
        $this->tableBrands = 'brands';
    }
    public function index($pagination)
    {
        // view Process
        $data = $this->headerData;
        $this->loadView('header', $data);
        // show Product HomePage
        $getProductModel = $this->loadModel('homeModel');
        $dataProductPaginated = $this->processPaginationProduct($getProductModel, $this->tableProduct, $pagination, 'homeProduct_data', 'id');
        // show slider
        $ImgSlider = $this->loadModel('sliderModel');
        $data['sliders'] = $ImgSlider->SelectWIthSort($this->tableSlider, 'id');
        $data['TopProductBrandHome_data'] = $getProductModel->selectProductByBrand($this->tableProduct, $this->tableBrands, intval(4));
        $this->loadView('slider', $data);
        $this->loadView('homeview', $dataProductPaginated);
        $this->loadView('footer', $data);
    }
}
