        
    <?php 
         
         if(isset($_GET['view'])){
         	$v = $_GET['view'];
         }else{
         	$v= '';
         }
         
         if($v == ''){
         	include ("home.php");
         }
         else if($v == 'info'){
         	include("info.php");
         }else if($v == 'blog'){
         	include("blog.php");
         }else if(isset($_POST['search'])){
            include("search.php");
         }else if($v == 'products'){
            include("products.php");
         }else if($v == 't-shirt'){
         	include("t-shirt.php");
         }else if($v == 'shirts'){
         	include("shirts.php");
         }else if($v == 'jeans'){
         	include("jeans.php");
         }else if($v == 'shorts'){
         	include("shorts.php");
         }else if($v == 'login'){
            include("login.php");
         }else if($v == 'signup'){
            include("signup.php");
         }else if($v == 'logout'){
            include("logout.php");
         }else if($v == 'detail'){
            include("detail.php");
         }else if($v == 'cart'){
            include("cart.php");
         }else if($v == 'order'){
            include("order.php");
         }
    ?>