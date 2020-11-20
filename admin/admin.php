<?php 
    include("connect.php");
    session_start();

    if(!isset($_SESSION['tendangnhapad'])){
        header("Location: login.php");
    }
  
    if(isset($_GET['logout'])){
        $dangxuat=1;
    }else{
        $dangxuat="";
    }
    if($dangxuat == 1){
        unset($_SESSION['tendangnhapad']);
        unset($_SESSION['matkhauad']);
        header("Location: login.php");
    }
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>ADMIN</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
            font-family: 'Quicksand', sans-serif !important; 
        }
        body{
            background: #f3f5f9;
        }
        .wrapper{
            display: flex;
            position: relative;
        }
        .admin{
            position: fixed;
            width: 250px;
            height: 100%;
            background: #e3e1e2;
        }
        .admin h2{
            text-align: center;
            text-transform: uppercase;
            margin-top: 20px;
            margin-bottom: 30px;
        }
        .admin h2 a{
            color: #000;
            text-decoration: none;
        }
        .admin ul li{
            padding: 10px 0;
            border-top: black 1px solid;
           
        }
        .admin ul li:hover{
            background: #fff;
        }
        .admin ul li a{
            color: #000;
            display: block;
            margin-left: 10px;
            text-decoration: none;
        }
        .main{
            width: 100%;
            justify-content: center;
            display: flex;
        }
        .products tbody tr:hover{
            background: #fff;
            cursor: pointer;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
   
</head>
<body>
    <div class="wrapper">
        <div class="admin">
            <h2><a href="admin.php">Admin</a></h2>
            <ul>
                <li><a href="admin.php?view=customer">Khách hàng</a></li>
                <li><a href="admin.php?view=products">Danh mục sản phẩm</a></li>
                <li><a href="admin.php?view=order">Đơn đặt hàng</a></li>
                <li><a href="admin.php?view=sales">Báo cáo doanh thu</a></li>
                <li style="border-bottom: black 1px solid"><a href="?logout">Đăng xuất</a></li>
            </ul>
        </div>
         <div class="main">
            <?php include ("content.php"); ?>

        </div>
    </div>   


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>



