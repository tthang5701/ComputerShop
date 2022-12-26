<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Sản phẩm
				<a href="statistic.php">
					<button type="button" class="btn btn-primary" style="float: right">
						Sản phẩm tồn kho
					</button>
				</a>
				<a href="statisticBestSell.php">
					<button type="button" class="btn btn-primary" style="float: right; margin-right: 10px">
						Sản phẩm bán chạy
					</button>
				</a>
			</h6>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>