<div class="container">
  <h1 class="text-center my-4">Danh sách loại sản phẩm</h1>
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
        <th scope="col">#</th>
        <th scope="col">Tên</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Lựa chọn</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($lis_caretoryProduct as $key => $value) { ?>
        <tr>
          <td><?= $key + 1; ?></td>
          <td><?= $value['name']; ?></td>
          <?php if ($value['status'] == 1) { ?>
            <td>Hiển thị</td>
          <?php } else { ?>
            <td>Không hiển thị</td>
          <?php } ?>
          <td><a href="<?= BASE_URL . "Category/edit/" . $value['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a href="<?= BASE_URL . "Category/delete/" . $value['id'] ?>" class="btn btn-danger ml-2 btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <?php for ($num = 1; $num <= $number_page[0]; $num++) { ?>
        <?php if ($num != $number_page[2]) { ?>
          <li class="page-item"><a class="page-link" href="<?= BASE_URL . "Category/" ?>list/<?= $number_page[1] ?>/<?= $num ?>"><?= $num ?></a></li>
        <?php } else { ?>
          <li class="page-item disabled">
            <strong class="current-page page-link bg-dark text-white"><?= $num ?></strong>
          </li>
        <?php } ?>
      <?php
      } ?>
    </ul>
  </nav>
</div>