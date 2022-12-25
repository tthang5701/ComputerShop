<div class="container">
  <h1 class="text-center">Tạo vai trò</h1>
  <form action="<?= BASE_URL . "role/store" ?>" method="post">
    <div class="form-group">
      <label for="name">Tên:</label>
      <input type="text" class="form-control" name='name' id="name" placeholder="Name">
    </div>
    <div class="form-group">
      <label for="description">Mô tả chi tiết:</label>
      <textarea name="description" id="ckeditor_role_des_create" class="form-control" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-dark btn-block">Tạo</button>
  </form>
</div>