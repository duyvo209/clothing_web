<?php 
	include("connect.php");
	if(!isset($_SESSION)){
		session_start();
	}
	$idkh = $_SESSION['idkh'];
	if(isset($_POST['id']) && isset($_POST['number'])){
		$number = $_POST['number'];
		$id = $_POST['id'];
		$update= "UPDATE giohang SET amount = $number WHERE id = $id AND idkh=$idkh";
		$connect->query($update);
	}
 ?>