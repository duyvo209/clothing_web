<?php
    include ("connect.php");
    $sql = "CREATE DATABASE database_TShirt";
    $connect->query($sql);
    $connect->query("USE database_TShirt");

    $get = "SELECT * FROM sanpham WHERE loai ='shorts' ";
    $result = $connect->query($get);
?>
<br>
<br>
<br>
<div id="Short-text">
<h2>Short</h2>
<div id="notproducts">
<p>Chưa có sản phẩm nào trong danh mục này</p>
</div>
</div>

<div id="Shorts">
   <ul class="shorts">
	<?php 
		while($row=$result->fetch_assoc()) { ?>
		 	<li> <img style="width: 100px; height: 100px" src="<?php echo $row['picture'];?>"> <br>
			<?php
				echo $row['id'] .'<br>' .$row['name'] . '<br>' .$row['price']; 
			 ?>
			</li>
		<?php  
		     }
		 ?>
	</ul>
</div>
