<div class="container">
  <h1 class="text-center mt-3">Cập nhật slider</h1>
  <?php foreach ($list_NewsById as $key => $value) { ?>
    <form method="post" action="<?= BASE_URL . "slider/update/" . $value['id'] ?>" enctype="multipart/form-data">
      <div class="form-group">
        <label for="tieude">Tiêu đề:</label>
        <input type="tieude" class="form-control" name='tieude' id="tieude" value="<?= $value['title'] ?>">
      </div>
      <div class="form-group">
        <label for="hinhanh">Hình Ảnh:</label>
        <input type="file" class="form-control" id="hinhanh" name="hinhanh" value="<?= $value['image'] ?>">
        <p><img src="<?= BASE_URL . "public/imgs/" . $value['image'] ?>"></p>
      </div>
      <div class="form-group">
        <label for="trangthai">Trạng thái:</label>
        <select id="trangthai" class="form-control" name="trangthai">
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
      <button type="submit" class="btn btn-dark btn-block mb-3">Cập nhật</button>
    </form>
  <?php } ?>
</div>