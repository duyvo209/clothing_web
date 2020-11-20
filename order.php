<?php 
    include("connect.php");
    if(!isset($_SESSION)) {
      session_start();
    }
    if(isset($_SESSION['tendangnhap'])) { 
      $idkh = $_SESSION['idkh'];
      $sql = "SELECT * FROM donhang WHERE idkh=$idkh";
      $result = $connect->query($sql);
 
    }
?>
<!DOCTYPE html>
<html>
<head>
      <style type="text/css">
        .order1{
          justify-content: center;
          display: flex;
        }
        .order1 h1{
          font-size: 32px; 
          font-weight: 100;
        }
      </style>
</head>
<body>
      <div class="order1">
          <h1><?php echo $lang['Đơn hàng của bạn'] ?></h1>
      </div>
      <form method="POST">
        <center>
            <table class="table table-hover" style="margin-top: 35px !important; width: 85% !important; font-family: 'Quicksand', sans-serif ;">
                <thead>
                    <tr>
                      <th scope="col"><?php echo $lang['Mã đơn'] ?></th>
                      <th scope="col"><?php echo $lang['Sản Phẩm'] ?></th>
                      <th scope="col"><?php echo $lang['Ngày đặt hàng'] ?></th>
                      <th scope="col"><?php echo $lang['Tổng tiền'] ?></th>
                      <th scope="col"><?php echo $lang['Trạng thái'] ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php if(isset($_SESSION['tendangnhap'])) { ?>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                      <th scope="row"><?php echo $row['id']; ?></th>
                      <td><?php echo $row['sanpham']; ?></td>
                      <td><?php echo $row['ngaymua']; ?></td>
                      <td><?php echo number_format($row['tongtien'],0,".",".")." "."đ";  ?></td>
                      <td>
                          <?php if($row['trangthai'] == 0){
                            echo "<p>$lang[11]</p>";
                          }
                           
                          if($row['trangthai'] == 1){
                            echo "<p>$lang[12]</p>";
                          }
                          
                          if($row['trangthai'] == 2){
                            echo "<p>$lang[13]</p>";
                          }

                          if($row['trangthai'] == 3){
                            echo "<p>$lang[14]</p>";
                          }
                          ?>
                       </td>
                    </tr>
                <?php }
                  }
                ?>
              </tbody>
            </table>
        </center>
      </form>
</body>
</html>


