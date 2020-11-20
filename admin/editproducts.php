<?php
	include("connect.php");
	// session_start();

	if(isset($_POST['submit_update'])){
		$idupdate = $_SESSION['id'];
		$idsp = $_POST['idsp'];
		$tensp = $_POST['tensp'];
		$soluong = $_POST['soluong'];
		$loai = $_POST['loai'];
		$gia = $_POST['gia'];
		$target_dir ='sanpham/';
		$target_file=$target_dir .basename($_FILES["fileToUpload"]["name"]);
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);

		$update = "UPDATE sanpham SET id='$idsp', name='$tensp', amount='$soluong', loai='$loai', price='$gia', picture='$target_file' WHERE id = $idupdate";
		$connect->query($update);
		header("location: admin.php?view=products");
	}

	if(isset($_GET['update1'])){

		$edit = $_GET['update1'];
		$select = "SELECT *FROM sanpham WHERE id=$edit";
		$result = $connect->query($select);
		$row = $result->fetch_assoc();

		$_SESSION['id'] = $row['id'];
		$_SESSION['name'] = $row['name'];
		$_SESSION['amount'] = $row['amount'];
		$_SESSION['loai'] = $row['loai'];
		$_SESSION['price'] = $row['price'];
		$_SESSION['picture'] = $row['picture'];
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
			font-size: 18px;
			opacity: 0.9;
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
		<h1 style="text-align: center; margin-left: 30px">Sửa Sản Phẩm</h1>
		<p style="border: black 2px solid; width: 445px;"></p>
		<br>
			<label><b style="font-size: 20px"></b></label>
			<input class="text" type="text" value="<?php echo $_SESSION['id']?>" name="idsp" id="tendangnhap">
			
			<label><b style="font-size: 20px"></b></label>
			<input class="password" type="text" value="<?php echo $_SESSION['name']; ?>" name="tensp" id="matkhau">

			<label><b style="font-size: 20px"></b></label>
			<input class="password" type="text" value="<?php echo $_SESSION['amount']; ?>" name="soluong" id="matkhau">

			<label><b style="font-size: 20px"></b></label>
			<input class="password" type="text" value="<?php echo $_SESSION['loai']; ?>" name="loai" id="matkhau">

			<label><b style="font-size: 20px"></b></label>
			<input class="password" type="text" value="<?php echo $_SESSION['price']; ?>" name="gia" id="matkhau">

			<label><b style="font-size: 20px"></b></label>
			<br>
			<input style="font-size: 16px" type="file"value="<?php echo $_SESSION['picture']; ?>" visibility="hidden" name="fileToUpload" id="matkhau">
			
			<br><br>
			<button class="signin" type="submit" name="submit_update">Sửa sản phẩm</button>	
			<button class="cancel" type="reset">Làm mới</button>
			<p style="text-align: center; margin-left: 40px; margin-top: 10px "><a class="back" href="admin.php?view=products">Quay lại</a></p>
	
	</div>

	</form>
	</div>
</body>
</html>