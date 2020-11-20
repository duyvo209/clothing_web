<?php
    include ("connect.php");
    $sql = "CREATE DATABASE database_TShirt";
    $connect->query($sql);
    $connect->query("USE database_TShirt");

    $get = "SELECT * FROM sanpham WHERE loai ='shirts' ";
    $result = $connect->query($get);
?>
<center>
	<table style="width: 100%; justify-content: center; display: table;">
	<div class="mainProduct" style="width: 100%; justify-content: center; display: flex;">
		<div id="Shirts">

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
</center>

