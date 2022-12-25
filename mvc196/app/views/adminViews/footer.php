<script type="text/javascript">
  CKEDITOR.replace('ckeditor');
  CKEDITOR.replace('ckeditor_product_add');
  CKEDITOR.replace('ckeditor_product_edit');
  CKEDITOR.replace('ckeditor_product_des');
  CKEDITOR.replace('ckeditor_product_edit_des');
  CKEDITOR.replace('ckeditor_payment_create_des');
  CKEDITOR.replace('ckeditor_payment_edit_des');
  CKEDITOR.replace('ckeditor_news_edit_des');
  CKEDITOR.replace('ckeditor_news_create_des');
  CKEDITOR.replace('ckeditor_role_des_create');
  CKEDITOR.replace('ckeditor_role_des_edit');
</script>
<script src="<?= BASE_URL . 'public/js/admin/admin.js' ?>" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {
    function chartStatistic30Days() {
      $.ajax({
        type: "POST",
        url: "http://localhost/PHP2020/mvc196/dashboard/getDataForChart",
        dataType: "JSON",
        success: function(response) {
          chart.setData(response);
        }
      });
    }
    chartStatistic30Days();
    var chart = new Morris.Area({
      element: 'myfirstchart',
      lineColors: ["#ffc36d", "#26deee", "#1ff016"],
      fillOpacity: 0.3,
      xkey: 'order_date',
      ykeys: ['order_quanlities', 'earnings', 'product_quanlities'],
      behaveLikeLine: true,
      hideHover: 'auto',
      parseTime: false,
      labels: ['số đơn hàng', 'thu nhập', 'số sản phẩm']
    });


  });
</script>
<script type="text/javascript">
  new Morris.Donut({
    element: 'statistic-chart-donus',
    resize: true,
    colors: [
      '#f0488b',
      '#ffc36d',
      '#80DEEA',
      '#e6762c',
      '#fa0a0a',
      '#2ae240',
      '#0d15d5',
      '#7ee91c',
      '#17f3b5',
      '#0d4d0d',
    ],
    //labelColor:"#cccccc", // text color
    //backgroundColor: '#333333', // border color
    data: [{
        label: "Sliders",
        value: <?= $statisticsAppDonut['sliders'] ?>,
      },
      {
        label: "Tin tức",
        value: <?= $statisticsAppDonut['news'] ?>,
      },
      {
        label: "Người dùng",
        value: <?= $statisticsAppDonut['users'] ?>,
      },
      {
        label: "Phương thức thanh toán",
        value: <?= $statisticsAppDonut['payments'] ?>,
      },
      {
        label: "Sản phẩm",
        value: <?= $statisticsAppDonut['products'] ?>,
      },
      {
        label: " Thương hiệu",
        value: <?= $statisticsAppDonut['brands'] ?>,
      },
      {
        label: "Loại sản phẩm",
        value: <?= $statisticsAppDonut['categories'] ?>,
      },
    ],
  });
</script>
</body>

</html>