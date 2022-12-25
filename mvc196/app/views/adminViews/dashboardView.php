<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?= BASE_URL . "dashboard/dashboard"; ?>">Xin chào:<?= $_SESSION['username']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Sản phẩm
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= BASE_URL . "product/create" ?>">Tạo sản phẩm mới</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?= BASE_URL . "product/list" ?>">Danh sách sản phẩm</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tin tức
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= BASE_URL . "news/create"; ?>">Tạo tin tức mới</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?= BASE_URL . "news/list"; ?>">Danh sách tin tức</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Đơn hàng
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= BASE_URL . 'order/list' ?>">Danh sách đơn hàng</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Thương hiệu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo BASE_URL . "brands/create" ?>">Tạo thương hiệu mới</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo BASE_URL . "brands/list" ?>">Danh sách thương hiệu</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Loại sản phẩm
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo BASE_URL . "Category/create" ?>">Tạo loại sản phẩm mới</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo BASE_URL . "Category/list" ?>">Danh sách loại sản phẩm</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Thanh toán
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo BASE_URL . "payment/create" ?>">Tạo phương thức thanh toán</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo BASE_URL . "payment/list" ?>">Danh sách phương thức thanh toán</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Sliders
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo BASE_URL . "slider/create" ?>">Tạo mới Slider</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo BASE_URL . "slider/list" ?>">Danh sách Sliders</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Người dùng
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= BASE_URL . "user/create" ?>">Tạo người dùng mới</a>
		  <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?= BASE_URL . "user/list" ?>">Danh sách người dùng</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Vai trò
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo BASE_URL . "role/create" ?>">Tạo vai trò mới</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo BASE_URL . "role/list" ?>">Danh sách các vai trò</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">

      <a href="<?= BASE_URL . "login/logOut" ?>" class='LogOutbtn'>Đăng xuất</a>
    </form>
  </div>
</nav>