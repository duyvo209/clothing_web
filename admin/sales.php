<?php 
	include ("connect.php");
	$total = 0;
	if(isset($_GET['month'])){
		$month = $_GET['month'];
	}else{
		$month = date('m');
	}
	$sales = "SELECT name, price, sum(amount) as amount, sum(amount*price) as revenue, loai FROM chitietdh INNER JOIN donhang ON chitietdh.iddh = donhang.id WHERE month(ngaymua)=$month GROUP BY name";
	$result = $connect->query($sales);

	$chart = "SELECT month(ngaymua) as month, sum(amount*price) as quantum FROM donhang INNER JOIN chitietdh ON donhang.id = chitietdh.iddh GROUP BY month(ngaymua)";
	$result1 = $connect->query($chart);  

	$dataPoints = array();
	while ($row = $result1->fetch_assoc()){
		array_push($dataPoints, array("label" => 'Tháng '.$row['month'], "y"=>$row['quantum']));
	} 
	


 ?>

<!DOCTYPE html>
<html>
<head>
	<script>
		window.onload = function() {
		 
			var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				theme: "light2",
				title:{
					text: ""
				},
				axisY: {
					title: "Gold Reserves (in tonnes)"
				},
				data: [{
					type: "column",
					yValueFormatString: "#,##0.##",
					dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
				}]
			});
			chart.render();
		 
		}
		
	</script>
</head>
<body>
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
					Báo cáo doanh thu
					</p>
				</th>
			</tr>
			<tr>
				<th colspan="5">
					<div id="chartContainer" style="height: 370px; width: 100%;"></div>
				</th>
			</tr>
			
			<tr>
				<th colspan="5">
					 <p style="text-align: center; margin-bottom: 0">
					 	<select id="month" onchange="Month()" style="width: 25%; height: 40px;">
						 	<?php 
						 		for($i=1;$i<=12;$i++){ ?>
						 			<option 
						 				<?php if($month == $i){ ?>
						 				selected = "selected"
						 				<?php } ?>
						 				value= "<?php echo $i;?>">Tháng <?php echo $i ?>
						 			</option>

						 	<?php } ?>
					 	</select>
					 </p>
				 </th>
			</tr>

			<tr>
		      <th scope="col">Tên sản phẩm</th>
		      <th scope="col">Giá</th>
		      <th scope="col">Số lượng</th>
		      <th scope="col">Loại</th>
		      <th scope="col">Tổng tiền</th>
		    </tr>
		</thead>
		<tbody>
			<?php while ($row = $result->fetch_assoc()) { ?>
		    <tr>
		      <td><?php echo $row['name']?></td>
		      <td><?php $price = $row['price']; echo number_format("$price",3,".",".")." "."đ";?></td>
		      <td><?php echo $row['amount']?></td>
		      <td><?php echo $row['loai']?></td>
		      <td><?php $totalid = $row['revenue']; $total+=$totalid; echo number_format("$totalid",3,".",".")." "."đ"; ?></td>
		    </tr>
			<?php } ?>
			<tr>
				<th colspan="5" style="font-size: 20px;">Tổng doanh thu: <?php if($total!=0){echo number_format("$total",3,".",".")." "."đ";}?></th>
			</tr>
		</tbody>
	</table>


<script type="text/javascript">
	function Month(){
		var months = document.getElementById('month');
		var select= months.options[months.selectedIndex].value;
		window.location.href = 'admin.php?view=sales&month='+select;
	}
</script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>
</html>


