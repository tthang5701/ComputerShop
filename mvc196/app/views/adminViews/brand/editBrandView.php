<div class="container">
  <h1 class="text-center mt-3">Cập nhật thương hiệu</h1>
  <?php foreach ($list_Brands as $key => $value) { ?>
    <form method="post" action="<?= BASE_URL . "brands/update/" . $value['id'] ?>">
      <div class="form-group">
        <label for="tenhieusp">Tên thương hiệu:</label>
        <input type="text" value="<?php echo $value['name']; ?>" class="form-control" name='tenhieusp' id="tenhieusp">
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