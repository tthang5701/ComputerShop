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
				$query = "SELECT * FROM `products` LEFT JOIN (SELECT product_id FROM `order_detail`) as r 
							ON products.id = r.product_id
							WHERE product_id is not null
							GROUP BY id
							ORDER BY quantity DESC
							LIMIT 10";
				$query_run = mysqli_query($connection, $query);
				?>
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th> Mã sản phẩm </th>
							<th> Tên sản phẩm </th>
							<th> Giá </th>
							<th> Số lượng kho </th>
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
									<td class="right"><?php echo number_format($row['quantity']); ?></td>
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