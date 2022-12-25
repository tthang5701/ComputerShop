<?php
include('security.php');

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

	$query = "UPDATE products SET status = 0 WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
 
	if($query_run)
	{
		$_SESSION['status'] = "Cập nhật trạng thái thành công";
		$_SESSION['status_code'] = "success";
		header('Location: product.php'); 
	}
	else
	{
		$_SESSION['status'] = "Đã xảy ra lỗi";
		$_SESSION['status_code'] = "danger";
		header('Location: product.php'); 
	}

}
