<div class="container">
  <h1 class="text-center mt-4">Tạo sản phẩm mới</h1>
  <form action="<?= BASE_URL . "product/store" ?>" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label for="pwd">Thương hiệu sản phẩm:</label>
      <select name="idhieusp" class="form-control">
        <?php foreach ($brandProcess as $key => $value) {
        ?>
          <option value="<?= $value['id']; ?>"><?= $value['name'] ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group">
      <label for="tensp">Tên:</label>
      <input type="text" class="form-control" name='tensp' id="tensp">
    </div>
    <div class="form-group">
      <label for="masp">Mã:</label>
      <input type="text" class="form-control" name='masp' id="masp">
    </div>
    <div class="form-group">
      <label for="hinhanh">Ảnh:</label>
      <input type="file" class="form-control" name='hinhanh' id="hinhanh">
    </div>
    <div class="form-group">
      <label for="noidung">Nội dung:</label>
      <textarea name="noidung" id="ckeditor_product_add" class="form-control" rows="10"></textarea>
    </div>
    <div class="form-group">
      <label for="mota">Mô tả chi tiết:</label>
      <textarea name="mota" id="ckeditor_product_des" class="form-control" rows="10"></textarea>
    </div>
    <div class="form-group">
      <label for="giadexuat">Giá:</label>
      <input type="number" class="form-control" id="giadexuat" name="giadexuat">
    </div>
    <div class="form-group">
      <label for="soluong">Số lượng có:</label>
      <input type="number" class="form-control" id="soluong" name="soluong">
    </div>
    <div class="form-group">
      <label for="loaisp">Loại sản phầm:</label>
      <select name="idloaisp" id="idloaisp" class="form-control">
        <?php foreach ($caretoryProduct as $key => $value) {
        ?>
          <option value="<?= $value['id']; ?>"><?= $value['name'] ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="tinhtrang">Trạng thái:</label>
      <select id="tinhtrang" class="form-control" name="tinhtrang">
        <option value="1">Hiển thị</option>
        <option value="0">Không hiển thị</option>
      </select>
    </div>

    <button type="submit" class="btn btn-dark btn-block mb-4">Tạo</button>
  </form>
</div>