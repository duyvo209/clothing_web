 <?php 
    include("connect.php");
    $order = "SELECT *FROM donhang";
    $result = $connect->query($order);

    // $idkh = $_SESSION['idkh']
    // $status = $_POST['status'];
    // $status_change = "UPDATE donhang SET trangthai=$status WHERE idkh=$idkh";
    
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>	
<body>
		<table class="table table-hover" style="margin-left: 250px !important;">
			  <thead>
			  	<tr>
					<th colspan="10">
						<p style="text-align: center; letter-spacing: 10px; text-transform: uppercase; display: block; width: 100%; margin: auto; font-size: 28px;">Đơn đặt hàng</p>
					</th>
				</tr>
			    <tr>
			      	<th scope="col">Mã đơn</th>
			      	<th scope="col">Họ tên</th>
			      	<th scope="col">Sản phẩm</th>
			      	<th scope="col">Ngày đặt hàng</th>
			      	<th scope="col">Email</th>
			      	<th scope="col">Số điện thoại</th>
			      	<th scope="col">Địa chỉ</th>
			      	<th scope="col">Ghi chú</th>
			      	<th scope="col">Tổng tiền</th>
			      	<th scope="col">Trạng thái</th>
			    </tr>
			  </thead>
			   <tbody>
			     <?php while ($row = $result->fetch_assoc()) { ?>
			    <tr>
			      	<th scope="row"><?php echo $row['id']; ?></th>
			      	<td><?php echo $row['hoten']; ?></td>
			      	<td><?php echo $row['sanpham']; ?></td>
			      	<td><?php echo $row['ngaymua']; ?></td>
			      	<td><a href="mailto: <?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></td>
			      	<td><?php echo $row['sodienthoai']; ?></td>
			      	<td><?php echo $row['diachi']; ?></td>
			      	<td><?php echo $row['ghichu']; ?></td>	
			      	<td><?php echo number_format($row['tongtien'],0,".",".")." "."đ";  ?></td>
			     	<td>
			     		<select id="status_<?php echo $row['id']; ?>" onchange="status(<?php echo $row['id']; ?>)">
			     			<option <?php if($row['trangthai'] == 0){ ?> selected="selected" <?php } ?> value="0">Chờ xác nhận</option>
			     			<option <?php if($row['trangthai'] == 1){ ?> selected="selected" <?php } ?> value="1">Chờ lấy hàng</option>	
			     			<option <?php if($row['trangthai'] == 2){ ?> selected="selected" <?php } ?> value="2">Đang giao hàng</option>	
			     			<option <?php if($row['trangthai'] == 3){ ?> selected="selected" <?php } ?> value="3">Đã giao hàng</option>	
			     		</select>
			     	</td>
			    </tr>
			  <?php } ?>
			  </tbody>
		</table>

	<script>
		function status(id){
			var select = document.getElementById('status_'+id);
			var status = select.options[select.selectedIndex].value;
			$.ajax({
			method: "post",
			url: "status.php",
			data:{
				'id' : id,
				'status' : status
			},
			success: function(data){
				alert("Thay đổi trạng thái thành công !")
			}
		});
		}
		
	</script>

</body>
</html>