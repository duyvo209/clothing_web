 <?php 
    include ("connect.php");

    include ("config.php");
    $newproducts = "SELECT * FROM sanpham ORDER BY sanpham.id DESC LIMIT 6";
    $result = $connect->query($newproducts);
   
  ?>

 <!DOCTYPE html>
 <html>
 <head>
    <link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">
 </head>
 <body>
    <div class="homepage">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 65%;">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/br.jpg" class="d-block w-100" alt="..." style="height: 800px;">
        </div>
        <div class="carousel-item">
          <img src="/private.jpg" class="d-block w-100" alt="..." style="height: 800px;">
        </div>
        <div class="carousel-item">
          <img src="/decao.jpg" class="d-block w-100" alt="..." style="height: 800px;">
        </div>
      </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

    <div>
      <p style="text-align: center; letter-spacing: 15px; font-size: 40px; text-transform: uppercase; margin-top: 80px; color: grey;font-family: 'Quicksand', sans-serif;"><?php echo $lang['Sản Phẩm Mới'] ?></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>

    <script>
      $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            responsive:{
              0:{
                  items:1
              },
              600:{
                  items:2
              },
              1000:{
                  items:4
              }
            }
        });
        $('.owl-carousel').on('mousewheel', '.owl-stage', function (e) {
        if (e.originalEvent.wheelDelta > 0) {
          $('.owl-carousel').trigger('prev.owl');
        }else{
          $('.owl-carousel').trigger('next.owl');
        }
        e.preventDefault();
        });
      });
    </script>
    <div class="newproducts" style="margin-top: -30px; ">
      <div class="owl-carousel">
        <?php while($row=$result->fetch_assoc()) { ?>
          <div class="item">
           <ul class="newproducts_owl">
            <li><a href="project.php?view=detail&id=<?php echo $row['id'];?>"><img style="width: 230px; height: 230px" src="<?php echo $row['picture'];?>"></a> 
            <?php
              echo $row['name'] . '<br>' .number_format($row['price'],3,".",".")." "."đ";
             ?>
            </li>
            </ul>
          </div>
        <?php } ?>
    </div>

 </body>
 </html>
