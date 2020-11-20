<?php 
	include("connect.php");
	include("config.php");
	if(!isset($_SESSION)){
		session_start();
	}
	if(isset($_SESSION['tendangnhap'])) {
		$total=0;
		$idkh = $_SESSION['idkh'];
		$sql = "SELECT * FROM giohang WHERE idkh=$idkh";
		$result = $connect->query($sql);
	}
	
	if(isset($_GET['delete'])) {
		$id = $_GET['delete'];
		$row=$result->fetch_assoc();
		$delete = "DELETE FROM giohang WHERE id=$id";
		$connect->query($delete);
		// header('Location: project.php?view=cart');
		echo "<script>
	     	window.location.replace('project.php?view=cart');
	     	</script>
	     	";
	}


 ?>


<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		
		.cart{
			font-family: 'Quicksand', sans-serif;
		}
		#note{
			background: #ededed;
			color: #252a2b;
			padding: 20px;
			outline: none;
			/*width: 50%;*/
			height: 130px;
			margin-left: 50px;
			margin-top: 180px;
		}
		.two{
			width: 50%;
		}
		.three{
			width: 40%;
   			float: right;
    		margin-top: -115px;
		}
		
		.continue{
			background-color: #ffffff;
			margin:8px 0;
			border: #333333 1px solid;
			cursor: pointer; 
			width: 200px;
			height: 55px;	
		}
		.continue a{
			color: #000;
			text-decoration: none;
		}
		.continue a:hover{
			color: #ffffff;
		}
		.total{
			background-color: #ffffff;
			margin:8px 0;
			border: #333333 1px solid;
			cursor: pointer; 
			width: 150px;
			height: 55px;	
		}
		.update{
			background-color: #ffffff;
			margin:8px 0;
			border: #333333 1px solid;
			cursor: pointer; 
			width: 150px;
			height: 55px;
		}
		.continue:hover, .update:hover, .total:hover{
			background-color: #e63535;
			color: #ffffff;
			outline: none;
		}
		.amount{
			background: #ffffff;
    		font-weight: 600;
   	 		height: 25px;
   			padding: 0;
    		text-align: center;
    		width: 35px;
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
    		font-size: 14px;
    		outline: none;
    		height: 25px;
    		width: 25px;
   			text-align: center;
   			font-weight: 600;
   			cursor: pointer;


	</style>
</head>
<body>
  <div id="cart">	
	<div class="cart">
		<div style="margin-top: 10px;">
			<h1 style="text-align: center; font-size: 32px"><?php echo $lang['Giỏ hàng của bạn'] ?></h1>
			<p class="count-cart"></p>
			<?php 
				if(isset($_SESSION['tendangnhap'])) {
					$idkh = $_SESSION['idkh'];
					$count = 0;
                    $sql = "SELECT * FROM giohang WHERE idkh=$idkh";
					$result1 = $connect->query($sql);
					$result2 = $connect->query($sql);
					while ($row = $result1->fetch_assoc()){
                         $count = $count + $row['amount'];
					} 
								
			?>
			<p style="text-align: center;"><?php echo $lang['Có'] ?> <?php echo $count ;?> <?php echo $lang['sản phẩm trong giỏ hàng'] ?></p>
			<?php }else echo "<p style='text-align: center;'>$lang[0]</p>";?>
			<hr>
		</div>

		<div>
			<div class="cart-left">
				<form>
					<div>
						<div class="one">
							<table style="width: 100%">
								<tbody>
									
									<ul style="list-style: none;">
										<?php 
										if(isset($_SESSION['tendangnhap'])) {
											$_SESSION['tensp']=""; 
											while ($row = $result2->fetch_assoc()) { ?>
												<?php $_SESSION['tensp']=$_SESSION['tensp'].''.$row['name'].' '.'('.$row['amount'].')'.'<br>'; ?>


										<li>
											<img style="width: 100px; height: 100px; float: left; margin-left: 50px" src="<?php echo $row['picture']; ?>">

											<span style="margin: 0 0 10px 0; margin-bottom: 5px;"><strong><?php echo $row['name']; ?></strong></span>
											<span style="float: right; margin-right: 6%"> 
												<a href="?view=cart&delete=<?php echo $row['id']; ?>"><img src="/close.jpg" style="width: 14px; height: 14px"></a>
											</span>
											<p style="margin: 5px 0 10px 0; margin-bottom: 5px;"><?php echo number_format($row['price'],3,".",".")." "."đ";  ?></p>
											<p style="margin: 0 0 10px 0; margin-bottom: 5px;"><?php echo $row['size']; ?></p>
											<div style="margin: 8px 0;">
												<input class="number" type="button" name="" id="number_"<?php echo $row['id']; ?> value="-" onclick="minus(<?php echo $row['id']; ?>)">
												<input class="amount" type="text" name="" id="amount_<?php echo $row['id']; ?>" value="<?php echo $row['amount']; ?>" min="1" readonly>
												<input class="number" type="button" name="" id="number_"<?php echo $row['id']; ?> value="+" onclick="add(<?php echo $row['id']; ?>)">
											</div>

											<p style="margin-left: 90%"><strong><?php $totalid=$row['price']*$row['amount']; $total+=$totalid; echo number_format("$totalid",3,".",".")." "."đ"; ?></strong></p>
										</li>

										<hr style="width: 94%; ">
									
										<?php } 

										}
										?>
									</ul>

								</tbody>
							</table>
						</div>

						<div class="two">
							<div class="note">
								<textarea id="note" rows="8" cols="50" placeholder="<?php echo $lang['Ghi chú'] ?>" style="resize: none;"></textarea>
							</div>
						</div>
							
						<div id="three" class="three">
							<p style="font-size:20px;"><?php echo $lang['Tổng tiền'] ?>: <strong id="total11"><?php if(isset($_SESSION['tendangnhap'])){if($total!=0){echo number_format("$total",3,".",".")." "."đ";}}?></p></strong>
							<div>
								<a href="project.php?view=products"><button class="continue" type="button"><?php echo $lang['Tiếp tục mua hàng'] ?></button></a>
								<!-- <a href="project.php?view=cart"><button id="update" class="update" type="button">CẬP NHẬT</button></a> -->
								<button class="total" onclick="showOrder()" type="button"><?php echo $lang['Thanh toán'] ?></button>
							</div>
						</div>
									
					</div>
				</form>
			</div>		
		</div>

	</div>
</div>

	<script type="text/javascript">
		function add(id){
			//alert(id);
			var num = document.getElementById("amount_"+id).value;

			document.getElementById("amount_"+id).value = Number(num) + 1;		
			  update(id);
		}

		function minus(id){
			var num = document.getElementById("amount_"+id).value;

			if(Number(num)>1){
				document.getElementById("amount_"+id).value = Number(num) - 1;
			}
			  update(id);
		}

		function update(id){
			var number = document.getElementById("amount_"+id).value;
			$.post('update.php',{'id' : id, 'number' : number}, function(){
                   $("#cart").load("project.php?view=cart .cart");
                   $("#cartall").load("project.php?view=cart #count-cart");


			});
		}

	</script>

	<!-- <script type="text/javascript">
		var amount = document.getElementById("amount");
		var add = document.getElementById("add");
		var minus = document.getElementById("minus");

		add.onclick = function (){
			amount.value = Number(amount.value) + 1;
		}

		minus.onclick = function(){
			if(Number(amount.value)>1){
					amount.value = Number(amount.value) -1;
			}
			
		}
	</script>	 -->

	<script>

		function Order(id){
			var total11 = Number(document.getElementById('total11').innerText.slice(0).replace('.','').replace('.','').replace('','').replace('đ',''));
			var hoten = document.getElementById('hoten').value;
			var email = document.getElementById('email').value;
			var sodienthoai = document.getElementById('sodienthoai').value;
			var diachi = document.getElementById('diachi').value;
			var ghichu = document.getElementById('ghichu').value;
			 
			 $.ajax({
		       method: "post",
		       url: "xulyorder.php",
		       data: 
			      {  
			      	'id' : id,
			      	'hoten' : hoten,
			      	'email' : email,
			      	'sodienthoai' : sodienthoai,
			      	'diachi' : diachi,
			      	'ghichu' : ghichu,
			      	'total11': total11

				},
				success: function (data){
					Swal.fire({
						position: 'top',
					  	icon: 'success',
					  	title: 'Đặt hàng thành công',
					 	showConfirmButton: false,
					  	timer: 1500,
					}).then(()=>{
						window.location.href = "project.php?view=order";
					});
				}
			});
		} 
	</script>

</body>
</html>