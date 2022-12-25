<!DOCTYPE HTML>
<html>

<head>
  <title>Cửa hàng thông minh</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="<?php echo BASE_URL ?>public/css/style.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo BASE_URL ?>public/css/flexslider.css" rel="stylesheet" type="text/css" />
  <link href="<?= BASE_URL . 'public/css/menu.css' ?>" rel="stylesheet" type="text/css" />
  <script src="<?= BASE_URL ?>public/js/jquery.min.js" type="text/javascript"></script>
  <script src="<?= BASE_URL ?>public/js/script.js" type="text/javascript"></script>
  <script type="text/javascript" src="<?= BASE_URL . 'public/js/move-top.js' ?>"></script>
  <script type="text/javascript" src="<?= BASE_URL ?>public/js/easing.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="<?= BASE_URL ?>public/css/customUser.css" rel="stylesheet" type="text/css" />
  <style>
    .product_quantity p,
    .product_price p {
      margin-top: 100px;
    }

    .product_quantity p:first-child,
    .product_price p:first-child {
      margin-top: 0;
    }

    .searchButtonHeader {
      border: none;
      cursor: pointer;
      color: #fff;
      font-size: 12px;
      padding: 10px 15px;
      height: 36px;
      margin: 0;
      background: -webkit-gradient(linear,
          left top,
          left bottom,
          from(#70389c),
          to(#602d8d));
      background: -moz-linear-gradient(top, #70389c, #602d8d);
      background: -o-linear-gradient(top, #70389c, #602d8d);
      background: -ms-linear-gradient(top, #70389c, #602d8d);
      -webkit-transition: all 0.9s;
      -moz-transition: all 0.9s;
      -o-transition: all 0.9s;
      -ms-transition: all 0.9s;
      transition: all 0.9s;
      position: absolute;
      right: 0;
      top: 0;
    }
  </style>
</head>

<body>
  <div class="wrap">
    <div class="header">
      <div class="header_top">
        <div class="logo">
          <a href="<?php echo BASE_URL; ?>home/index"><img src="<?= BASE_URL ?>public/imgs/logo.png" alt="" /></a>
        </div>
        <div class="header_top_right">
          <div class="search_box">
            <form action="<?= BASE_URL . 'product/searchProduct' ?>" method="POST">
              <input type="text" name="textSearch" placeholder="Search for Products" style="width: 100%;">
              <button type="submit" name="btnSubmitSearch" class="searchButtonHeader">Tìm</button>
            </form>
          </div>
          <div class="shopping_cart">
            <div class="cart">
              <?php
              $URL = LOGIN_URL_DEFAULT;
              if ($logged_in == true)
                $URL = BASE_URL . "cart/index/" . $user_id
              ?>
              <a href="<?= $URL ?>" title="View my shopping cart" rel="nofollow">
                <strong class="opencart"> </strong>
                <span class="cart_title">Cart</span>
                <?php if (isset($numInCart)) $numInCart;
                else $numInCart = 0;  ?>
                <span class="no_product">(<?= $numInCart ?>)</span>
              </a>
            </div>
          </div>
          <div class="login">
            <?php if ($logged_in == true) { ?>
              <span><a href="<?= BASE_URL . "/login/logOut" ?>"><i class="fa fa-sign-out" aria-hidden="true" style="font-size: 30px;"></i>
                </a></span>
            <?php } else { ?>
              <span><a href="<?= LOGIN_URL_DEFAULT; ?>"><img src="<?= BASE_URL ?>public/imgs/login.png" title="login" /></a></span>
            <?php } ?>
          </div>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="h_menu">
        <a id="touch-menu" class="mobile-menu" href="#">Danh mục</a>
        <nav>
          <ul class="menu list-unstyled">
            <li><a href="<?php echo BASE_URL; ?>home/index">Trang chủ</a></li>
            <li class="activate"><a href="<?php echo BASE_URL; ?>product/index">Sản phẩm</a>
              <ul class="sub-menu list-unstyled">
                <div class="nag-mother-list">
                  <div class="navg-drop-main">
                    <?php foreach ($header_data_array as $key => $value) { ?>
                      <div class="nav-drop" style="width: 30%;">
                        <li><a class="link-ProductType" href="<?= BASE_URL . "product/getByCategory/" . $value['id']; ?>"><?= $value['name'] ?></a></li>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </ul>
            </li>
            <li><a href="<?php echo BASE_URL . "brands/index/1" ?>">Thương hiệu</a>
              <ul class="sub-menu list-unstyled">
                <div class="nag-mother-list">
                  <div class="navg-drop-main">
                    <?php foreach ($HomeBrands_array as $key => $value) { ?>
                      <div class="nav-drop" style="width: 30%;">
                        <li><a class="link-ProductType" href="<?= BASE_URL . "brands/index/" . $value['id']; ?>"><?= $value['name'] ?></a></li>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </ul>
            </li>
            <li><a href="<?php echo BASE_URL . "news/index" ?>">Tin tức</a></li>
            <?php
            $URL = LOGIN_URL_DEFAULT;
            $UrlProfile = LOGIN_URL_DEFAULT;
            if ($logged_in == true) {
              $UrlProfile = BASE_URL . "profile/index";
              $URL = BASE_URL . "cart/index/" . $user_id;
            }
            ?>
            <li><a href="<?= $URL ?>">Giỏ hàng</a></li>
            <li><a href="<?= $UrlProfile  ?>">Thông tin cá nhân</a></li>
            <div class="clear"> </div>
          </ul>
        </nav>

      </div>
