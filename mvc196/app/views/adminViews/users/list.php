<div class="container">
  <h1 class="text-center my-4">Danh sách người dùng</h1>
  <table class="table table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Họ và tên</th>
        <th scope="col">Tên đăng nhập</th>
        <th scope="col">Email</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">SĐT</th>
        <th scope="col">Vai trò</th>
        <th scope="col">Lựa chọn</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $key => $user) { ?>
        <tr>
          <td><?= $key + 1; ?></td>
          <td><?= $user['name'] ?></td>
          <td><?= $user['username'] ?></td>
          <td><?= $user['email'] ?></td>
          <td><?= $user['address'] ?></td>
          <td><?= $user['phone_number'] ?></td>
          <td>
			<?php foreach ($roles as $role) {
				if($role['id'] == $user['role_id']){ ?>
          			<?= $role['name'] ?>
        	<?php } } ?></td>
          <td><a href="<?= BASE_URL . "user/edit/" . $user['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a href="<?= BASE_URL . "user/delete/" . $user['id'] ?>" class="btn btn-danger ml-2 btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  
</div>