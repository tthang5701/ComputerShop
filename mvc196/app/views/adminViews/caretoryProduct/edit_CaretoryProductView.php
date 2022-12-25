<div class="container">
  <h1 class="text-center mt-3">Cập nhật loại sản phẩm</h1>
  <?php foreach ($lis_caretoryProduct as $key => $value) { ?>
    <form method="post" action="<?= BASE_URL . "Category/update/" . $value['id'] ?>">
      <div class="form-group">
        <label for="tenloaisp">Tên loại sản phẩm:</label>
        <input type="text" value="<?= $value['name']; ?>" class="form-control" name='tenloaisp' id="tenloaisp">
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
      <button type="submit" class="btn btn-dark btn-block mb-3">Cập nhật</button>
    </form>
  <?php } ?>
</div>