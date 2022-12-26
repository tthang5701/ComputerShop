<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<?php
		if (isset($_SESSION["status"]) && $_SESSION["status"] != '') {
		?>
			<div class="alert alert-<?= $_SESSION['status_code'] ?>">
				<?php
				echo $_SESSION['status'];
				unset($_SESSION['status']);
				?>
			</div>
		<?php } ?>
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

		<div class="card-body">

			<div class="table-responsive">
				<?php
				$query = "SELECT * FROM `products` JOIN (SELECT product_id, count(product_id) as total 
							FROM `order_detail` GROUP BY product_id ORDER BY total DESC LIMIT 10) as r 
							WHERE products.id = r.product_id";
				$query_run = mysqli_query($connection, $query);
				?>
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th> Mã sản phẩm </th>
							<th> Tên sản phẩm </th>
							<th> Giá </th>
							<th> Số lượng bán </th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (mysqli_num_rows($query_run) > 0) {
							while ($row = mysqli_fetch_assoc($query_run)) {
						?>
								<tr>
									<td><?php echo $row['code']; ?></td>
									<td><?php echo $row['name']; ?></td>
									<td class="right"><?php echo number_format($row['price']); ?></td>
									<td class="right"><?php echo number_format($row['total']); ?></td>
								</tr>
						<?php
							}
						} else {
							echo "<tr><td colspan='5' style='text-align: center;'>Không có bản ghi</td><tr>";
						}
						?>
					</tbody>
				</table>

			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>