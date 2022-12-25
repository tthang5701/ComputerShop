<div class="container">
  <h1 class="text-center">Cập nhật vai trò</h1>
  <form action="<?= BASE_URL . "role/update/" . $role[0]['id'] ?>" method="post">
    <div class="form-group">
      <label for="name">Tên:</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?= $role[0]['name'] ?>">
    </div>
    <div class="form-group">
      <label for="description">Mô tả chi tiết:</label>
      <textarea name="description" id="ckeditor_role_des_edit" class="form-control" rows="10"><?= $role[0]['description'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-dark btn-block">Cập nhật</button>
  </form>
</div>