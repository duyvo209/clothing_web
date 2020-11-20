<?php 
	include("connect.php");

	if(isset($_POST['submit'])){
		$tensp = $_POST['tensp'];
		$soluong = $_POST['soluong'];
		$loai = $_POST['loai'];
		$gia = $_POST['gia'];
		$target_dir ='sanpham/';
		$target_file=$target_dir .basename($_FILES["fileToUpload"]["name"]);
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);

		$add = "INSERT INTO sanpham(name, amount, loai, price, picture) VALUES ('$tensp', '$soluong', '$loai', '$gia', '$target_file')";
		$connect->query($add);
		header("location: admin.php?view=products");

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
			font-size: 18px;
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
			background-color: #6c757d;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 450px;
			height: 55px;
			color: #fff;
			font-weight: 500;
			font-size: inherit;
			opacity: 0.9;
			font-size: 18px;
		}
		.cancel:hover{
			opacity: 1;
			outline: none;
		}
		.back{
			text-align: center;
			text-decoration: none;
			font-size: 18px;
			color: black;
		}
		.back:hover{
			text-decoration: none;
			color: black;
		}
	
		
	</style>
</head>
<body>
	<div class="login">
	<form class="form" method="POST" enctype="multipart/form-data" style="height: 800px;">
	<div class="full" style="margin-top: 30px;">
		<h1 style="text-align: center; margin-left: 20px">Thêm Sản Phẩm</h1>
		<p style="border: black 2px solid; width: 445px;"></p>
		<br>
		
			<label><b style="font-size: 20px"></b></label>
			<input class="password" type="text" placeholder="Tên sản phẩm" name="tensp" id="matkhau">

			<label><b style="font-size: 20px"></b></label>
			<input class="password" type="text" placeholder="Số lượng" name="soluong" id="matkhau">

			<label><b style="font-size: 20px"></b></label>
			<input class="password" type="text" placeholder="Loại" name="loai" id="matkhau">

			<label><b style="font-size: 20px"></b></label>
			<input class="password" type="text" placeholder="Giá" name="gia" id="matkhau">

			<label><b style="font-size: 20px"></b></label>
			<br>
			<input style="font-size: 16px" type="file" placeholder="Ảnh sản phẩm" visibility="hidden" name="fileToUpload" id="matkhau">
			
			<br><br>
			<button class="signin" type="submit" name="submit">Thêm sản phẩm</button>	
			<button class="cancel" type="reset">Làm mới</button>
			<p style="text-align: center; margin-left: 40px; margin-top: 10px "><a class="back" href="admin.php?view=products">Quay lại</a></p>
	
	</div>

	</form>
	</div>
</body>
</html>




 		

		