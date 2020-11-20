<?php

	include("connect.php");
	//session_start();
  
	if(isset($_POST['submit'])){
		$tendangnhap= $_POST['tendangnhap'];
		$matkhau= $_POST['matkhau'];

		$login = "SELECT *FROM thanhvien WHERE tendangnhap='$tendangnhap' AND matkhau='$matkhau' ";
		$result = $connect->query($login);
		$num = mysqli_num_rows($result);
		$row_dangnhap = mysqli_fetch_array($result);
		
	     		if($num > 0){
	     			echo "<script>
	     			window.location.replace('project.php');
	     			</script>
	     			";
	     			$_SESSION['tendangnhap']=$row_dangnhap['tendangnhap'];
	     			$_SESSION['idkh']=$row_dangnhap[0];
	     			//echo $_SESSION['tendangnhap'];	
					// header("Location: project.php");
	     		}else{
	     			if($tendangnhap == "" || $matkhau == ""){
				    	echo "<script>
						alert ('$lang[1]')
						</script>
						";
		           }else{
						
			     		echo "<script>
						alert ('$lang[2]')
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
			text-transform: uppercase;
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
		.forgot{
			font-family: 'Quicksand', sans-serif;
			font-size: 18px;
			margin-left: 90px;
		}
		.forgot a{
			color: black;
			text-decoration: none;
		}
		.error_form{
			color: #d93025;
		}
		#eye{
			position: absolute;
			top: 28px;
			left: 420px;
			opacity: 0.5;
			cursor: pointer;
		}
		
		
	</style>
</head>
<body>
	<div class="login">
		<form class="form" method="POST" enctype="multipart/form-data" style="height: 800px; padding-right: 35px;">
			<div class="full" style="margin-top: 30px;">
				<h1 style="font-weight: 600"><?php echo $lang['Đăng nhập'] ?></h1>
				<p style="border: black 2px solid; width: 445px;"></p>
				<br>
					<label><b style="font-size: 20px"><?php echo $lang['Tài khoản'] ?></b></label>
					<input class="text" type="text" placeholder="<?php echo $lang['Nhập tài khoản'] ?>" name="tendangnhap" id="tendangnhap">
					<label><b style="font-size: 20px"><?php echo $lang['Mật khẩu'] ?></b></label>

					<div style="position: relative;">
						<i class="fa fa-eye" id="eye" onclick="eye()" aria-hidden="true"></i>
						<input class="password" type="password" placeholder="<?php echo $lang['Nhập mật khẩu'] ?>" name="matkhau" id="matkhau">
					</div>
					
					<br>
					<button class="signin" onsubmit="login()" type="submit" name="submit"><?php echo $lang['Đăng nhập'] ?></button>	
					<a style="text-decoration: none" href="project.php"><button class="cancel" type="button"><?php echo $lang['Hủy bỏ'] ?></button></a>
					<br><br>
					<span class="forgot"><a href=""><?php echo $lang['Quên mật khẩu'] ?></a><span style="color:gray"> <?php echo $lang['hoặc'] ?></span> <a href="project.php?view=signup"> 
					 <?php echo $lang['Đăng ký'] ?></a></span>	
					

			</div>

		</form>
	</div>

	<script type="text/javascript">
		function eye(){
			var matkhau = document.getElementById('matkhau');

			if (matkhau.type === 'password'){
				matkhau.setAttribute('type','text');
			}else{
				matkhau.setAttribute('type','password');	
			}
		}
		
	</script>
</body>
</html>

