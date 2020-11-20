<?php 
	include("connect.php");

if(isset($_GET["id"])){
		$id = $_GET["id"];
	}

	$select = "SELECT * FROM sanpham WHERE id='$id'";
	$result = $connect->query($select);
	$row = mysqli_fetch_array($result);
	//AFTER LOGIN
	if(!isset($_SESSION)){
		session_start();	
		}
		
		if(isset($_POST['submit'])){
			if(isset($_SESSION['tendangnhap'])){
				$idkh = $_SESSION['idkh'];

				$size = $_POST['size'];

				$num = $_POST['amount'];

				$cart = "SELECT * FROM giohang WHERE idkh=$idkh AND idsp=$id AND size='$size' ";
				$result_cart = $connect->query($cart);
				$row1 = mysqli_fetch_array($result_cart);
				$count = mysqli_num_rows($result_cart);


				if($count == 1 ){
					(int)$total_num = (int)$row1[3] + $num;
					$update = "UPDATE giohang SET amount = '$total_num' WHERE idkh=$idkh AND idsp=$id  AND size='$size' " ;
					$connect->query($update);
				}else{
					$add = "INSERT INTO giohang (name, size, amount, loai, price, picture, idsp, idkh) VALUES ('$row[1]', '$size', '$num', '$row[3]', '$row[4]', '$row[5]', '$id', '$idkh') ";
					$connect->query($add);
				}
				// header("location: project.php?view=cart");
				echo "<script>
	     			window.location.replace('project.php?view=cart');
	     			</script>
	     			";
		}else{
			// header("location: project.php?view=login");
			echo "<script>
	     			window.location.replace('project.php?view=login');
	     			</script>
	     			";
		}
	}


?>



<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.table{
			font-family: 'Quicksand', sans-serif;
		}
		.addproducts{
			background-color: #ffffff;
			margin:8px 0;
			border: #333333 1px solid;
			cursor: pointer; 
			width: 200px;
			height: 55px;
			background-color: #ffffff;	
			outline: none;

		}
		.addproducts:hover{
			/*background-color: #e63535;
			color: #ffffff;*/
			background-color: #000;
			color: #ffffff;
			outline: none;
		}
		.amount{
			background: #ffffff;
    		font-weight: 600;
   	 		height: 32px;
   			padding: 0;
    		text-align: center;
    		width: 70px;
    		border: 1px solid #f5f5f5;
   			/*border-left: none;
    		border-right: none;*/
    		border-radius: 1px;
    		float: left;
		}
		.number{
			float: left;
    		background: #f5f5f5;
    		border: #f5f5f5 1px solid;
    		font-size: 17px;
    		outline: none;
    		height: 32px;
    		width: 32px;
   			text-align: center;
   			font-weight: 600;
   			cursor: pointer;
		}
		.radio{
			display: none;
			width: 40px;
			height: 40px;
			
		}
		.size .checked{
			display: flex;
			justify-content: center;
			align-items: center;
			width: 40px;
			height: 40px;
			background-color: #ffffff;
			border: #333333 1px solid;
			cursor: pointer; 
			outline: none;
			transition: all 0.3s ease;
		}
		.size input[type='radio']:checked ~ .checked{
			background-color: #000;
			color: #ffffff;
		}
		.size .checked:hover{
			background-color: #000;
			color: #ffffff
		}
	</style>
</head>
<body>
	<form method="POST" enctype="multipart/form-data">
		<center>
		<table class="table" >
			<tbody>
				<br>
				<tr>
					<td id="imgzoom" style="width:50%">
						<div id="zoomdivimg">
							<img style="width: 660px; height: 700px;" src="<?php echo $row['picture']; ?>">
						</div>
					</td>
					<td style="width: 40%;">
						<p style="font-size: 20px; margin-top: 100px;"><strong><?php echo $row['name']; ?></strong></p>
						<p><?php echo number_format($row['price'],3,".",".")." "."đ"; ?></p>					
						<div class="size">
							<label>
								<input checked="checked" class="radio" type="radio" name="size" value="S">
								<div class="checked">S</div>
							</label>
							
							<label>
								<input class="radio" type="radio" name="size" value="M">
								<div class="checked">M</div>
							</label>
							
							<label>
								<input class="radio" type="radio" name="size" value="L">
								<div class="checked">L</div>
							</label>
						</div>

						<div style="margin: 8px 0;">
							<input class="number" type="button" onclick="minus()" name="" id="" value="-">
							<input class="amount" type="text" name="amount" id="amount" value="1" min="1" readonly>
							<input class="number" type="button" onclick="add()" name="" id="" value="+">
						</div>

						<br>
						<br>

						<div>
							<button type="submit" name="submit" class="addproducts"><?php echo $lang['Thêm vào giỏ'] ?></button>
						</div>

						<div>
							<br>
							<h4 style="font-size: 18px"><?php echo $lang['Mô tả'] ?></h4>
						</div>
						<div style="color: gray; font-size: 15px">
							<span>Limited Edition</span>
							<p>No restock</p>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		</center>
	</form>
	<script src="js-image-zoom.js"></script>
	<script src="https://unpkg.com/js-image-zoom/js-image-zoom.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/js-image-zoom/js-image-zoom.min.js"></script>

	<script type="text/javascript">
		var options = {
		    width: 660,
		    height: 660,
		    scale: 0.9
		};
		new ImageZoom(document.getElementById("zoomdivimg"), options);
	</script>
	
	<script type="text/javascript">
		function add(){
			var num = document.getElementById("amount").value;

			document.getElementById("amount").value = Number(num) + 1;
		}

		function minus(){
			var num = document.getElementById("amount").value;

			if(Number(num)>1){
				document.getElementById("amount").value = Number(num) - 1;
			}
			
		}

	</script>
	

	<!-- <script type="text/javascript" src="js-image-zoom.js">
		var options = {
			width: 400;
		};
		new ImageZoom(document.getElementById("imgzoom"),options);
		var options = {
			width: 400,
			height: 400
		};
		var options = {
			width: 400,
			height: 400
		};
		var options = {
			width: 400,
			zoomWidth: 500
		};
		var options = {
			width: 400,
			img: php echo $row['picture']; 
		};
		var options = {
			width: 400,
			offset: {
				vertical: 0,
				horizontal: 10
			}
		};
		var options = {
			width: 400,
			scale: 2.5
		};
		var options = {
			width: 400,
			zoomStyle:{

			}
		};
		var options = {
			width: 400,
			zoomLensStyle:{

			}
		};
		var options = {
			width: 400,
			zoomPosition: 'left'
		};

	</script>
	<script src="https://unpkg.com/js-image-zoom/js-image-zoom.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/js-image-zoom/js-image-zoom.min.js"></script>	 -->
</body>
</html>