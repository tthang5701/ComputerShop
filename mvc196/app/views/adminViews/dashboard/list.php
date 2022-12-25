<div class="container mt-5">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
      <p style="font-size: 20px;"><i class="fa fa-home" aria-hidden="true"></i><span style="margin-left: 20px;">Trang chủ</span></p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12 col-md-4 col-lg-4">
      <div class="infor-app_item" style="width: 100%;height:180px;background-color:rgb(228,183,43,0.9);color:white;">
        <p style="font-size:25px;font-weight:900;margin-left:30px;padding-top:10px;border-bottom:2px solid white;">Người dùng</p>
        <div style="margin-left: 30px;display:flex;justify-content:space-between;">
          <p style="font-size: 30px;"><i class="fa fa-users" aria-hidden="true"></i></p>
          <p style="margin-right:30px;font-size:20px;padding-top:10px;"><?= $data['statisticsAppDonut']['users'] ?></p>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
      <div class="infor-app_item" style="width: 100%;height:180px;background-color:#2fc43b;color:white;">
        <p style="font-size:25px;font-weight:900;margin-left:30px;padding-top:10px;border-bottom:2px solid white;">Số đơn hàng</p>
        <div style="margin-left: 30px;display:flex;justify-content:space-between;">
          <p style="font-size: 30px;"><i class="fa fa-truck" aria-hidden="true"></i></p>
          <p style="margin-right:30px;font-size:20px;padding-top:10px;"><?= $data['statisticsAppDonut']['orders'] ?></p>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
      <div class="infor-app_item" style="width: 100%;height:180px;background-color:#fa0a0a;color:white;">
        <p style="font-size:25px;font-weight:900;margin-left:30px;padding-top:10px;border-bottom:2px solid white;">Thu nhập</p>
        <div style="margin-left: 30px;display:flex;justify-content:space-between;">
          <p style="font-size: 30px;"><i class="fa fa-money" aria-hidden="true"></i></p>
          <p style="margin-right:30px;font-size:20px;padding-top:10px;"><?= number_format($getEarnings[0]['Earnings']).'VND'?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 mt-5" style="display: flex;justify-content:space-between">
      <p style="font-size: 20px;"><i class="fa fa-line-chart" aria-hidden="true"></i><span style="margin-left: 20px;">Lược đồ thống kê doanh thu</span></p>
      <?php if ($countEarningRecords > 0) { ?>
        <form action="<?= BASE_URL . 'dashboard/statisticEarnings' ?>" method="post">
          <button type="submit" name="btnSubmit" class="btn btn-primary btn-sm">Thống kê<i class="fa fa-arrow-right" aria-hidden="true" style="padding-left:5px;"></i></button>
        </form>
      <?php } ?>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div id="myfirstchart" style="height: 300px;"></div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 mt-5" style="display: flex;justify-content:space-between">
      <p style="font-size: 20px;"><i class="fa fa-pie-chart" aria-hidden="true"></i>
        <span style="margin-left: 20px;">Thống kê</span>
      </p>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-sm-12 col-md-4 col-lg-6">
      <div id="statistic-chart-donus" style="height: 500px;"></div>
    </div>
    <div class="col-md-12 col-sm-12 col-lg-6">
      <h2 style="font-weight: bolder;">Danh sách sản phẩm xem nhiều</h2>
      <ul class="list-group">
        <?php foreach ($listingProductViewMost as $index => $product) { ?>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <p><span class="fw-bold text-success"><?= $index + 1 . ' . ' ?></span><?= $product['name'] ?></p>
            <span class="badge badge-primary badge-pill" style="background-color: green;border-radius:50%"><?= $product['view_count'] ?></span>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 mt-5">
      <p style="font-size: 20px;"><i class="fa fa-archive" aria-hidden="true"></i>
        <span style="margin-left: 20px;">Danh sách đơn hàng</span>
      </p>
    </div>
  </div>
  <div class="mt-5 row">
    <div class="col-sm-12 col-md-12 col-lg-8 mt-4">
      <table class="table">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Người đặt hàng</th>
            <th class="text-center">Giá</th>
            <th class="text-center">Phương thức thanh toán</th>
            <th class="text-center">Ngày đặt hàng</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center"><a href="<?= BASE_URL . 'order/list' ?>"><i class="fa fa-arrow-circle-right" aria-hidden="true" style="font-size: 20px;"></i></a></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($orders as $index => $order) { ?>
            <tr>
              <td class="text-center" scope="col"><?= $index + 1; ?></td>
              <td class="text-center" scope="col"><?= $order['order_user']; ?></td>
              <td class="text-center" scope="col"><?= number_format($order['total_price']).'VNĐ' ?></td>
              <td class="text-center" scope="col"><?= $order['payment_name']; ?></td>
              <td class="text-center" scope="col"><?= $order['created_date']; ?></td>
              <td class="d-flex justify-content-center">
                <?php if ($order['status'] == 0) { ?>
                  <p class="text-info">Đang chờ</p>
                <?php } else if ($order['status'] == 1) { ?>
                  <p class="text-success">Đang vận chuyển</p>
                <?php } else if ($order['status'] == 2) { ?>
                  <p class="text-danger">Loại bỏ</p>
                <?php } ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-4">
      <caption class="text-success fw-bold fs-6">
        <span style="
            width: 10px;
            height: 10px;
            background-color: #1dcb32;
            display: inline-block;
            line-height: 10px;
            border-radius: 50%;
            margin-right: 5px;
        "></span><span style="color: green;">Online</span>
      </caption>
      <table class="table caption-top">
        <thead>
          <tr>
            <th scope="col" class="fw-bold text-dark">Tên</th>
            <th scope="col" class="fw-bold text-dark">Trạng thái</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($userOline as  $user) { ?>
            <tr>
              <th scope="row" class="text-bold"><?= $user['name'] ?></th>
              <td class="text-success fw-bold">Online</td>
            </tr>
          <?php } ?>
        </tbody>
    </div>
  </div>
</div>