<div class="container">
  <h1 class="text-center my-4">Danh sách phương thức thanh toán</h1>
  <?php if (session::get('message_success') != false) { ?>
    <div style="font-size: 20px;color:green;" id="message_success"><?= session::get('message_success') ?></div>
  <?php session::remove('message_success');
  } else { ?>
    <div style="font-size: 20px;color:red;" id="message_fail"><?= session::get('message_fail') ?></div>
  <?php session::remove('message_fail');
  } ?>
  <table class="table table-hover">
    <thead class="thead-dark">
      <tr>
        <th class="text-center">#</th>
        <th class="text-center">Tên</th>
        <th class="text-center">Mô tả</th>
        <th class="text-center">Lựa chọn</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($payments as $index => $payment) { ?>
        <tr>
          <td><?= $index + 1 ?></td>
          <td><?= $payment['name']; ?></td>
          <td><?= $payment['description']; ?></td>
          <td class="d-flex justify-content-end"><a href="<?= BASE_URL . "payment/edit/" . $payment['id'] ?>" class="btn btn-primary btn-sm" style="margin-right: 10px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a href="<?= BASE_URL . "payment/delete/" . $payment['id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>