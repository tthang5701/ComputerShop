<div class="container">
	<h1 class="text-center my-4">Danh sách vai trò</h1>
	<?php if (session::get('message_success') != false) { ?>
		<div style="font-size: 20px;color:green;" id="message_success"><?= session::get('message_success') ?></div>
	<?php session::remove('message_success');
	} else { ?>
		<div style="font-size: 20px;color:red;" id="message_fail"><?= session::get('message_fail') ?></div>
	<?php session::remove('message_fail');
	} ?>
	<div class="row">
		<table class="table table-hover">
			<thead class="thead-dark">
				<tr>
					<th class="text-center" scope="col">#</th>
					<th class="text-center" scope="col">Tên</th>
					<th class="text-center" scope="col">Mô tả chi tiết</th>
					<th class="text-center" scope="col">Lựa chọn</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($roles as $index => $role) { ?>
					<tr>
						<td><?= $index + 1 ?></td>
						<td><?= $role['name']; ?></td>
						<td><?= $role['description']; ?></td>
						<td class="d-flex">
							<a href="<?= BASE_URL . "role/edit/" . $role['id'] ?>" class="btn btn-primary btn-sm" style="margin-right:10px;">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							<a href="<?= BASE_URL . "role/delete/" . $role['id'] ?>" class="btn btn-danger btn-sm">
							<i class="fa fa-trash" aria-hidden="true"></i></a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>