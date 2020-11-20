<?php 
	include("connect.php");
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	if(!isset($_SESSION)){
		session_start();
	}
	if(isset($_POST['id'])){
		$idkh = $_POST['id'];
		echo $idkh;
		$date = date("Y-m-d H:i:s");
		$tensp=$_SESSION['tensp'];
		$hoten = $_POST['hoten'];
		$email = $_POST['email'];
		$sodienthoai = $_POST['sodienthoai'];
		$diachi = $_POST['diachi'];
		$ghichu = $_POST['ghichu'];
		$total11= $_POST['total11'];
		

		$sql = "SELECT * FROM giohang WHERE idkh = $idkh";
		$result = $connect->query($sql);
		$count = mysqli_num_rows($result);

		$sql1 = "SELECT * FROM giohang WHERE idkh = $idkh";
		$result1= $connect->query($sql1);
		
		if ($count > 0){
			$order = "INSERT INTO donhang(idkh, sanpham, ngaymua, tongtien, hoten, email, sodienthoai, diachi, ghichu) VALUES ('$idkh', '$tensp', '$date', '$total11', '$hoten', '$email', '$sodienthoai', '$diachi', '$ghichu')";
			 $connect->query($order);

			$idorder = mysqli_insert_id($connect);
			
			while ($row = mysqli_fetch_row($result1)){

				$adddetail = "INSERT INTO chitietdh(name,size,amount,loai,price,picture,iddh,idkh) VALUES('$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$idorder','$idkh')";
				$connect->query($adddetail);
			}
			
			$delete = "DELETE FROM giohang WHERE idkh=$idkh";
			$connect->query($delete);
			// header("location: project.php?view=cart");
		}
	}

 ?>

 
