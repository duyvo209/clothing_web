 	<?php 
	include("connect.php");

	if(isset($_POST['tendangnhap'])){
		$ho= $_POST['ho'];
		// echo $ho;
		$ten= $_POST['ten'];
		// echo $ten;
		$email= $_POST['email'];
		// echo $email; 
		$tendangnhap= $_POST['tendangnhap'];
		// echo $tendangnhap;
		$matkhau= $_POST['matkhau'];
		// echo $matkhau;
		$nhaplaimatkhau= $_POST['nhaplaimatkhau'];
		// echo $nhaplaimatkhau;
		$sodienthoai= $_POST['sodienthoai'];
		// echo $sodienthoai;

		if ($ho == "" || $ten == "" || $email == "" || $tendangnhap == "" || $matkhau == "" || $nhaplaimatkhau == "" || $sodienthoai == ""){
			echo "<script>
				alert ('Vui lòng điền đầy đủ thông tin để tạo tài khoản')
				</script>
				";
			}else if ($matkhau == $nhaplaimatkhau && $matkhau!==""){
				$INSERT = "INSERT INTO thanhvien (ho, ten, email, tendangnhap, matkhau, sodienthoai) VALUES ('$ho','$ten', '$email', '$tendangnhap', '$matkhau','$sodienthoai')";
				$connect->query($INSERT);
					echo "<script>
						alert ('Đăng ký tài khoản thành công')
					</script>";
					echo "<script>
	     			window.location.replace('project.php?view=login');
	     			</script>";
	     			";
				";
			}else{
				echo "<script>
						alert ('Mật khẩu không khớp')
					</script>
				";
		
		
			// $num = mysqli_num_rows($result);
	  //    	$row_dangnhap = mysqli_fetch_assoc($result);
	  //    	if($num == 1){
	  //    		header("location: login.php");
	     	}
		}
		
	
 ?>

 <!DOCTYPE html>
<html>
<head>
	<style>
		.registration{
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
		.hoten{
			position: relative;
			margin: 8px 0;
		}
		.hoten1{
			box-sizing: border-box;
			display: inline-block;
			padding: 10px 20px;
			border: #ededed 2px solid;
    		background: #ededed;
    		color: #252a2b;
		}
		.hoten1:hover{
			background: #fff;
			border-color: black; 
			transition: ease 1.5s;
		}
		.hoten1:focus{
			outline: none;
			border-color: black;
		}
		.fullname:after{
			content: "";
			display: table;
		 	clear: both;
		}
		.fullname > div{
			float: left;
			width: 50%;
				
		}
		
		.text, .password, .repeat, .email, .phone{
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

		.text:hover, .password:hover, .repeat:hover, .email:hover, .phone:hover{
			background: #fff;
			border-color: black; 
			transition: ease 1.5s;
		}

		.text:focus, .password:focus, .repeat:focus, .email:focus, .phone:focus{
			outline: none;
			border-color: black;
		}

		.signup{
			color: white;
			margin: 8px 0;
			border: none;
			cursor: pointer; 
			font-size: inherit;
			width: 450px;
			height: 55px;	
			font-weight: 500;	
			position: relative;
			z-index: 1;
			transition: all 0.5s ease;
			text-transform: uppercase;
		}
		.signup:before{
			content: "";
			position: absolute;
			z-index: -1;
			background-color: #000;
			right: 0;
			top: 0;
			height: 100%;
			width: 100%;
			transition: all 0.5s ease;
		}
		.signup:hover:before{
			width: 0;
		}
		.signup:hover{
			color: #000;
			outline: none;
		}
		.cancel{
			color: white;
			background-color: #f44336;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 450px;
			height: 55px;
			font-weight: 500;
			font-size: inherit;
			opacity: 0.8;
		}
		.cancel:hover{
			opacity: 1;
			outline: none;
		}  
		.error_form{
			color: #d93025;
		}
		#eyeS{
			position: absolute;
			top: 66px;
			left: 420px;
			opacity: 0.5;
			cursor: pointer;
		}
		#eyeS1{
			position: absolute;
			top: 66px;
			left: 420px;
			opacity: 0.5;
			cursor: pointer;
		}
	</style>
	<meta charset="utf-8">
</head>
<body>
	<div id="content">
	<div class="registration">
	<form class="form" method="POST" enctype="multipart/form-data" id="signup_form" onsubmit="return signup()" style="padding-right: 35px;">
	<div class="full" style="margin-top: 30px;">
		<h1 style="font-size: 37px; font-weight: 600"><?php echo $lang['Đăng ký'] ?></h1>
		<p style="border: black 2px solid; width: 445px;"></p>
		<br>
		<div class="fullname">
			<div class="hoten">
				<label>
					<b style="font-size: 20px;" ><?php echo $lang['Họ'] ?></b>
				</label>
				<input class="hoten1" style="width: 200px; height: 55px;" type="text" placeholder="<?php echo $lang['Nhập họ'] ?>" name="ho" id="ho">
				
				<!-- <span><i style="display: none;" id="icon" class="fa fa-exclamation-circle" aria-hidden="true"></i></span> -->
				<div class="error_form" id="ho_error"></div>
			</div>

			<div class="hoten">
				<label>
					<b style="font-size: 20px"><?php echo $lang['Tên'] ?></b>
				</label>
				<input class="hoten1" style="width: 244px; height: 55px;" type="text" placeholder="<?php echo $lang['Nhập tên'] ?>" name="ten" id="ten">
				<div class="error_form" id="ten_error"></div>
			</div>
		</div>

			<div>
				<label>
					<b style="font-size: 20px">Email</b>
				</label>
				<input class="email" type="email" placeholder="<?php echo $lang['Nhập email'] ?>" name="email" id="email">
				<div class="error_form" id="email_error"></div>
			</div>

			<div>
				<label>
					<b style="font-size: 20px"><?php echo $lang['Tài khoản'] ?></b>
				</label>
				<input class="text" type="text" placeholder="<?php echo $lang['Nhập tài khoản'] ?>" name="tendangnhap" id="tendangnhap" onchange="Exists()">
				<div class="error_form" id="tendangnhap_error"></div>
				<div class="error_form" id="tendangnhap_exists"></div>
			</div>

			<div style="position: relative;">
				<label>
					<b style="font-size: 20px"><?php echo $lang['Mật khẩu'] ?></b>
				</label>
				<div>
					<i class="fa fa-eye" id="eyeS" onclick="eyeS()" aria-hidden="true"></i>
					<input class="password" type="password" placeholder="<?php echo $lang['Nhập mật khẩu'] ?>" name="matkhau" id="matkhau">
					<div class="error_form" id="matkhau_error"></div>
				</div>
			</div>
			
			<div style="position: relative;">
				<label>
					<b style="font-size: 20px"><?php echo $lang['Nhập lại mật khẩu'] ?></b>
				</label>
				<div>
					<i class="fa fa-eye" id="eyeS1" onclick="eyeS1()" aria-hidden="true"></i>
					<input class="repeat" type="password" placeholder="<?php echo $lang['Nhập lại mật khẩu'] ?>" name="nhaplaimatkhau" id="nhaplaimatkhau">
					<div class="error_form" id="nhaplaimatkhau_error"></div>
				</div>
			</div>
			
			<div>
				<label>
					<b style="font-size: 20px"><?php echo $lang['Số điện thoại'] ?></b>
				</label>
				<input class="phone" type="text" placeholder="<?php echo $lang['Nhập số điện thoại'] ?>" name="sodienthoai" id="sodienthoai">
				<div class="error_form" id="sodienthoai_error"></div>
			</div>
			<br>
			<button class="signup" type="submit"><?php echo $lang['Đăng ký'] ?></button>	
			<a style="text-decoration: none" href="project.php"><button class="cancel" type="button"><?php echo $lang['Hủy bỏ'] ?></button></a>
	</div>
	</form>

	<script type="text/javascript">	
	    function Exists(){
	        var xmlhttp;
	       
	        if (window.XMLHttpRequest){
	            xmlhttp = new XMLHttpRequest();
	        }else{
	            xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	        }
	        xmlhttp.onreadystatechange =  function (){
	            if(xmlhttp.readyState==4 && xmlhttp.status==200){
	                document.getElementById('tendangnhap_exists').innerHTML = xmlhttp.responseText;
	                document.getElementById('tendangnhap').style.border = "#d93025 2px solid";
	            }
	        }
	        xmlhttp.open("GET",'exists.php?tendangnhap='+document.getElementById('tendangnhap').value,true);
	        xmlhttp.send();
	    }    
	</script>

	<script src="/script.js"></script>
	</div>
	</div>
	<script type="text/javascript">
		function eyeS(){
			var matkhau = document.getElementById('matkhau');

			if (matkhau.type === 'password'){
				matkhau.setAttribute('type','text');
			}else{
				matkhau.setAttribute('type','password');	
			}
		}

		function eyeS1(){
			var nhaplaimatkhau = document.getElementById('nhaplaimatkhau');

			if (nhaplaimatkhau.type === 'password'){
				nhaplaimatkhau.setAttribute('type','text');
			}else{
				nhaplaimatkhau.setAttribute('type','password');	
			}
		}
		
	</script>
</body>
</html>