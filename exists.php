<?php
	include ("connect.php");

	$ten = $_GET['tendangnhap'];
	$select = "SELECT tendangnhap FROM thanhvien WHERE tendangnhap = '$ten'";
	$result = $connect->query($select);
	$count = $result->num_rows;

	if ($count === 0){
		echo "";
	}else{		
		echo "Tên tài khoản đã được sử dụng. Hãy thử tên khác";
	}
 ?>