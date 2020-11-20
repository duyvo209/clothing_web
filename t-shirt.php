<?php
    include ("connect.php");
    
 //    if(isset($_GET['pagetee'])){
 //    	$pagetee = $_GET['pagetee'];
	

 // 	}else{
	// $pagetee = 1;

 // 	}
 // 	if(isset($_GET['itemtee'])){
 // 		$itemtee = $_GET['itemtee'];
 // 	}else{
 // 		$itemtee = "12";
 // 	}
	
	// $offset = ($pagetee - 1) * $itemtee; 
 //    $get = "SELECT * FROM sanpham WHERE loai ='tshirt' LIMIT $itemtee OFFSET $offset ";
    $get = "SELECT * FROM sanpham WHERE loai ='tshirt'";
    $result = $connect->query($get);

 //    $all = "SELECT *FROM sanpham WHERE loai ='tshirt'";
 //    $result_all = $connect->query($all);
 //    $row1 = mysqli_fetch_assoc($result_all);
	// $allproducts = mysqli_num_rows($result_all);
	//var_dump($allproducts);
	// $numpage = ceil($allproducts / $itemtee);

?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.pagetee a{
			margin: 15px;
			color: #000;
		}
		.pagetee a:hover{
			color: #ffffff;
		}
	</style>
</head>
<body>
	<center>
		<table style="width: 100%; justify-content: center; display: table;">
		<div class="mainProduct" style="width: 100%; justify-content: center; display: flex;">
			<div id="TShirt" style="justify-content: center; display: flex;">
			   <ul class="tshirt">
				<?php 
					while($row=$result->fetch_assoc()) { ?>
					 	<li> <a href="project.php?view=detail&id=<?php echo $row['id'];?>"><img style="width: 230px; height: 230px; " src="<?php echo $row['picture'];?>"></a><br>
						<?php
							echo $row['name'] . '<br>' .number_format($row['price'],3,".",".")." "."đ";

						 ?>
						</li>
					<?php  
					     }
					 ?>
				</ul>
			</div>
		</div>
		</table>
		<br><br><br><br>
		<!-- <div class="pagetee">			 
				<?php for ($num=1; $num<=$numpage; $num++){ ?>
					<?php if ($num != $pagetee ) { ?>
							<a href ="?view=t-shirt&itemtee=<?php echo $itemtee ?>&pagetee=<?php echo $num ?>"><?php echo $num ?></a>
					<?php }else{ ?>
						<a href=""><strong class="pagetee"><?php echo $num ?></strong></a>
					<?php } ?>
				<?php } ?>			
		</div> -->
	</center>	
</body>
</html>

