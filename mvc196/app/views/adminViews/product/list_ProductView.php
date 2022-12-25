<div class="container">
  <h1 class="text-center my-4">Danh sách sản phẩm</h1>
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
          <th class="text-center" scope="col">Thương hiệu</th>
          <th class="text-center" scope="col">Tên</th>
          <th class="text-center" scope="col">Ảnh</th>
          <th class="text-center" scope="col">Giá</th>
          <th class="text-center" scope="col">Số lượng có</th>
          <th class="text-center" scope="col">Loại sản phẩm</th>
          <th class="text-center" scope="col" style="width:10%;">Trạng thái</th>
          <th class="text-center" scope="col">Lựa chọn</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($list_Product as $index => $value) { ?>
          <tr>
            <td><?= $index + 1 ?></td>
            <td><?= $value['brand_name']; ?></td>
            <td><?= $value['name']; ?></td>
            <td><img src="<?= BASE_URL . 'public/imgs/' . $value['image']; ?>" style="width:40%;"></td>
            <td><?= number_format($value['price']) . 'VND' ?></td>
            <td><?= $value['quantity']; ?></td>
            <td><?= $value['category_name']; ?></td>
            <?php if ($value['status'] == 1) { ?>
              <td>Hiển thị</td>
            <?php } else { ?>
              <td>Không hiển thị</td>
            <?php } ?>
            <td class="d-flex"><a href="<?= BASE_URL . "product/edit/" . $value['id'] ?>" class="btn btn-primary btn-sm" style="margin-right:10px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a href="<?= BASE_URL . "product/delete/" . $value['id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a></td>

          </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>
  <div class="row">
    <nav style="width: 100%;">
      <ul class="pagination justify-content-center">
        <?php for ($num = 1; $num <= $number_page[0]; $num++) { ?>
          <?php if ($num != $number_page[2]) { ?>
            <li class="page-item"><a class="page-link" href="<?= BASE_URL . "product/" ?>list/<?= $number_page[1] ?>/<?= $num ?>"><?= $num ?></a></li>
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
</div>