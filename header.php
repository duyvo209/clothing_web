<?php 
	session_start();

	include("connect.php");

	include("config.php");
	
	if(isset($_GET['logout'])){
		$dangxuat=1;
	}else{
		$dangxuat="";
	}
	if($dangxuat == 1){
		unset($_SESSION['tendangnhap']);
        unset($_SESSION['matkhau']);
		// session_unset();
		// session_destroy();
		$tendangnhap="";
	}

?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" href="/scale.css">
 	<link rel="stylesheet" href="/perspective.css">
 	<style type="text/css">


 		.radio{
			display: none;
		}
		.language .checked{
			display: flex;
			justify-content: center;
			align-items: center;
			width: 65px;
			height: 30px;
			float: left;
			background-color: #ffffff;
			cursor: pointer; 
			outline: none;
			transition: all 0.5s ease;
		}
		.language input[type='radio']:checked ~ .checked{
			background-color: #000;
			color: #ffffff;
		}
		
		
 	</style>
 </head>
 <body>
 	<div>
		<br>
		<h1 style="font-size: 36px; font-family: 'Quicksand', sans-serif; font-weight: 600; margin-left: 50px;">DUYVO STUDIO</h1>
		<div id="top">
			<div class="menu">
				<ul>
					<li><a id="home" href="project.php"><?php echo $lang['Trang Chủ'] ?></a></li>
					<li><a id="products" href="project.php?view=products"><?php echo $lang['Sản Phẩm'] ?></a>				
						<div class="menu-1">
							<ul>
								<li><a id="t-shirt" href="project.php?view=t-shirt">T-Shirt</a></li>
								<li><a id="shirts" href="project.php?view=shirts">Shirts</a></li>
								<li><a id="jeans" href="project.php?view=jeans">Jeans</a></li>
								<li><a id="shorts" href="project.php?view=shorts">Shorts</a></li>
							</ul>
						</div>
					</li>
					<li><a id="collection" href="project.php?view=blog"><?php echo $lang['Collection'] ?></a></li>
					<li><a id="introduce" href="project.php?view=info"><?php echo $lang['Giới Thiệu'] ?></a></li>
				</ul>
			</div>
		</div>
	</div>
	<form action="project.php?view=search" method="POST" enctype="multipart/form-data">
	<div class="search-box">
			<input class="search-txt" type="text" name="searchtext" placeholder="<?php echo $lang['Tìm kiếm sản phẩm'] ?>">

		
			<a class="search-btn" >
				<p id="search-icon" class="fa fa-search" aria-hidden="true" ><input style="display: none;" type="submit" name="search"></p>
			</a>
		
		
	</div>
	</form>
	
	<div>
		<a class="id" id="id" style="" href="?logout" onmouseover="logout()" onmouseleave="user()" onclick="return out()">
			<?php
				if(isset($_SESSION['tendangnhap'])){
				echo $_SESSION['tendangnhap'];
				} 
				
			?>

			<?php 
				if(isset($tendangnhap)){
					echo $tendangnhap;
				}else{
					echo "";
				}
			 ?>
		</a>
	</div>

	<script type="text/javascript">
		function logout(){
			var id = document.getElementById('id').value;
			document.getElementById('id').innerHTML = "<?php echo $lang['Đăng xuất'] ?>";
		}
		function user(){
			var id = document.getElementById('id').value;
			document.getElementById('id').innerHTML = "<?php echo $_SESSION['tendangnhap']; ?>";
		}
		function out(){
		   return confirm('<?php echo $lang['Bạn có muốn đăng xuất'] ?>'); 
		    if (confirm){
		    	return true;
		    }else{
		    	return false;
		    }
		}
	</script>

	<div>
		<?php if(!isset($_SESSION['tendangnhap'])) : ?><a class="account" href="project.php?view=login"> 
			<i class="fa fa-user-circle-o" aria-hidden="true"></i>
		<?php endif ?></a>
	</div>
	
	<span class="icon-cart" aria-hidden="true">
		<a class="cart-menu" href="project.php?view=cart">
			<svg version="1.1" class="svg-cart" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 27" style="enable-background:new 0 0 24 27;" xml:space="preserve"> <g> <path d="M0,6v21h24V6H0z M22,25H2V8h20V25z"></path> </g> <g> <path d="M12,2c3,0,3,2.3,3,4h2c0-2.8-1-6-5-6S7,3.2,7,6h2C9,4.3,9,2,12,2z"></path> </g> </svg>
		</a>
		<div id="cartall" >
			<span id="count-cart" class="count-cart">
				<?php 
					if(isset($_SESSION['tendangnhap'])) {
						$idkh = $_SESSION['idkh'];
						$count = 0;
	                    $sql = "SELECT * FROM giohang WHERE idkh=$idkh";
						$result1 = $connect->query($sql);
						while ($row = $result1->fetch_assoc()){
	                         $count = $count + $row['amount'];
						} 		
				?>
				<span class="count"><?php echo $count ?></span>
				<?php }else echo '<span class="count">0</span>'; ?>
			</span>
		</div>
	 </span>
	 <div>
	  <a class="order" href="project.php?view=order">
	  	<i class="fa fa-file-text-o" aria-hidden="true"></i>
	  </a>
	 </div>

	 <div class="language">
		<a onclick="language('vi')" style="top: 150px;right: 185px;max-width: 1080px;margin-left: auto;margin-right: auto;position: absolute;color: black;">
			<buton >
				<input id="vi" <?php if($_SESSION['lang']=='vi') echo 'checked'; ?> class="radio" type="radio" name="language" value="vi">
			<div  class="checked" style="border-top-left-radius: 0.6rem;border-bottom-left-radius: 0.6rem">VI</div>
			</button>
		</a>
							
		<a onclick="language('en')" style="top: 150px;right: 120px;max-width: 1080px;margin-left: auto;margin-right: auto;position: absolute;color: black;">
			<buton>
				<input id="en" <?php if($_SESSION['lang']=='en') echo 'checked'; ?> class="radio" type="radio" name="language" value="en">
			<div class="checked" style="border-top-right-radius: 0.6rem;border-bottom-right-radius: 0.6rem;">EN</div>
			</button>
		</a>
	</div>

	<script src="/popper.min.js"></script>
	<script src="/tippy-bundle.umd.js"></script>
	<script type="text/javascript">
		tippy('#home',{
			content: "<?php echo $lang['Trang Chủ'] ?>",
			placement: 'top',
  			animation: 'scale',
  			duration: '400',
		});
		tippy('#products',{
			content: "<?php echo $lang['Sản Phẩm'] ?>",
			placement: 'top',
  			animation: 'scale',
  			duration: '400',
		});
		tippy('#t-shirt',{
			content: "T-Shirt",
			placement: 'top',
  			animation: 'perspective',
  			duration: '400',
		});
		tippy('#shirts',{
			content: "Shirts",
			placement: 'top',
  			animation: 'perspective',
  			duration: '400',
		});
		tippy('#jeans',{
			content: "Jeans",
			placement: 'top',
  			animation: 'perspective',
  			duration: '400',
		});
		tippy('#shorts',{
			content: "Shorts",
			placement: 'top',
  			animation: 'perspective',
  			duration: '400',
		});
		tippy('#collection',{
			content: "Collection",
			placement: 'top',
  			animation: 'scale',
  			duration: '400',
		});
		tippy('#introduce',{
			content: "<?php echo $lang['Giới Thiệu'] ?>",
			placement: 'top',
  			animation: 'scale',
  			duration: '400',
		});
	 	tippy('#id', {
  			content: "<?php echo $lang['Đăng xuất'] ?>",
  			placement: 'right',
  			animation: 'scale',
  			duration: '400',
		});
     function language(x){
	 		var a = document.URL;
	 		var url = document.URL.split("?")[1];
            var url2 = document.URL.split("&")[1];

	 		if(url == "lang=vi"){
                a = document.URL.split("?")[0];
	 		}else if(url == "lang=en"){
                a = document.URL.split("?")[0];
	 		}
	 		if(url2 == "lang=vi"){
                a = document.URL.split("&")[0];
	 		}else if(url2 == "lang=en"){
                a = document.URL.split("&")[0];
	 		}

	 	 	// var rates = document.getElementById('language').value;
	 	 	  
  			rate_value = document.getElementById(x).value;
               
            if(a.search("view") == -1){   
           		window.location.href = a + "?lang=" + rate_value ;
          	}else{
          		window.location.href = a + "&lang=" + rate_value ;
          	}
	 	} 
	 </script>
 </body>
 </html>
	
