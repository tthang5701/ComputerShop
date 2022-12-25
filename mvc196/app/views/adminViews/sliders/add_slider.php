<div class="container">
  <h1 class="text-center">Tạo slider mới</h1>
  <form action="<?= BASE_URL . "slider/store" ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="tieude">Tiêu đề:</label>
      <input type="tieude" class="form-control" name='tieude' id="tieude">
    </div>
    <div class="form-group">
      <label for="hinhanh">Hình ảnh:</label>
      <input type="file" class="form-control" name='hinhanh' id="hinhanh">
    </div>
    <div class="form-group">
      <label for="trangthai">Trạng thái:</label>
      <select id="trangthai" class="form-control" name="trangthai">
        <option value="1">Hiển thị</option>
        <option value="0">Không hiển thị</option>
      </select>
    </div>
    <button type="submit" class="btn btn-dark btn-block">Tạo</button>
  </form>
</div>