<div class="container">
  <h1 class="text-center">Tạo tin tức</h1>
  <form action="<?= BASE_URL . "news/store" ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="tentintuc">Tên tin tức:</label>
      <input type="text" class="form-control" name='tentintuc' id="tentintuc" placeholder="Tên tin tức">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mã tin tức:</label>
      <input type="text" class="form-control" id="exampleInputPassword1" name="matin" placeholder="Mã tin tức">
    </div>
    <div class="form-group">
      <label for="hinhanh">Hình ảnh:</label>
      <input type="file" class="form-control" name='hinhanh' id="hinhanh" placeholder="Hình ảnh">
    </div>
    <div class="form-group">
      <label for="noidung">Nội dung:</label>
      <textarea class="form-control" id="ckeditor_news_create_des" name="noidung" cols="40" rows="20"></textarea>
    </div>
    <div class="form-group">
      <label for="tinhtrang">Trạng thái:</label>
      <select id="tinhtrang" class="form-control" name="tinhtrang">
        <option value="1">Hiển thị</option>
        <option value="0">Không hiển thị</option>
      </select>
    </div>
    <button type="submit" class="btn btn-dark btn-block">Tạo</button>
  </form>
</div>