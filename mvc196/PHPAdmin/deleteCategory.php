<?php
include('security.php');

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

	$query = "UPDATE categories SET status = 0 WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);
 
	if($query_run)
	{
		$_SESSION['status'] = "Ẩn thành công";
		$_SESSION['status_code'] = "success";
		header('Location: category.php'); 
	}
	else
	{
		$_SESSION['status'] = "Đã xảy ra lỗi";
		$_SESSION['status_code'] = "danger";
		header('Location: category.php'); 
	}

}
