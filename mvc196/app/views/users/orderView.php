<div class="main">
  <div class="content">
    <div class="content_top">
      <div class="cartoption">
        <div class="cartpage">
          <h2 style="width: 100%;">Xác nhận đơn hàng</h2>
          <div>
            <table class="tblone" style="width: 100%;">
              <thead>
                <th width="20%">Tên sản phẩm</th>
                <th width="10%">Ảnh</th>
                <th width="15%">Giá</th>
                <th width="25%">Số lượng</th>
                <th width="20%">Tổng tiền</th>
              </thead>
              <?php foreach ($productsInCart as $product) { ?>
                <tr>
                  <td><?= $product['product_name']; ?></td>
                  <td><img src="<?= BASE_URL . "public/imgs/" . $product['product_image']; ?>" style="height: 30px;" /></td>
                  <td><?= number_format($product['price']) .'VND'; ?></td>
                  <td><?= $product['quantity']; ?></td>
                  <td id="cart_total-price"><?= number_format($product['total_price']) .'VND'; ?></td>
                </tr>
              <?php } ?>
            </table>
            <table style="float:right;text-align:left;" width="40%">
              <tr>
                <th>Tổng tiền : </th>
                <td><?= number_format($sumtotalPrice[0]['subTotal']) .'VND' ?></td>
              </tr>
              <tr>
                <th>Thuế : </th>
                <td><?= number_format((($sumtotalPrice[0]['subTotal']) * 10 / 100)) .'VND' ?></td>
              </tr>
              <tr>
                <th>Thanh toán :</th>
                <td><?= number_format(($sumtotalPrice[0]['subTotal']) + (($sumtotalPrice[0]['subTotal']) * 10 / 100))  .'VND' ?> </td>
              </tr>
            </table>
          </div>
          <h2 style="width: 100%;margin-top:100px;">Thông tin người dùng</h2>
          <div>
            <div style="display:flex;justify-content:space-between;padding:20px 0;">
              <label for="name">Tên</label>
              <input type="text" name="name" value="<?= $user[0]['name'] ?>" style="width: 50%;padding:2px 5px;" disabled>
            </div>
            <div style="display:flex;justify-content:space-between;padding:20px 0;">
              <label for="email">Email</label>
              <input type="text" name="email" value="<?= $user[0]['email'] ?>" style="width: 50%;padding:2px 5px;" disabled>
            </div>
            <div style="display:flex;justify-content:space-between;padding:20px 0;">
              <label for="address">Địa chỉ</label>
              <input type="text" name="address" value="<?= $user[0]['address'] ?>" style="width: 50%;padding:2px 5px;" disabled>
            </div>
            <div style="display:flex;justify-content:space-between;padding:20px 0;">
              <label for="username">Tên người dùng</label>
              <input type="text" name="username" value="<?= $user[0]['username'] ?>" style="width: 50%;padding:2px 5px;" disabled>
            </div>
            <div style="display:flex;justify-content:space-between;padding:20px 0;">
              <label for="phoneNumber">Số điện thoại</label>
              <input type="text" name="phoneNumber" value="<?= $user[0]['phone_number'] ?>" style="width: 50%;padding:2px 5px;" disabled>
            </div>
          </div>
          <form action="<?= BASE_URL . 'order/store' ?>" method="POST" style="display: flex;justify-content:center;margin-top:10px;">
            <input name="payment_id" type="hidden" value="<?= $payment_id ?>" />
            <input name="cart_id" type="hidden" value="<?= $cart_id[0]['id'] ?>" />
            <input name="total" type="hidden" value="<?= ($sumtotalPrice[0]['subTotal']) + (($sumtotalPrice[0]['subTotal']) * 10 / 100) ?>" />
            
			<button class="btn-update_profile" style="background-color: #525252;"><a style="color: white;" href="<?= BASE_URL . 'cart/index/' . $user[0]['id']?>">Hủy</a></button>
			<button type="submit" class="btn-update_profile" name="btnSubmit">Xác nhận</button>
          </form>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>