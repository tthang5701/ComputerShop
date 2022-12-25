<div class="main">
  <div class="content">
    <div class="content_top">
      <div class="cartoption">
        <div class="cartpage">
          <h2 style="width: 100%;">Cập nhật thông tin cá nhân</h2>
          <?php if (session::get('message_success') != false) { ?>
            <div style="font-size: 20px;color:green;" id="message_sucess"><?= session::get('message_success') ?></div>
          <?php session::remove('message_success');
          } else { ?>
            <div style="font-size: 20px;color:red;" id="message_fail"><?= session::get('message_fail') ?></div>
          <?php session::remove('message_fail');
          } ?>
          <form action="<?= BASE_URL ?>profile/updateUser" method="POST" class="item-infor_user">
          <div>
              <input type="hidden" name="id" value="<?= $user[0]['id']; ?>">
              <div style="display:flex;justify-content:space-between;padding:20px 0;">
                <label for="name">Tên</label>
                <input type="text" name="name" value="<?= $user[0]['name'] ?>" style="width: 50%;padding:2px 5px;">
              </div>
              <div style="display:flex;justify-content:space-between;padding:20px 0;">
                <label for="email">Email</label>
                <input type="text" name="email" value="<?= $user[0]['email'] ?>" style="width: 50%;padding:2px 5px;">
              </div>
              <div style="display:flex;justify-content:space-between;padding:20px 0;">
                <label for="address">Địa chỉ</label>
                <input type="text" name="address" value="<?= $user[0]['address'] ?>" style="width: 50%;padding:2px 5px;">
              </div>
              <div style="display:flex;justify-content:space-between;padding:20px 0;">
                <label for="username">Tên tài khoản</label>
                <input type="text" name="username" value="<?= $user[0]['username'] ?>" style="width: 50%;padding:2px 5px;">
              </div>
              <div style="display:flex;justify-content:space-between;padding:20px 0;">
                <label for="phoneNumber">Số điện thoại</label>
                <input type="text" name="phoneNumber" value="<?= $user[0]['phone_number'] ?>" style="width: 50%;padding:2px 5px;">
              </div>
            </div>
            <div style="display: flex;justify-content:center;margin-top:10px;"><button type="submit" class="btn-update_profile" name="btnSubmit">Cập nhật</button></div>
          </form>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>