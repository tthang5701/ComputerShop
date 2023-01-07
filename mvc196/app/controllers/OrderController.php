<?php

class OrderController extends BaseController
{
    protected $tableCart = 'cart';
    protected $tableCartDetail = 'cart_detail';
    protected $tableProduct = 'products';
    protected $tableOrder = 'orders';
    protected $tableDetailOrder = 'order_detail';
    protected $tablePayment = 'payments';
    protected $tableUser = 'users';
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = $this->headerData;
        $this->loadView('header', $data);
        $data['payment_id'] = $this->input->post('payment_id');
        $user_id = $data['user_id'];
        $getCartModel = $this->loadModel('cartModel');
        $getUserModel = $this->loadModel('User');
        $data['productsInCart'] = $getCartModel->selectCartInformation($this->tableCart, $this->tableCartDetail, $this->tableProduct, $user_id);
        $data['sumtotalPrice'] = $getCartModel->sumTotalPrice($this->tableCart, $this->tableCartDetail, $this->tableProduct, $user_id);
        $data['user'] = $getUserModel->selectSpecifyUser('users', $user_id);
        $data['cart_id'] = $getCartModel->selectSpecifieldCartOfUser($this->tableCart, $user_id);
        $this->loadView('orderView', $data);
        $this->loadView('footer', $data);
    }
    private function updateQuantitiesProductWhenAccpetedOrder($currentQuantities, $quantity, $productId)
    {
        $productModel = $this->loadModel('productModel');
        $data = [
            'quantity' => $currentQuantities - $quantity,
        ];
        $productModel->updateQuanlitiesOfProduct($this->tableProduct, $data, "id = $productId");
    }
    private function getQuantitiesCurrentOfProduct($productId)
    {
        $productModel = $this->loadModel('productModel');
        $product = $productModel->selectProductById($this->tableProduct, "id = $productId");
        return $product[0]['quantity'];
    }
    private function orderStorationProcessing($getOrderModel, $cart_id, $getCartModel,$latest_order_id,$receive_user_name,$receive_user_address,$receive_user_phoneNumber)
    {
        $order = $getOrderModel->selectOrderItem($this->tableOrder, 'id', $latest_order_id);
        $productsInCart = $getCartModel->getSpecifyInCart($this->tableCartDetail, $cart_id);
        foreach ($productsInCart as $product) {
            $data = [
                'order_id' => $latest_order_id,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
                'consignee_name' =>$receive_user_name,
                'consignee_address'=>$receive_user_address,
                'consignee_phone' =>$receive_user_phoneNumber

            ];
            $getOrderModel->insertToOrderTable($this->tableDetailOrder, $data);
            $currentQuantities = $this->getQuantitiesCurrentOfProduct($product['product_id']);
            $this->updateQuantitiesProductWhenAccpetedOrder($currentQuantities, $product['quantity'], $product['product_id']);
        }
        $getCartModel->deleteCart($this->tableCartDetail, "cart_id=$cart_id");
        $orderId = $order[0]['id'];
        return $orderId;
    }
    public function store()
    {
        $payment_id = $this->input->post('payment_id');
        $user_id  = $this->input->post('user_id');
        $cart_id  = $this->input->post('cart_id');
        $receive_user_name = $this->input->post('received_user_name');
        $receive_user_address = $this->input->post('received_user_address');
        $receive_user_phoneNumber = $this->input->post('received_user_phoneNumber');
        $dataInsertedOrder = array(
            'user_id' => $user_id,
            'payment_id' => $payment_id,
            'status' => 0,
            'created_date' => date('Y-m-d'),
            'total' => $this->input->post('total'),
        );
        $getOrderModel = $this->loadModel('orderModel');
        $isStoredOrderTable = $getOrderModel->insertToOrderTable($this->tableOrder, $dataInsertedOrder);
        
        if ($isStoredOrderTable == true) {
            $orderInserted = $getOrderModel->selectLatestOrderIn($this->tableOrder);
            $getCartModel = $this->loadModel('cartModel');
            $orderId = $this->orderStorationProcessing($getOrderModel, $cart_id, $getCartModel,$orderInserted[0]['latest_order_id'],$receive_user_name,$receive_user_address,$receive_user_phoneNumber);
            header("Location:" . BASE_URL . "order/thankForOrdering/" . $orderId);
        }
    }

    public function thankForOrdering($orderId)
    {
        $data = $this->headerData;
        $this->loadView('header', $data);
        $data['order_id'] = $orderId[0];
        $data['user_id'] = $this->session->get('user_id');
        $this->loadView('thankForOrderingView', $data);
        $this->loadView('footer', $data);
    }
    public function orderTracking($userId)
    {
        $data = $this->headerData;
        $this->loadView('header', $data);
        $orderModel = $this->loadModel('orderModel');
        $orderList = $orderModel->selectOrderTracking($this->tableOrder, $this->tablePayment,$this->tableUser,$userId[0]);
        $data['newOrderList'] = $orderList;
        $this->loadView('orderListView', $data);
        $this->loadView('footer', $data);
    }
    public function updateOrderStatus($id)
    {
        $status = $this->input->post('status');
        $orderModel = $this->loadModel('orderModel');
        $data = ['status' =>  $status];
        $isUpdated = $orderModel->updateStatusOfOrder($this->tableOrder, $data, "id=$id[0]");
        if ($isUpdated == true) {
            if ($status == 1) {
                $productCountInOrder = $orderModel->countProductNumberInOrder($this->tableOrder, $this->tableDetailOrder, 'order_id', $id[0]);
                $this->storeEarnings($orderModel, $productCountInOrder);
            }
            session::set('message_success', 'Cập nhật đơn hành thành công');
            header("Location:" . BASE_URL . "order/list");
        } else {
            session::set('message_fail', 'Cập nhật đơn hành không thành công');
            header("Location:" . BASE_URL . "order/list");
        }
    }
    public function storeEarnings($orderModel, $productCount)
    {
        $totalPrice = $this->input->post('total_price');
        $orderDate = $this->input->post('order_date');
        $orderCount = $this->input->post('order_count');
        $data = [
            'total_price' => $totalPrice,
            'product_count' => $productCount,
            'order_count' => $orderCount,
            'created_date' => $orderDate,
        ];
        $orderModel->insertToOrderTable('earnings', $data);
    }
    public function updateOrderStatusInUser($id)
    {
        $status = $this->input->post('status');
        $orderModel = $this->loadModel('orderModel');
        $data = ['status' =>  $status];
        $user_id = $this->session->get('user_id');
        $isUpdated = $orderModel->updateStatusOfOrder($this->tableOrder, $data, "id=$id[0]");
        if ($isUpdated == true) {
            session::set('message_success', 'Cập nhật trạng thái đơn hàng thành công');
            header("Location:" . BASE_URL . "order/orderTracking/" . $user_id);
        } else {
            session::set('message_fail', 'Cập nhật trạng thái đơn hàng không thành công');
            header("Location:" . BASE_URL . "order/orderTracking/" . $user_id);
        }
    }
   
}
