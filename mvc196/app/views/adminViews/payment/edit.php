<div class="container mt-4">
  <h1 class="text-center">Cập nhật phương thức thanh toán</h1>
  <form action="<?= BASE_URL . "payment/update/" . $payment[0]['id'] ?>" method="post">
    <div class="form-group">
      <label for="name">Tên:</label>
      <input type="name" class="form-control" name='name' id="name" placeholder="Name" value="<?= $payment[0]['name'] ?>">
    </div>
    <div class="form-group">
      <label for="tieude">Mô tả:</label>
      <textarea class="form-control" id="ckeditor_payment_edit_des" name="description" cols="40" rows="20"><?= $payment[0]['description'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-dark btn-block">Cập nhật</button>
  </form>
</div>