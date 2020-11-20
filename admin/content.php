
    <?php 
         if(isset($_GET['view'])){
         	$v = $_GET['view'];
         }else{
         	$v= '';
         }
         
         if($v == 'products'){
            include("products.php");
         }else if( $v == ''){
           echo "<h1 style='margin-left: 250px; font-size:72px; letter-spacing: 10px;'>WELCOME</h1>";
         }else if( $v == 'customer'){
            include("customer.php");
         }else if( $v == 'order'){
            include("order.php");
         }else if( $v == 'editproducts'){
            include("editproducts.php");
         }else if ( $v == 'addproducts'){
            include("addproducts.php");
         }else if ( $v == 'sales'){
            include ("sales.php");
         }
    ?>