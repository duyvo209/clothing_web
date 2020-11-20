<?php 
    include("connect.php");

    $get = "SELECT *FROM sanpham";
    $result = $connect->query($get);

    if(isset($_GET['delete1'])) {
    	$id = $_GET['delete1'];
		$row=$result->fetch_assoc();
		$delete = "DELETE FROM sanpham WHERE id=$id";
		$connect->query($delete);
		header("location: admin.php?view=products");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<table class="table table-hover" style="margin-left: 250px !important;">
		<thead>
			<tr>
				<th colspan="8">
					<p style="
						text-align: center;
						letter-spacing: 10px;
						text-transform: uppercase;
						display: block;
						width: 100%;
						margin: auto;
						font-size: 28px;
					">
					Danh mục sản phẩm
					</p>
				</th>
			</tr>
			<tr>
				<th colspan="8">
					<p style="text-align: center; margin: 0"><input style=" width: 25%; height: 35px;" type="text" id="searchtext"  placeholder="Tìm kiếm"></p>
				</th>
			</tr>
			<tr>
				<th scope="col" colspan="8">
					<a href="admin.php?view=addproducts"><p style="
						text-align: center;						
						width: 100%;
						margin: auto;
					">
					Thêm sản phẩm
					</p></a>
				</th>
			</tr>
			<tr>
		      <th scope="col">STT</th>
		      <th scope="col">Ảnh sản phẩm</th>
		      <th scope="col">Tên sản phẩm</th>
		      <th scope="col">Giá</th>
		      <th scope="col">Số lượng</th>
		      <th scope="col">Loại</th>
		      <th scope="col"></th>
		      <th scope="col"></th>
		    </tr>
		</thead>
        	<tbody>
			<?php 
            	while($row=$result->fetch_assoc()) { ?>
		    <tr id="tr">
		      	<td><?php echo $row['id']; ?></td>
		      	<td><img style="width: 50px; height: 50px" src="<?php echo $row['picture']; ?>"></td>
            	<td><?php echo $row['name']; ?></td>
           		<td><?php echo number_format($row['price'],3,".",".")." "."đ"; ?></td>
            	<td><?php echo $row['amount']; ?></td>
            	<td><?php echo $row['loai']; ?></td>
            	<td><a href="admin.php?view=editproducts&update1=<?php echo $row['id'] ?>">Sửa</a></td>
            	<td><a href="?view=products&delete1=<?php echo $row['id']; ?>">Xóa</a></td>
		    </tr>
			<?php } ?>
		</tbody>
    </table>

    <script type="text/javascript">
    	document.getElementById('searchtext').addEventListener('keyup',()=>{
			var text= document.getElementById('searchtext').value;
			var trTables = document.getElementsByClassName('table')[0].children[1].children;
			    
			    for(var a of trTables){
			        a.style.display = 'table-row';
			    }
			    for(var a of trTables){
			        if(a.cells[0].innerText.toUpperCase().search(text.toUpperCase())===-1 && a.cells[2].innerText.toUpperCase().search(text.toUpperCase())===-1 && a.cells[3].innerText.toUpperCase().search(text.toUpperCase())===-1 && a.cells[5].innerText.toUpperCase().search(text.toUpperCase())===-1){
			            a.style.display = 'none';
			        }
			    }  
		})
    </script>

</body>
</html>
	