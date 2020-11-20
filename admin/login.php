<?php 
	include("connect.php");
	session_start();

	// if(isset($_SESSION['tendangnhapad'])){
	//  header('location: admin.php');
	// }

	if(isset($_POST['submitad'])){
		$tendangnhapad = $_POST['tendangnhapad'];
		$matkhauad = $_POST['matkhauad'];

		// $signup = "INSERT INTO admin (tendangnhap, matkhau) VALUES ('admin','admin')";
		// $connect->query($signup);

		$login = "SELECT *FROM admin WHERE tendangnhapad='$tendangnhapad' AND matkhauad='$matkhauad'";
		$result = $connect->query($login);
		$num = mysqli_num_rows($result);
	    $row_dangnhap = mysqli_fetch_assoc($result);

	    	if($num > 0){
	    		$_SESSION['tendangnhapad'] = $row_dangnhap['tendangnhapad'];
	    		$_SESSION['matkhauad'] = $row_dangnhap['matkhauad'];
	    		header("location: admin.php");
	    	}else{
	     			if($tendangnhapad == "" || $matkhauad == ""){
				    	echo "<script>
						alert ('Nhập tài khoản hoặc mật khẩu')
						</script>
						";
		           }else{
						
			     		echo "<script>
						alert ('Sai tài khoản hoặc mật khẩu')
						</script>
						";
		             }
				}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<style>
		.login{
			justify-content: center;
			display: flex;
			font-family: 'Quicksand', sans-serif;
		}
		.full{
			width: 450px;
			padding: 14px 20px;
			margin: 8px 0;
			display: inline-block;
			box-sizing: border-box;
			font-size: inherit;
			font-family: 'Quicksand', sans-serif;

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
    		font-family: 'Quicksand', sans-serif;

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
			font-family: 'Quicksand', sans-serif;
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
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
   <title>LOGIN ADMIN</title>
</head>
<body>
	<div class="login">
	<form class="form" method="POST" enctype="multipart/form-data" style="height: 800px;">
	<div class="full" style="margin-top: 30px;">
		<h1 style="text-align: center; margin-left: 20px">ADMIN</h1>
		<p style="border: black 2px solid; width: 445px;"></p>
		<br>
			<label><b style="font-size: 20px">Tài khoản</b></label>
			<input class="text" type="text" placeholder="Nhập tài khoản" name="tendangnhapad" id="tendangnhap">
			<div class="error_form" id="tendangnhap_error"></div>
			<label><b style="font-size: 20px">Mật khẩu</b></label>
			<input class="password" type="password" placeholder="Nhập mật khẩu" name="matkhauad" id="matkhau">
			<div class="error_form" id="matkhau_error"></div>
			<br><br>
			<button class="signin" type="submit" name="submitad">ĐĂNG NHẬP</button>	
			<p style="text-align: center; font-size: 18px; margin-left: 20px;">Vui lòng đăng nhập để tiếp tục</p>
	</div>
	</form>
	</div>
</body>
</html>
