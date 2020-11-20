 <?php 
    include("connect.php");

    $customer = "SELECT *FROM thanhvien";
    $result = $connect->query($customer);    

 ?>

	
	<table class="table table-hover" style="margin-left: 250px !important;">
		<thead>
			<tr>
				<th colspan="5">
					<p style="
						text-align: center;
						letter-spacing: 10px;
						text-transform: uppercase;
						display: block;
						width: 100%;
						margin: auto;
						font-size: 28px;
					">
					Khách hàng
					</p>
				</th>

			</tr>
			<tr>
		      <th scope="col">Họ</th>
		      <th scope="col">Tên</th>
		      <th scope="col">Tên đăng nhập</th>
		      <th scope="col">Email</th>
		      <th scope="col">Số điện thoại</th>
		    </tr>
		</thead>
		<tbody>
			<?php 
            	while($row=$result->fetch_assoc()) { ?>
		    <tr>
		      <td><?php echo $row['ho']; ?></td>
		      <td><?php echo $row['ten']; ?></td>
		      <td><?php echo $row['tendangnhap']; ?></td>
		      <td><a href="mailto: <?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></td>
		      <td><?php echo $row['sodienthoai']; ?></td>
		    </tr>
			<?php } ?>
		</tbody>
	</table>

 