<div class="footer">
  <div class="wrapper">
    <div class="section group">
      <div class="col_1_of_4 span_1_of_4">
        <h4>Thông tin</h4>
        <ul>
          <?php if (isset($user_id)) { ?>
            <li><a href="<?= BASE_URL . 'order/orderTracking/' . $user_id ?>">Kiểm tra đơn hàng</a></li>
          <?php } ?>
          <li><a href="<?= LOGIN_ADMIN_PAGE ?>">Trang quản trị</a></li>
        </ul>
      </div>
      <div class="col_1_of_4 span_1_of_4">
        <h4>Tài khoản</h4>
        <ul>
          <?php if ($logged_in == false) { ?>
            <li><a href="<?= BASE_URL ?>login/index">Đăng nhập</a></li>
          <?php } else { ?>
            <li><a href="<?= BASE_URL ?>login/logOut">Đăng xuất</a></li>
          <?php } ?>
          <?php
          $URL = LOGIN_URL_DEFAULT;
          if ($logged_in == true)
            $URL = BASE_URL . "cart/index/" . $user_id
          ?>
          <li><a href="<?= $URL ?>">Xem giỏ hàng</a></li>
          
        </ul>
      </div>
      <div class="col_1_of_4 span_1_of_4">
        <h4>Liên hệ</h4>
        <ul>
          <li><span>+91-123-456789</span></li>
          <li><span>+00-123-000000</span></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var defaults = {
      containerID: 'toTop', // fading element id
      containerHoverID: 'toTopHover', // fading element hover id
      scrollSpeed: 1200,
      easingType: 'linear'
    };

    $().UItoTop({
      easingType: 'easeOutQuart'
    });
    $("#message_sucess").delay(900).hide(0);
    $("#message_fail").delay(900).hide(0);
    $('#message_fullstock').delay(900).hide(0);

  });
</script>
<a id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
<script defer src="<?= BASE_URL ?>public/js/jquery.flexslider.js"></script>
<script type="text/javascript">
  $(function() {
    SyntaxHighlighter.all();
  });
  $(window).load(function() {
    $('.flexslider').flexslider({
      animation: "slide",
      start: function(slider) {
        $('body').removeClass('loading');
      }
    });
  });
</script>
<script src="<?= BASE_URL ?>public/js/menu.js"></script>
</body>

</html>