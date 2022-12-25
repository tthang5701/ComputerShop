<div class="main">
	<div class="content">
		<div class="login_panel">
			<h3>Đã có tài khoản</h3>
			<p>Đăng nhập theo thông tin dưới đây</p>
			<form action="<?= BASE_URL . "login/checkLogin" ?>" method="post" id="member">
				<input name="username" type="text" class="field" placeholder="Nhập tên đăng nhập">
				<input name="password" type="password" class="field" placeholder="Nhập mật khẩu">
				<?php if (session::get('login_status') != false) { ?>
					<div><span style="font-size:14px;color:red;"><?= session::get('login_status') ?></span></div>
				<?php session::remove('login_status');
				} ?>
				<div class="buttons">
					<div><button class="grey" type="submit">Đăng nhập</button></div>
				</div>
			</form>

		</div>
		<div class="register_account">
			<h3>Đăng ký tài khoản mới</h3>
			<form method="POST" action="<?= BASE_URL . 'login/register' ?>">
				<table>
					<tbody>
						<tr>
							<td>
								<div><input name="name" type="text" placeholder="Nhập họ và tên"></div>
								<div><input name="email" type="text" placeholder="Nhập email"></div>
								<div><input name="password" type="text" placeholder="Nhập mật khẩu"></div>
							</td>
							<td>
								<div><input name="username" type="text" placeholder="Nhập tên đăng nhập"></div>
								<div>
									<input name="address" type="text" placeholder="Nhập địa chỉ">
								</div>
								<input name="phoneNumber" type="text" class="number" style="width: 94.5%;" placeholder="Nhập số điện thoại">
							</td>
						</tr>
					</tbody>
				</table>
				<div class="search">
					<div><button class="grey" type="submit">Tạo tài khoản mới</button></div>
				</div>
				<?php if (session::get('message_success') != false) { ?>
					<div><span style="font-size:14px;color:green;"><?= session::get('message_success') ?></span></div>
				<?php session::remove('message_success');
				} else { ?>
					<div><span style="font-size:14px;color:red;"><?= session::get('message_fail') ?></span></div>
				<?php session::remove('message_fail'); } ?>
				<div class="clear"></div>
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>