<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = "database_TShirt";
	$connect = mysqli_connect($servername, $username, $password, $database);
	$connect->set_charset("utf8");

	$sql = "CREATE DATABASE database_TShirt";
    $connect->query($sql);
    $connect->query("USE database_TShirt");
?>