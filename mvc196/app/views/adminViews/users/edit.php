<div class="container">
  <h1 class="text-center">Cập nhật người dùng </h1>
  <form action="<?= BASE_URL . "user/update" . $user[0]['id'] ?>" method="post">
    <div class="form-group">
      <label for="name">Họ và tên:</label>
      <input type="text" class="form-control" name='name' id="name" placeholder="Name" value="<?= $user[0]['name'] ?>">
    </div>
    <div class="form-group">
      <label for="username">Tên đăng nhập:</label>
      <input type="text" class="form-control" name='username' id="username" placeholder="Username" value="<?= $user[0]['username'] ?>">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name='email' id="email" placeholder="Email" value="<?= $user[0]['email'] ?>">
    </div>
    <div class="form-group">
      <label for="address">Địa chỉ:</label>
      <input type="text" class="form-control" name='address' id="address" placeholder="Address" value="<?= $user[0]['address'] ?>">
    </div>
    <div class="form-group">
      <label for="phoneNumber">SĐT:</label>
      <input type="text" class="form-control" name='phoneNumber' id="phoneNumber" placeholder="Phone Number" value="<?= $user[0]['phone_number'] ?>">
    </div>
    <div class="form-group">
      <label for="role_id">Vai trò:</label>
      <select id="role_id" class="form-control" name="role_id">
        <?php foreach ($roles as $role) {
          if ($user[0]['role_id'] == $role['id']) {
            echo "<option value=" . $role['id'] . " selected>" . $role['name'] . "</option>";
          } else {
            echo "<option value=" . $role['id'] . ">" . $role['name'] . "</option>";
          }
        } ?>
      </select>
    </div>
    <button type="submit" class="btn btn-dark btn-block">Cập nhật</button>
  </form>
</div>