<div class="container">
  <h1 class="text-center mt-3">Cập nhật tin tức</h1>
  <?php foreach ($list_NewsById as $key => $value) { ?>
    <form method="post" action="<?= BASE_URL . "news/update/" . $value['id'] ?>" enctype="multipart/form-data">
      <div class="form-group">
        <label for="tentintuc">Tên tin tức:</label>
        <input type="text" value="<?php echo $value['name']; ?>" class="form-control" name='tentintuc' id="tentintuc">
      </div>
      <div class="form-group">
        <label for="matin">Mã tin tức:</label>
        <input type="text" value="<?php echo $value['code']; ?>" disabled class="form-control" id="matin" name="matin">
      </div>
      <div class="form-group">
        <label for="hinhanh">Hình ảnh:</label>
        <input type="file" class="form-control" id="hinhanh" name="hinhanh">
        <p><img src="<?= BASE_URL . "public/imgs/" . $value['image'] ?>"></p>
      </div>
      <div class="form-group">
        <label for="noidung">Nội dung:</label>
        <textarea name="noidung" rows="10" class="form-control" id="ckeditor_news_edit_des"><?php echo $value['content']; ?></textarea>
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