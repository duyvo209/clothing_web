<?php 
	include ("connect.php");

	if(isset($_POST['submit'])){
	$tendangnhap = $_POST['tendangnhap'];
	$matkhau = $_POST['matkhau'];
	
	$signup = "INSERT INTO admin (tendangnhap, matkhau) VALUES ('$tendangnhap','$matkhau')";
	$connect->query($signup);
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<style>
		.login{
			justify-content: center;
			display: flex;
		}
		.full{
			width: 450px;
			padding: 14px 20px;
			margin: 8px 0;
			display: inline-block;
			box-sizing: border-box;
			font-size: inherit;

		}
		.text, .password{
			width: 450px;
			padding: 14px 20px;
			margin: 8px 0;
			display: inline-block;
			box-sizing: border-box;
			font-size: inherit;
			border: #ededed 2px solid;
    		background: #ededed;
    		color: #252a2b;

		}
		.text:hover, .password:hover{
			background: #fff;
			border-color: black; 
			transition: ease 1.5s;
		}

		.text:focus{
			outline: none;
			border-color: black;
		}
		.password:focus{
			outline: none;
			border-color: black;
		}

		.signin{
			color: #fff;
			margin:8px 0;
			border: none;
			cursor: pointer; 
			font-size: inherit;
			width: 450px;
			height: 55px;	
			font-weight: 500;	
			position: relative;
			z-index: 1;
			transition: all 0.4s ease;
		}
		.signin:before{
			content: "";
			position: absolute;
			z-index: -1;
			background-color: #000;
			right: 0;
			top: 0;
			height: 100%;
			width: 100%;
			transition: all 0.4s ease;

		}
		.signin:hover:before{
			width: 0;
		}
		.signin:hover{
			color: #000;
			outline: none;
		}
		.cancel{
			background-color: #f44336;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 450px;
			height: 55px;
			color: #ffffff;
			font-weight: 500;
			font-size: inherit;
			opacity: 0.9;
		}
		.cancel:hover{
			opacity: 1;
			outline: none;
		}

		
		
	</style>
</head>
<body>
	<div class="login">
	<form class="form" method="POST" enctype="multipart/form-data" style="height: 800px;">
	<div class="full" style="margin-top: 30px;">
		<h1 style="font-family: Calibri;text-align: center;">ADMIN</h1>
		<p style="border: black 2px solid; width: 445px;"></p>
		<br>
			<label><b style="font-family: Calibri; font-size: 20px">Tài khoản</b></label>
			<input class="text" type="text" placeholder="Nhập tài khoản" name="tendangnhap" id="tendangnhap">
			<div class="error_form" id="tendangnhap_error"></div>
			<label><b style="font-family: Calibri; font-size: 20px">Mật khẩu</b></label>
			<input class="password" type="password" placeholder="Nhập mật khẩu" name="matkhau" id="matkhau">
			<div class="error_form" id="matkhau_error"></div>
			<br><br>
			<button class="signin" type="submit" name="submit">ĐĂNG NHẬP</button>	
			<a style="text-decoration: none" href="project.php"><button class="cancel" type="button">HỦY BỎ</button></a>			
	</div>
	</form>
	</div>
</body>
</html>