<?php 
 	include("connect.php");

 	if(isset($_GET['page'])){
 	
	$page = $_GET['page'];
	

 	}else{
	$page = 1;

 	}
 	if(isset($_GET['item'])){
 		$item = $_GET['item'];
 	}else{
 		$item = "12";
 	}
	
	$offset = ($page - 1) * $item; 
	$get = "SELECT * FROM sanpham LIMIT $item OFFSET $offset" ;
    $result = $connect->query($get);
    
    $all = "SELECT *FROM sanpham";
    $result_all = $connect->query($all);
    $row1 = mysqli_fetch_assoc($result_all);
	$allproducts = mysqli_num_rows($result_all);
	//var_dump($allproducts);
	$numpage = ceil($allproducts / $item);
 		
 ?>
	

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.page a{
			margin: 15px;
			color: #000;
		}
		.page a:hover{
			color: #ffffff;
		}
	</style>
</head>
<body>
	<center>
	<table style="width: 100%; justify-content: center; display: table;">
	<div class="mainProduct" style="width: 100%; justify-content: center; display: flex;">
		<div id="Shirts" style="width: 100%">

			   <ul class="shirts">
				<?php 
					while($row=$result->fetch_assoc()) { ?>
					 	<li><a href="project.php?view=detail&id=<?php echo $row['id'];?>"><img style="width: 230px; height: 230px" src="<?php echo $row['picture'];?>"></a> <br>
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
		<div class="page">
			<?php 
				if($page > 3){
					$firstpage = 1; ?>
			 <a href ="?view=products&item=<?php echo $item ?>&page=<?php echo $firstpage ?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
			<?php } ?>

			<?php for ($num=1; $num<=$numpage; $num++){ ?>
				<?php if ($num != $page ) { ?>
					<?php if ($num > $page - 3 && $num < $page + 3){ ?>
						<a href ="?view=products&item=<?php echo $item ?>&page=<?php echo $num ?>"><?php echo $num ?></a>
					<?php } ?>
				<?php }else{ ?>
					<a href=""><strong class="page"><?php echo $num ?></strong></a>
				<?php } ?>
			<?php } ?>
			
			<?php 
				if($page < $numpage - 3){
					$lastpage = $numpage; ?>
				<a href ="?view=products&item=<?php echo $item ?>&page=<?php echo $lastpage ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
			<?php } ?>

		</div>
	</center>
</body>
</html>
 
