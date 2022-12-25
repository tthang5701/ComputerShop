<div class="container mt-4">
  <h1 class="text-center">Tạo mới phương thức thanh toán</h1>
  <form action="<?= BASE_URL . "payment/store" ?>" method="post">
    <div class="form-group">
      <label for="name">Tên:</label>
      <input type="name" class="form-control" name="name" id="name" placeholder="">
    </div>
    <div class="form-group">
      <label for="tieude">Mô tả:</label>
      <textarea class="form-control" id="ckeditor_payment_create_des" name="description" cols="40" rows="20"></textarea>
    </div>
    <button type="submit" class="btn btn-dark btn-block">Tạo</button>
  </form>
</div>