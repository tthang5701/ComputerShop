<div class="main">
  <div class="content">
    <div class="content_top">
      <div class="cartoption">
        <div class="cartpage">
          <h2 style="width: 100%;">PHƯƠNG THỨC THANH TOÁN</h2>
          <div class="box-payment_method">
            <div>
              <h3 style="text-align: center;">Lựa chọn phương thức thanh toán</h3>
              <div style="display: flex;">
                <?php foreach ($payments as $payment) { ?>
                  <form action="<?= BASE_URL . 'order/index' ?>" method="post">
                    <input name="payment_id" type="hidden" value="<?= $payment['id'] ?>" />
                    <button type="submit" name="btnPayment"><?= $payment['description'] ?></button>
                  </form>
                <?php  } ?>
              </div>
              <div class="btnCartPrev">
                <a href="<?= BASE_URL . 'cart/index/' . $user_id ?>" type="button">Quay lại </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>