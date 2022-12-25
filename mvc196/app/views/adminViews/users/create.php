<div class="container">
  <h1 class="text-center">Tạo người dùng mới</h1>
  <form action="<?= BASE_URL . "user/store" ?>" method="post">
    <div class="form-group">
      <label for="name">Họ và tên:</label>
      <input type="text" class="form-control" name='name' id="name" placeholder="Họ và tên">
    </div>
    <div class="form-group">
      <label for="username">Tên đăng nhập:</label>
      <input type="text" class="form-control" name='username' id="username" placeholder="Tên đăng nhập">
    </div>
    <div class="form-group">
      <label for="password">Mật khẩu:</label>
      <input type="password" class="form-control" name='password' id="password" placeholder="Mật khẩu">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name='email' id="email" placeholder="Email">
    </div>
    <div class="form-group">
      <label for="address">Địa chỉ:</label>
      <input type="text" class="form-control" name='address' id="address" placeholder="Địa chỉ">
    </div>
    <div class="form-group">
      <label for="phoneNumber">SĐT:</label>
      <input type="text" class="form-control" name='phoneNumber' id="phoneNumber" placeholder="Số điện thoại">
    </div>
    <div class="form-group">
      <label for="role_id">Vai trò:</label>
      <select id="role_id" class="form-control" name="role_id">
        <?php foreach ($roles as $role) { ?>
          <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
        <?php } ?>
      </select>
    </div>
    <button type="submit" class="btn btn-dark btn-block">Tạo</button>
  </form>
</div>