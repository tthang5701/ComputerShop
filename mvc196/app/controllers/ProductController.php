<?php
class ProductController extends BaseController
{
    protected $tableProduct = 'products';
    protected $tableBrand = 'brands';
    protected $tableCategory = 'categories';
    public function __construct()
    {
        parent::__construct();
    }
    //user function 
    public  function index($pagination)
    {
        //show product type 
        $data = $this->headerData;
        $this->loadView('header', $data);
        //show Product HomePage
        $product_getData = $this->loadModel('productModel');
        $dataProductsPaginated = $this->processPaginationProduct($product_getData, $this->tableProduct, $pagination, 'Product_data', 'id');
        $this->loadView('productView', $dataProductsPaginated);
        $this->loadView('footer', $data);
    }

    //show product by productType
    public function getByCategory($id)
    {
        $data = $this->headerData;
        $this->loadView('header', $data);
        // show Product HomePage
        $product_getData = $this->loadModel('productModel');
        $idCategory   = $id[0];
        $i = $product_getData->countRecord($this->tableCategory, $this->tableProduct, $idCategory);
        $number_row = $i;

        if (isset($id[1]) && isset($id[2])) {
            $numberProductOnPage = $id[1];
            $currentPage  = $id[2];
        }
        if (!isset($id[2]) && !isset($id[1]) || isset($id[2]) && !isset($id[1]) || !isset($id[2]) && isset($id[1])) {
            $currentPage = 1;
            $numberProductOnPage =10;
        }
        $number_page = ceil($number_row / $numberProductOnPage);
        $data['number_page']  = [];
        array_push($data['number_page'], $number_page, $numberProductOnPage, $currentPage);
        $offset = ($currentPage - 1) * $numberProductOnPage;
        $data['getData_byProduct_type'] = $product_getData->GetProductByIdPagination($this->tableCategory, $this->tableProduct, $idCategory, $numberProductOnPage, $offset);
        $this->loadView('productViewbyCaretory', $data);
        $this->loadView('footer', $data);
    }
    public function searchProduct($id)
    {
        $data = $this->headerData;
        $this->loadView('header', $data);
        $searchKey = $this->input->post('textSearch');
        $productModel = $this->loadModel('productModel');
        $products = $productModel->searchProduct($this->tableProduct, $searchKey);
        $number_row =  count($products) - 1;
        if (isset($id[0]) && isset($id[1])) {
            $numberProductOnPage = $id[0];
            $currentPage  = $id[1];
        }
        if (!isset($id[1]) && !isset($id[0]) || isset($id[1]) && !isset($id[0]) || !isset($id[1]) && isset($id[0])) {
            $currentPage = 1;
            $numberProductOnPage = 10;
        }
        $number_page = ceil($number_row / $numberProductOnPage);
        $data['number_page']  = [];
        array_push($data['number_page'], $number_page, $numberProductOnPage, $currentPage);
        $offset = ($currentPage - 1) * $numberProductOnPage;
        $data['Product_data'] = $productModel->searchProductPagination($this->tableProduct, $searchKey, $numberProductOnPage, $offset);
        $data['searchKey'] = $searchKey;
        $this->loadView('productSearchView', $data);
        $this->loadView('footer', $data);
    }
    //show product with category
    //admin function 
    public function create()
    {
        session::checkLoginSession();
        $this->loadViewAdmin('header');
        $this->loadViewAdmin('dashboardView');
        $caretoryProduct = $this->loadModel('category');
        $data['caretoryProduct'] = $caretoryProduct->selectcaretoryProductsByAll($this->tableCategory);
        $brandProcess = $this->loadModel('brandModel');
        $array['brandProcess'] = $brandProcess->selectBrandByAll($this->tableBrand);
        $this->loadViewAdmin('product/add_Product', $data, $array);
        $this->loadViewAdmin('footer');
    }
    public function store()
    {
        session::checkLoginSession();
        $ProductBrand = $this->input->post('idhieusp');
        $ProductName = $this->input->post('tensp');
        $ProCode = $this->input->post('masp');
        $ProductImage = $_FILES['hinhanh']['name'];
        $ProductPrice = $this->input->post('giadexuat');
        $ProductSl = $this->input->post('soluong');
        $ProductType = $this->input->post('idloaisp');
        $ProStatus = $this->input->post('tinhtrang');
        $ProContent = $this->input->post('noidung');
        $ProductDescription = $this->input->post('mota');
        $tmp_name = $_FILES['hinhanh']['tmp_name'];
        $Img_Format = explode(".", $ProductImage);
        $img_filter = strtolower(end($Img_Format));
        $img_output = $Img_Format[0] . time() . "." . $img_filter;
        $path_upload  = 'public/imgs/' . $img_output;
        $data  = [
            'brand_id' => $ProductBrand,
            'name' => $ProductName,
            'code' => $ProCode,
            'image' => $img_output,
            'price' => $ProductPrice,
            'quantity' => $ProductSl,
            'category_id' => $ProductType,
            'status' => $ProStatus,
            'content' => $ProContent,
            'description' => $ProductDescription,

        ];
        $getProductModel = $this->loadModel('productModel');
        $isStored = $getProductModel->insertProduct($this->tableProduct, $data);
        if ($isStored == true) {
            move_uploaded_file($tmp_name, $path_upload);
            session::set('message_success', 'Lưu sản phẩm thành công!');
            header("Location:" . BASE_URL . "product/list");
        } else {
            session::set('message_fail', 'Lưu sản phẩm không thành công!');
            header("Location:" . BASE_URL . "product/list");
        }
    }
    public function edit($id)
    {
        //model process
        session::checkLoginSession();
        $conditon = "id='$id[0]'";
        $list_Product = $this->loadModel('productModel');
        $data['list_ProductById'] = $list_Product->selectProductById($this->tableProduct, $conditon);
        $caretoryProduct = $this->loadModel('category');
        $array['caretoryProduct'] = $caretoryProduct->selectcaretoryProductsByAll($this->tableCategory);
        $brandProcess = $this->loadModel('brandModel');
        $arr['brandProcess'] = $brandProcess->selectBrandByAll($this->tableBrand);
        //view process
        $this->loadViewAdmin('header');
        $this->loadViewAdmin('dashboardView');
        $this->loadViewAdmin('product/edit_ProductView', $data, $array, $arr);
        $this->loadViewAdmin('footer');
    }
    public function list($pagination)
    {
        //model process
        session::checkLoginSession();
        $productModel = $this->loadModel('productModel');
        $data = $this->processPaginateAdminProduct($productModel, $pagination, 'list_Product');
        //view 
        $this->loadViewAdmin('header');
        $this->loadViewAdmin('dashboardView');
        $this->loadViewAdmin('product/list_ProductView', $data);
        $this->loadViewAdmin('footer');
    }
    public function delete($id)
    {
        session::checkLoginSession();
        //model process
        $conditon = "id='$id[0]'";
        $getProductModel = $this->loadModel('productModel');
        $isDeleted = $getProductModel->deleteProduct($this->tableProduct, $conditon);
        if ($isDeleted == true) {
            session::set('message_success', 'Xóa sản phẩm thành công!');
            header("Location:" . BASE_URL . "product/list");
        } else {
            session::set('message_fail', 'Xóa sản phẩm không thành công!');
            header("Location:" . BASE_URL . "product/list");
        }
    }
    public function update($id)
    {
        session::checkLoginSession();

        $ProductBrandCode = $this->input->post('idhieusp');
        $ProductName = $this->input->post('tensp');
        $ProductImage = $_FILES['hinhanh']['name'];
        $ProductPrice = $this->input->post('giadexuat');
        $ProductSl = $this->input->post('soluong');
        $ProductType = $this->input->post('idloaisp');
        $ProStatus = $this->input->post('tinhtrang');
        $ProContent = $this->input->post('noidung');
        $ProductDescription = $this->input->post('mota');
        $tmp_name = $_FILES['hinhanh']['tmp_name'];
        $Img_Format = explode(".", $ProductImage);
        $img_filter = strtolower(end($Img_Format));
        $img_output = $Img_Format[0] . time() . "." . $img_filter;
        $path_upload  = 'public/imgs/' . $img_output;

        $conditon = "id = '$id[0]'";
        if ($ProductImage) {
            $list_Product = $this->loadModel('productModel');
            $data['list_ProductById'] = $list_Product->selectProductById($this->tableProduct, $conditon);

            foreach ($data as $value) {
                if ($value['image']) {
                    unlink('public/imgs/' . $value['image']);
                }
            }
            $path_upload  = 'public/imgs/' . $img_output;
            $data  = [
                'brand_id' => $ProductBrandCode,
                'name' => $ProductName,
                'image' => $img_output,
                'price' => $ProductPrice,
                'quantity' => $ProductSl,
                'category_id' => $ProductType,
                'status' => $ProStatus,
                'content' => $ProContent,
                'description' => $ProductDescription,
            ];
        } else {
            $data  = [
                'brand_id' => $ProductBrandCode,
                'name' => $ProductName,
                'price' => $ProductPrice,
                'quantity' => $ProductSl,
                'category_id' => $ProductType,
                'status' => $ProStatus,
                'content' => $ProContent,
                'description' => $ProductDescription,
            ];
        }
        $getProductModel = $this->loadModel('productModel');
        $isUpdated = $getProductModel->updateProduct($this->tableProduct, $data, $conditon);
        if ($isUpdated == true) {
            move_uploaded_file($tmp_name, $path_upload);
            session::set('message_success', 'Cập nhật sản phẩm thành công!');
            header("Location:" . BASE_URL . "product/list");
        } else {
            session::set('message_fail', 'Cập nhật sản phẩm không thành công!');
            header("Location:" . BASE_URL . "product/list");
        }
    }
}
