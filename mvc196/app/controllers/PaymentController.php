<?php
class PaymentController extends BaseController
{
  protected $tablePayment = 'payments';
  public function __construct()
  {
    parent::__construct();
  }
  //admin modul
  public function create()
  {

    session::checkLoginSession();
    $this->loadViewAdmin('header');
    $this->loadViewAdmin('dashboardView');
    $this->loadViewAdmin('payment/create');
    $this->loadViewAdmin('footer');
  }
  public function store()
  {
    session::checkLoginSession();
    $name = $this->input->post('name');
    $description = $this->input->post('description');
    $data  = [
      'name' => $name,
      'description' =>  $description,
    ];

    $paymentModel = $this->loadModel('paymentModel');
    $isStored = $paymentModel->insertPayment($this->tablePayment, $data);

    if ($isStored == true) {
      session::set('message_success', 'Lưu phương thức thanh toán thành công');
      header("Location:" . BASE_URL . "payment/list");
    } else {
      session::set('message_fail', 'Lưu phương thức thanh toán thành công');
      header("Location:" . BASE_URL . "payment/list");
    }
  }
  public function list()
  {
    //model process
    session::checkLoginSession();
    $paymentModel = $this->loadModel('paymentModel');
    $data['payments'] = $paymentModel->selectPaymentList($this->tablePayment);
    //view process
    $this->loadViewAdmin('header');
    $this->loadViewAdmin('dashboardView');
    $this->loadViewAdmin('payment/list', $data);
    $this->loadViewAdmin('footer');
  }
  public function delete($id)
  {
    //model process
    session::checkLoginSession();
    $conditon = "id='$id[0]'";
    $paymentModel = $this->loadModel('paymentModel');
    $isDeleted = $paymentModel->deletePayment($this->tablePayment, $conditon);

    if ($isDeleted == true) {
      session::set('message_success', 'Xóa phương thức thanh toán thành công');
      header("Location:" . BASE_URL . "payment/list");
    } else {
      session::set('message_fail', 'Xóa phương thức thanh toán không thành công');
      header("Location:" . BASE_URL . "payment/list");
    }
  }
  public function edit($id)
  {
    //model process
    session::checkLoginSession();
    $paymentModel = $this->loadModel('paymentModel');
    $data['payment'] = $paymentModel->selectToEditPayment($this->tablePayment, $id[0]);
    //view process
    $this->loadViewAdmin('header');
    $this->loadViewAdmin('dashboardView');
    $this->loadViewAdmin('payment/edit', $data);
    $this->loadViewAdmin('footer');
  }
  public function update($id)
  {
    $conditon = "id = '$id[0]'";
    $paymentModel = $this->loadModel('paymentModel');
    $data = [
      'name' => $this->input->post('name'),
      'description' =>  $this->input->post('description'),
    ];
    $isUpdated = $paymentModel->updatePayment($this->tablePayment, $data, $conditon);

    if ($isUpdated == true) {
      session::set('message_success', 'Cập nhật phương thức thanh toán thành công!');
      header("Location:" . BASE_URL . "payment/list");
    } else {
      session::set('message_fail', 'Cập nhật phương thức thanh toán không thành công!');
      header("Location:" . BASE_URL . "payment/list");
    }
  }
}
