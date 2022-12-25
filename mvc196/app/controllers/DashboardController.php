<?php


class DashboardController extends BaseController
{
  protected $tableEarnings = 'earnings';
  protected $tableStatistic = 'statistic';
  protected $tableOrder = 'orders';
  protected $tableOrderDetail = 'order_detail';
  public function __construct()
  {
    parent::__construct();
  }
  public function statisticEarnings()
  {
    session::checkLoginSession();
    $statisticModel = $this->loadModel('statisticModel');
    $earnings = $statisticModel->statistiProcessing($this->tableEarnings);
    foreach ($earnings as $earning) {
      $data = [
        'order_date' => $earning['created_at'],
        'earnings' => $earning['sumPrice'],
        'order_quanlities' => $earning['orderCounted'],
        'product_quanlities' => $earning['productCounted'],
      ];
      $statisticModel->insertStatisticTable($this->tableStatistic, $data);
    }
    $statisticModel->deleteEarningsTable($this->tableEarnings);
    header("Location:" . BASE_URL . 'dashboard/dashboard');
  }
  public function dashboard()
  {
    session::checkLoginSession();
    $this->loadViewAdmin('header');
    $this->loadViewAdmin('dashboardView');
    $statisticModel = $this->loadModel('statisticModel');
    $countEarningRecords = count($statisticModel->selectAll($this->tableEarnings));
    $data['countEarningRecords'] = $countEarningRecords;
    $data['statisticsAppDonut'] = [
      'payments' => count($statisticModel->selectAll('payments')),
      'news' => count($statisticModel->selectAll('news')),
      'users' => count($statisticModel->selectAll('users')),
      'sliders' => count($statisticModel->selectAll('slider')),
      'products' => count($statisticModel->selectAll('products')),
      'brands' => count($statisticModel->selectAll('brands')),
      'categories' => count($statisticModel->selectAll('categories')),
      'orders' => count($statisticModel->selectAll('orders')),
    ];
    $data['getEarnings'] = $statisticModel->getEarnings($this->tableStatistic);
    $data['listingProductViewMost'] = $statisticModel->selectMostViewList('products');
    $orderModel = $this->loadModel('orderModel');
    $userModel = $this->loadModel('User');
    $data['orders'] = $orderModel->selectAllOrder($this->tableOrder, $this->tableOrderDetail, 'products', 'payments', 'users', 'cart');
    $data['userOline'] = $userModel->getUserOnlineList('users');
    $this->loadViewAdmin('dashboard/list', $data);
    $this->loadViewAdmin('footer', $data);
  }
  public function getDataForChart()
  {
    $statisticModel = $this->loadModel('statisticModel');
    $toDate = date('Y-m-t');
    $fromDate = date('Y-m-01');
    $chartStatistic = $statisticModel->selectStatisticAll($this->tableStatistic, $fromDate, $toDate);
    echo json_encode($chartStatistic);
  }
}
