<?php

class  CartController extends BaseController
{
    protected $tableCart = null;
    protected $tableProduct = null;
    protected $tableCartDetail = null;
    public function __construct()
    {
        parent::__construct();
        $this->tableCart = 'cart';
        $this->tableProduct = 'products';
        $this->tableCartDetail = 'cart_detail';
    }
    public function index($id)
    {
        // show header information
        $data = $this->headerData;
        $this->loadView('header', $data);
        $getCartModel = $this->loadModel('cartModel');
        $data['productsInCart'] = $getCartModel->selectCartInformation($this->tableCart, $this->tableCartDetail, $this->tableProduct, $id[0]);
        $data['sumtotalPrice'] = $getCartModel->sumTotalPrice($this->tableCart, $this->tableCartDetail, $this->tableProduct, $id[0]);
        $this->loadView('cartView', $data);
        $this->loadView('footer', $data);
    }
    public function checkOut()
    {
        $data = $this->headerData;
        $this->loadView('header', $data);
        $payments = $this->loadModel('paymentModel');
        $data['payments'] = $payments->selectPaymentList('payments');
        $this->loadView('checkoutView', $data);
        $this->loadView('footer', $data);
    }
    public function updateQuantityProductCart()
    {
        $productId = $this->input->post('product_id');
        $userId = $this->input->post('user_id');
        $cartId = $this->input->post('cart_id');
        $quantity = $this->input->post('quantity');
        $price = $this->input->post('price');
        $cartModel = $this->loadModel('cartModel');
        $condition = "cart_id = '$cartId' AND product_id='$productId'";
        $data = [
            'quantity' => $quantity,
            'total_price' => $quantity *  $price,
        ];
        $isUpdated = $cartModel->updateCart($this->tableCartDetail, $data, $condition);
        if ($isUpdated == true) {
            session::set('message_success', 'Cập nhật thông tin giỏ hàng thành công!');
            header("Location:" . BASE_URL . "cart/index/" . $userId);
        } else {
            session::set('message_fail', 'Cập nhật thông tin giỏ hàng thất bại!');
            header("Location:" . BASE_URL . "cart/index/" . $userId);
        }
    }
    private function checkCartIsset($cartModel, $userId)
    {
        return  $cartModel->selectSpecifieldCartOfUser($this->tableCart, $userId);
    }
    //check san pham da ton tai trong gio hang hay chưa
    public function checkProductIssetInCart($cartModel, $userId, $idOfProductNeedAdd)
    {
        $cartOfUser = $this->checkCartIsset($cartModel, $userId); // lay ra gio hang cua user
        $cartId = $cartOfUser[0]['id'];
        $cartDetailOfUser = $cartModel->getSpecifyInCart($this->tableCartDetail, $cartId); //lay ra chi tiet gio hang cua user do
        $productIdArray = [];
        foreach ($cartDetailOfUser as  $cartDetail) {
            array_push($productIdArray, $cartDetail['product_id']);
        }
        if (in_array($idOfProductNeedAdd, $productIdArray) == 1) {
            return true;
        };
        return false;
    }
    protected function insertToCartDetail($cartModel, $userId, $productId)
    {
        $cartOfUser = $this->checkCartIsset($cartModel, $userId);
        if (($this->checkProductIssetInCart($cartModel, $userId, $productId)) == true) {
            //neu san pham da ton tai trong gio hang ma them hang thi cap nhat them so luong san pham trong gio hang + 1
            $quantityCurrentOfProductArray = $cartModel->getQuantitiesOfProductInCartDetail($this->tableCartDetail, $cartOfUser[0]['id'], $productId);
            $quantityCurrentOfProduct = $quantityCurrentOfProductArray[0]['quantity'];
            $data = [
                'quantity' => $quantityCurrentOfProduct + 1,
            ];
            $condition = "product_id = $productId";
            $cartModel->updateCart($this->tableCartDetail, $data, $condition);
            header("Location:" . BASE_URL . "cart/index/" . $userId);
        } else {
            $insertDataOfCartDetailTable = [
                'product_id' => $this->input->post('idsanpham'),
                'quantity' => $this->input->post('quanlity'),
                'price' => $this->input->post('price'),
                'cart_id' => $cartOfUser[0]['id'],
                'total_price' => $this->input->post('quanlity') * $this->input->post('price'),
            ];
            $cartModel->insertToCart('cart_detail', $insertDataOfCartDetailTable);
            header("Location:" . BASE_URL . "cart/index/" . $userId);
        }
    }
    private function checkProductIsInStock($idProduct)
    {
        $productModel = $this->loadModel('productModel');
        $productQuantities = $productModel->selectProductById($this->tableProduct, "id = $idProduct");
        return $productQuantities[0]['quantity'];
    }
    public function addToCart($id)
    {
        if ($this->checkProductIsInStock($this->input->post('idsanpham')) >= $this->input->post('quanlity')) {
            $insertDataOfCartTable = [
                'user_id' => $id[0],
                'created_date' =>  date('Y-m-d'),
            ];

            $cartModel = $this->loadModel('cartModel');
            $checkIsset = $cartModel->CountRowToCheckIsset($this->tableCart, $id[0]);
            //if user do not have any carts
            if ($checkIsset == 0) {
                //create a new cart for user
                $cartModel->insertToCart($this->tableCart, $insertDataOfCartTable);
                $this->insertToCartDetail($cartModel, $id[0], $this->input->post('idsanpham'));
            }
            //else user haved cart
            else {
                $this->insertToCartDetail($cartModel, $id[0], $this->input->post('idsanpham'));
            }
        } else {
            session::set('message_fullstock', 'Số lượng bạn mua nhiều hơn số lượng hàng hiện có!');
            header("Location:" . BASE_URL . "productDetail/index/" . $this->input->post('idsanpham'));
        }
    }
    // delete cart item 
    public function deleteCart($id)
    {
        $cartModel = $this->loadModel('cartModel');
        //get the cart of user want to delete
        $userCart = $this->checkCartIsset($cartModel, $id[0]);
        $condition = "id = $id[1]";
        $isDeleted = $cartModel->deleteCart($this->tableCartDetail, $condition);
        if ($isDeleted == true) {
            session::set('message_success', 'Xóa sản phẩm trong giỏ thành công!');
            header("Location:" . BASE_URL . "cart/index/" . $id[0]);
        } else {
            session::set('message_fail', 'Xóa sản phẩm trong giỏ thất bại!');
            header("Location:" . BASE_URL . "cart/index/" . $id[0]);
        }
    }
}
