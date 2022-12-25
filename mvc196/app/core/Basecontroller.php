<?php

class BaseController
{
    public $session = null;
    public $input = null;
    public $headerData = null;
    public $time = null;
    private $tableBrand = 'brands';
    private $tableCategory = 'categories';
    private $tableProduct = 'products';
    private $tableCart = 'cart';
    private $tableDetailCart = 'cart_detail';
    public function __construct()
    {
        $this->session = new session;
        $this->input = new input;
        $this->time = new time;
        $this->headerData = $this->setHeader();
    }
    protected function loadView($view, $data = [])
    {
        extract($data);
        require_once "./app/views/users/$view.php";
    }
    protected function loadViewAdmin($viewAdmin, $data = [], $arr = [], $array = [])
    {
        extract($data);
        extract($arr);
        extract($array);
        require_once "./app/views/adminViews/$viewAdmin.php";
    }
    protected function loadModel($modelName)
    {
        require_once "./app/models/$modelName.php";
        return new $modelName;
    }
    protected function isAjax()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest' ? true : false;
    }
    protected function processPaginationProduct($product_getData, $table_product, $pagination, $collectionName, $collum)
    {
        $number_row = $product_getData->CountRow($table_product);
        if (isset($pagination[0]) && isset($pagination[1])) {
            $numberProductOnPage = $pagination[0];
            $currentPage  = $pagination[1];
        }
        if (!isset($pagination[1]) && !isset($pagination[0]) || isset($pagination[1]) && !isset($pagination[0]) || !isset($pagination[1]) && isset($pagination[0])) {
            $currentPage = 1;
            $numberProductOnPage = 8;
        }
        $number_page = ceil($number_row / $numberProductOnPage);
        $data['number_page']  = [];
        array_push($data['number_page'], $number_page, $numberProductOnPage, $currentPage);
        $offset = ($currentPage - 1) * $numberProductOnPage;
        $data[$collectionName] = $product_getData->SelectOrder($table_product, $collum, $numberProductOnPage, $offset);
        return $data;
    }
    protected function setHeader()
    {
        // show all product type
        $header_getData = $this->loadModel('homeModel');
        $data['header_data_array'] = $header_getData->selectHomeAll($this->tableCategory);
        // show all brands 
        $HomeBrands_getData = $this->loadModel('brandModel');
        $data['HomeBrands_array'] = $HomeBrands_getData->selectBrandByAll($this->tableBrand);
        // check is logged in 
        $data['logged_in'] = false;
        if ($this->session->get('login') == true) {
            $data['logged_in'] = true;
            if ($this->session->get('user_id') !== false) {
                $data['user_id'] = $this->session->get('user_id');
                $cartModel = $this->loadModel('cartModel');
                $userCart = $cartModel->selectSpecifieldCartOfUser($this->tableCart, $this->session->get('user_id'));
                if (!empty($userCart)) {
                    $data['numInCart'] = $cartModel->countProductInCart($this->tableDetailCart, $userCart[0]['id']);
                }
            }
        }
        return $data;
    }
    protected function processPaginateAdminProduct($product_getData, $pagination, $collectionName)
    {
        $number_row = $product_getData->CountRow($this->tableProduct);
        if (isset($pagination[0]) && isset($pagination[1])) {
            $numberProductOnPage = $pagination[0];
            $currentPage  = $pagination[1];
        }
        if (!isset($pagination[1]) && !isset($pagination[0]) || isset($pagination[1]) && !isset($pagination[0]) || !isset($pagination[1]) && isset($pagination[0])) {
            $currentPage = 1;
            $numberProductOnPage = 8;
        }
        $number_page = ceil($number_row / $numberProductOnPage);
        $data['number_page']  = [];
        array_push($data['number_page'], $number_page, $numberProductOnPage, $currentPage);
        $offset = ($currentPage - 1) * $numberProductOnPage;
        $data[$collectionName] = $product_getData->selectProductPaginateAdmin($this->tableProduct, $this->tableBrand,$this->tableCategory, $numberProductOnPage, $offset);
        return $data;
    }
}
