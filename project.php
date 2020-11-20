<!DOCTYPE html>
<html>
<head>
	<title>DUYVO STUDIO</title>	
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="sweetalert2.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
	<link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">
	
</head>
   
<body>
	<div class="root">
		<div id="header">
			 <?php include("header.php"); ?>
		</div>
		<div id="content">
			<?php include("content.php"); ?>
			<!-- <div id="leftcontent"></div>
			<div id="rightcontent">
			    
		    </div> -->
		</div>
	</div>
	<div id="footer">
			<?php include("footer.php"); ?>
	</div>

	<script type="text/javascript">
		document.getElementsByClassName("count-cart")[0].addEventListener("mouseover",()=>{
	   		document.getElementsByClassName("count")[0].style.display="none";
	    	setTimeout(function() {
	       		document.getElementsByClassName("count")[0].style.display="block";
	        	// document.getElementsByClassName("count")[0].innerText = (parseInt(document.getElementsByClassName("count")[0].innerText)+1).toString()
	        },50)
		})
	</script>

	
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['Thông tin giao hàng'] ?></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form>
		          <div class="form-group">
		            <label for="recipient-name" class="col-form-label"></label>
		            <input type="text" class="form-control" id="hoten" placeholder="<?php echo $lang['Họ tên'] ?>">
		          </div>
		          <div class="form-group">
		            <label for="recipient-name" class="col-form-label"></label>
		            <input type="text" class="form-control" id="email" placeholder="Email">
		          </div>
		          <div class="form-group">
		            <label for="recipient-name" class="col-form-label"></label>
		            <input type="text" class="form-control" id="sodienthoai" placeholder="<?php echo $lang['Số điện thoại'] ?>">
		          </div>
		          <div class="form-group">
		            <label for="recipient-name" class="col-form-label"></label>
		            <input type="text" class="form-control" id="diachi" placeholder="<?php echo $lang['Địa chỉ'] ?>">
		          </div>
		          <div class="form-group">
		            <label for="message-text" class="col-form-label"></label>
		            <textarea class="form-control" id="ghichu" placeholder="<?php echo $lang['Ghi chú'] ?>"></textarea>
		          </div>
		        </form>
		      </div>
		      <div class="modal-footer">
		      	<button type="submit" class="btn btn-primary" onclick="Order(<?php echo $idkh; ?>)" style="background: #338dbc !important;"><?php echo $lang['Hoàn tất đơn hàng'] ?></button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['Hủy'] ?></button>
		      </div>
		    </div>
		  </div>
		</div>


	<script type="text/javascript">
	function showOrder(){
		$("#exampleModal").modal();
	}
	</script>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="sweetalert2.min.js"></script>

	<script src="owlcarousel/owl.carousel.min.js"></script>

	
	<script src="/script.js"></script>

	
</body>
</html>




