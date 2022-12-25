<div class="main">
  <div class="content">
    <div class="section group">
      <div class="cont-desc span_1_of_2">
        <div class="grid images_3_of_2">
          <img src="<?= BASE_URL . "public/imgs/" . $product[0]['image'] ?>" />
        </div>
        <div class="desc span_3_of_2">
          <h2><?= $product[0]['name'] ?></h2>
          <div class="description-product-detail">
            <?= $product[0]['description'] ?>
          </div>
          <div class="price">
            <p>Giá: <span><?= number_format($product[0]['price']) . 'VNĐ' ?></span></p>
            <p>Loại sản phẩm: <span><?= $product[0]['category_name'] ?></span></p>
            <p>Thương hiệu:<span><?= $product[0]['brand_name'] ?></span></p>
          </div>
          <div class="add-cart">
            <?php if (!empty($logged_in)) {
              $URL = BASE_URL . "Cart/addToCart/" . $user_id;
            } else {
              $URL = LOGIN_URL_DEFAULT;
            }
            ?>
            <form action="<?= $URL ?>" method="post">
              <input type="number" class="buyfield" name="quanlity" min="1" value="1" />
              <input type="hidden" name="price" value="<?= $product[0]['price'] ?>" />
              <input type="hidden" name="idsanpham" value="<?= $product[0]['id'] ?>" />
              <button type="submit" class="buysubmit" name="submit" style="    width: 100px;
              height: 24px;margin-left: 20px;background-color: #602d8d;font-size: 14px;">Mua</button>
            </form>
          </div>
          <br>
          <?php if (session::get('message_fullstock') !== false) { ?>
            <p style="width:100%;color:red;font-size:14px" id="message_fullstock"><?= session::get('message_fullstock') ?></p>
          <?php session::remove('message_fullstock');
          } ?>
        </div>
        <div class="product-desc">
          <h2>Chi tiết sản phẩm</h2>
          <?= $product[0]['content'] ?>
        </div>
      </div>
      <div class="rightsidebar span_3_of_1">
        <h2>Loại sản phẩm</h2>
        <ul>
          <?php foreach ($categories as  $value) { ?>
            <li><a href='<?= BASE_URL . "product/getByCategory/" . $value['id'] ?>'><?= $value['name'] ?></a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div>