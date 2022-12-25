<div class="container">
  <h1 class="text-center mt-4">Tạo thương hiệu</h1>
  <form action="<?= BASE_URL . "brands/insert" ?>" method="post">
    <div class="form-group">
      <label for="tenhieusp">Tên thương hiệu:</label>
      <input type="text" class="form-control" name='tenhieusp' id="tenhieusp">
    </div>
    <div class="form-group">
      <div class="form-group">
        <label for="tinhtrang">Trạng thái:</label>
        <select id="tinhtrang" class="form-control" name="tinhtrang">
          <option value="1">Hiển thị</option>
          <option value="0">Không hiển thị</option>
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-dark btn-block">Tạo</button>
  </form>
</div>