<div class="container">
  <h1 class="text-center my-4">Danh sách đơn hàng</h1>
  <?php if (session::get('message_success') != false) { ?>
    <div style="font-size: 20px;color:green;" id="message_sucess"><?= session::get('message_success') ?></div>
  <?php session::remove('message_success');
  } else { ?>
    <div style="font-size: 20px;color:red;" id="message_fail"><?= session::get('message_fail') ?></div>
  <?php session::remove('message_fail');
  } ?>
  <div class="row">
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th class="text-center">#</th>
          <th class="text-center">Người đặt</th>
          <th class="text-center">Giá</th>
          <th class="text-center">Phương thức thanh toán</th>
          <th class="text-center">Ngày đặt hàng</th>
          <th class="text-center">Trạng thái</th>
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
                <form action="<?= BASE_URL . 'order/updateOrderStatus/' . $order['order_id'] ?>" method="POST">
                  <input type="hidden" name="status" value="1">
                  <input type="hidden" name="order_date" value="<?= $order['created_date'] ?>">
                  <input type="hidden" name="total_price" value="<?= $order['total_price'] ?>">
                  <input type="hidden" name="order_count" value="1">
                  <button class="btn btn-primary btn-sm btnOnProGress">Đang chờ</button>
                </form>
              <?php } else if ($order['status'] == 1) { ?>
                <p class="text-success">Đang vận chuyển</p>
              <?php } else if ($order['status'] == 2) { ?>
                <form action="<?= BASE_URL . 'order/delete/' . $order['order_id'] ?>" method="POST">
                  <input type="hidden" name="status" value="1">
                  <button class="btn btn-danger btn-sm btnRemove">Loại bỏ</button>
                </form>
              <?php } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>