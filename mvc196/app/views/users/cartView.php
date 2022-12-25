<div class="main">
  <div class="content">
    <div class="content_top">
      <div class="cartoption">
        <div class="cartpage">
          <h2 style="width: 100%;">Giỏ hàng của bạn</h2>
          <?php if (session::get('message_success') != false) { ?>
            <div style="font-size: 20px;color:green;" id="message_sucess"><?= session::get('message_success') ?></div>
          <?php session::remove('message_success');
          } else { ?>
            <div style="font-size: 20px;color:red;" id="message_fail"><?= session::get('message_fail') ?></div>
          <?php session::remove('message_fail');
          } ?>
          <table class="tblone" style="width: 100%;">
            <thead>
              <th width="20%">Tên</th>
              <th width="10%">Ảnh</th>
              <th width="15%">Giá</th>
              <th width="25%">Số lượng</th>
              <th width="20%">Giá</th>
              <th width="10%">Lựa chọn</th>
            </thead>
            <?php foreach ($productsInCart as $product) { ?>
              <tr>
                <td><?= $product['product_name']; ?></td>
                <td><img src="<?= BASE_URL . "public/imgs/" . $product['product_image']; ?>" style="height: 30px;" /></td>
                <td><?= number_format($product['price']) . 'VND' ?></td>
                <td>
                  <form method="post" action="<?= BASE_URL . "cart/updateQuantityProductCart" ?>">
                    <input type="hidden" name="price" value="<?= $product['price'] ?>" />
                    <input type="hidden" name="user_id" value="<?= $product['user_id'] ?>" />
                    <input type="hidden" name="cart_id" value="<?= $product['cart_id'] ?>" />
                    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>" />
                    <input type="number" name="quantity" value="<?= $product['quantity'] ?>" min="1"/>
                    <input type="submit" name="submit" value="Cập nhật" style="margin-left: 0px;" />
                  </form>
                </td>
                <td id="cart_total-price"><?= number_format($product['total_price']) . 'VND' ?></td>
                <td><a href="<?= BASE_URL . "cart/deleteCart/" . $product['user_id'] . "/" . $product['id'] ?>">X</a></td>
              </tr>
            <?php } ?>
          </table>
          <table style="float:right;text-align:left;" width="40%">
            <tr>
              <th>Tổng giá : </th>
              <td><?= number_format($sumtotalPrice[0]['subTotal']) . 'VND' ?></td>
            </tr>
            <tr>
              <th>Thuế : </th>
              <td><?= number_format((($sumtotalPrice[0]['subTotal']) * 10 / 100)) . 'VND' ?></td>
            </tr>
            <tr>
              <th>Tổng tiền :</th>
              <td><?= number_format(($sumtotalPrice[0]['subTotal']) + (($sumtotalPrice[0]['subTotal']) * 10 / 100)) . 'VND' ?> </td>
            </tr>
          </table>
        </div>
        <div class="shopping" style="display:flex;justify-content:space-around">
          <div class="shopleft" style="width: 220px;height:90px;">
            <a href="<?= BASE_URL . "product/index" ?>"> <button style="background-color: #6a6a6a;font-size: 20px;width: 240px;height:50px;" >Tiếp tục mua hàng</button></a>
          </div>
          <div class="shopright" style="width: 240px;height:90px;">
            <a href="<?= BASE_URL . "cart/checkOut" ?>"> <button style="background-color:#6a6a6a;font-size: 20px;width: 240px;height:50px;" >Thanh toán</button></a>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>