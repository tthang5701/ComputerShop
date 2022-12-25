<div class="container">
  <h1 class="text-center mt-3">Cập nhật sản phẩm</h1>
  <?php foreach ($list_ProductById as $key => $value) { ?>
    <form action="<?= BASE_URL . "product/update/" . $value['id'] ?>" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label for="pwd">Thương hiệu:</label>
        <select name="idhieusp" class="form-control">
          <?php foreach ($brandProcess as $key => $brandProcessvalue) {
          ?>
            <option value="<?= $brandProcessvalue['id']; ?>" <?php if($value['brand_id'] == $brandProcessvalue['id']){ echo "selected";} 
			?>><?= $brandProcessvalue['name'] ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group">
        <label for="tensp">Tên sản phẩm:</label>
        <input type="text" class="form-control" name='tensp' id="tensp" value="<?= $value['name'] ?>">
      </div>
      <div class="form-group">
        <label for="masp">Mã sản phẩm:</label>
        <input type="text" class="form-control" name='masp' id="masp" value="<?= $value['code'] ?>" disabled>
      </div>
      <div class="form-group">
        <label for="hinhanh">Hình ảnh:</label>
        <input type="file" class="form-control" name='hinhanh' id="hinhanh">
        <p><img src="<?= BASE_URL . "public/imgs/" . $value['image']; ?>" alt=""></p>
      </div>
      <div class="form-group">
        <label for="giadexuat">Giá:</label>
        <input type="number" class="form-control" id="giadexuat" name="giadexuat" value="<?= $value['price'] ?>">
      </div>
      <div class="form-group">
        <label for="soluong">Số lượng:</label>
        <input type="number" class="form-control" id="soluong" name="soluong" value="<?= $value['quantity'] ?>">
      </div>
      <div class="form-group">
        <label for="loaisp">Loại sản phẩm:</label>
        <select name="idloaisp" id="idloaisp" class="form-control">
          <?php foreach ($caretoryProduct as $key => $caretoryProductvalue) {
          ?>
            <option value="<?= $caretoryProductvalue['id']; ?>"><?= $caretoryProductvalue['name'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="tinhtrang">Trạng thái:</label>
        <select id="tinhtrang" class="form-control" name="tinhtrang">
          <?php
          $options  = ['1' => 'Hiển thị', '0' => 'Không hiển thị'];
          foreach ($options as $key => $option) {
            if ($value['status'] == $key) {
              echo "<option value=" . $key . " selected>" . $option . "</option>";
            } else {
              echo "<option value=" . $key . ">" . $option . "</option>";
            }
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="noidung">Nội dung:</label>
        <textarea name="noidung" id="ckeditor_product_edit" class="form-control" rows="10"><?= $value['content']; ?></textarea>
      </div>
      <div class="form-group">
        <label for="mota">Mô tả chi tiết:</label>
        <textarea name="mota" id="ckeditor_product_edit_des" class="form-control" rows="10"><?= $value['description']; ?></textarea>
      </div>
      <button type="submit" class="btn btn-dark btn-block mb-4">Cập nhật</button>
    </form>
  <?php } ?>
</div>