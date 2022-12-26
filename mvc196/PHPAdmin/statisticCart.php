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
			<h6 class="m-0 font-weight-bold text-primary">Đơn hàng
			</h6>
		</div>

		<div class="card-body">

			<div class="table-responsive">
				<?php
				$query = "SELECT created_date, status, count(id) as num, sum(total) as total FROM orders
							GROUP BY created_date, status
							ORDER BY created_date DESC";
				$query_run = mysqli_query($connection, $query);
				?>
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th> Ngày </th>
							<th> Trạng thái </th>
							<th> Số đơn hàng </th>
							<th> Tổng tiền </th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (mysqli_num_rows($query_run) > 0) {
							while ($row = mysqli_fetch_assoc($query_run)) {
								$status = $row['status']; 
											
								if($status == 0){
									$content = 'Chờ xử lý';
								} elseif($status == 1){
									$content = 'Đang vận chuyển';
								} elseif($status == 2){
									$content = 'Đã giao thành công';
								} elseif($status == 5){
									$content = 'Đã hủy';
								}
						?>
								<tr>
									<td><?php echo date("d/m/Y", strtotime($row['created_date'])); ?></td>
									<td><?php echo $content; ?></td>
									<td><?php echo $row['num']; ?></td>
									<td class="right">
										<?php 
											if($status != 5)
												echo number_format($row['total']); 
										?>
									</td>
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