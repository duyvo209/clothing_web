<?php 
	include("connect.php");
	if(isset($_POST['status']) && isset($_POST['id'])){
		$status = $_POST['status'];
		$id = $_POST['id'];
		$sql_status = "UPDATE donhang SET trangthai = '$status' WHERE id='$id'";
		$connect->query($sql_status);
	}
 ?>