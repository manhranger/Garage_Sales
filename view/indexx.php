<?php
session_start();
error_reporting(0);
$_SESSION['namePage']="indexx";
?>
<!doctype html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Trang chủ</title>

    <!-- Bootstrap core CSS -->
    <link href="../Bootstraps/assets/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Fixing Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../Bootstraps/assets/css/mystyle.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../Bootstraps/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../Bootstraps/assets/css/starter-template.css" rel="stylesheet">
    
    <!-- using icons -->
     <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../Bootstraps/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../jquery.min.js"><\/script>')</script>
    <script src="Bootstraps/assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="Bootstraps/assets/js/ie10-viewport-bug-workaround.js"></script>
  </head>

  <body>

    <?php
		include "masterPage/headerr.php";
	?>

    <div class="container-product">
    	<div class="starter-template" style="padding-bottom:5px;padding-top:5px;min-height:200px;">
            <div class="slideshow-container">
            
            <div class="mySlides fade">
              <div class="numbertext">1 / 3</div>
              <img class="img-responsive" src="https://static.chotot.com.vn/storage/admin-centre/buyer_collection_y_homepage_banner/buyer_collection_y_homepage_banner_1570699408275.jpg" style="width:100%">
            </div>
            
            <div class="mySlides fade">
              <div class="numbertext">2 / 3</div>
              <img class="img-responsive" src="https://static.chotot.com.vn/storage/admin-centre/buyer_collection_y_homepage_banner/buyer_collection_y_homepage_banner_1571887346831.jpg" style="width:100%">
            </div>
            
            <div class="mySlides fade">
              <div class="numbertext">3 / 3</div>
              <img class="img-responsive" src="https://static.chotot.com.vn/storage/admin-centre/buyer_collection_y_homepage_banner/buyer_collection_y_homepage_banner_1570788031335.jpg" style="width:100%">
            </div>
            </div>
            <div style="text-align:center;padding:10px">
              <span class="dot" onclick="currentSlide(1)"></span> 
              <span class="dot" onclick="currentSlide(2)"></span> 
              <span class="dot" onclick="currentSlide(3)"></span> 
            </div>
   	    </div>
        <div class="starter-template <?php if($_SESSION["user"]!=null || $_SESSION["admin"]!=null){ echo' hidden';} ?>" style="min-height:200px;height:auto;padding-top:5px;padding-bottom:5px">
       	  <div class="form-row" style="text-align:center;">
            <div class="form-group col-md-6" style="padding-left:0px;">
              <img src="../Images/Categories/device (2).jpg" width="420" height="179" class="hiding-img">	
            </div>
            <div class="form-group col-md-6 text-center vertical-align">
              <p>Đăng nhập để không bỏ lỡ món hời giá tốt!</p>
			  <button type="button" class="btn btn-warning" style="width:75%;">Đăng nhập</button><br>
			  <a href="registerr.php">Đăng kí ngay</a>
            </div>
          </div>
   	    </div>
        <div class="starter-template" style="margin-bottom:5px;min-height: 550px;background-color:#FFF;">
		  <h1>Danh Mục</h1>
          <div class="form-row" style="text-align:left;">
            <div class="form-group col-md-6">
              <a href="productt.php?category=1" class="none-decoration">
              	<img itemprop="image" class="img-responsive img-category" src="../Images/Categories/tablet (2).jpg">
              	<div class="background_category"><span>Máy Tính Bảng</span>
                </div>
              </a>
            </div>
            <div class="form-group col-md-6">
              <a href="productt.php?category=2" class="none-decoration">
              	<img itemprop="image" class="img-responsive img-category" src="../Images/Categories/phone (2).jpg">
              	<div class="background_category"><span>Điện Thoại</span>
                </div>
              </a>
            </div>
          </div>
          <div class="form-row" style="text-align:left;">
            <div class="form-group col-md-6">
              <a href="productt.php?category=3">
              	<img itemprop="image" class="img-responsive img-category" src="../Images/Categories/laptop (2).jpg">
              	<div class="background_category"><span>Laptop</span>
                </div>
              </a>
            </div>
            <div class="form-group col-md-6">
              <a href="productt.php?category=4" class="none-decoration">
              	<img itemprop="image" class="img-responsive img-category" src="../Images/Categories/camera (2).jpg" >
              	<div class="background_category"><span>Máy Ảnh,Máy Quay</span>
                </div>
              </a>
            </div>
          </div>
          <div class="form-row" style="text-align:left;">
            <div class="form-group col-md-6">
              <a href="productt.php?category=5" class="none-decoration">
              	<img itemprop="image" class="img-responsive img-category" src="../Images/Categories/acessory (2).jpg" >
              	<div class="background_category"><span>Phụ Kiện</span>
                </div>
              </a>
            </div>
            <div class="form-group col-md-6">
              <a href="productt.php?category=6" class="none-decoration">
              	<img itemprop="image" class="img-responsive img-category" src="../Images/Categories/ram (2).jpg" >
              	<div class="background_category"><span>Linh Kiện</span>
                </div>
              </a>
            </div>
          </div>
          <div class="form-row" style="text-align:left;">
            <div class="form-group col-md-6">
              <a href="productt.php?category=7" class="none-decoration">
              	<img itemprop="image" class="img-responsive img-category" src="../Images/Categories/tv (2).jpg" >
              	<div class="background_category"><span>Tivi,Loa</span>
                </div>
              </a>
            </div>
            <div class="form-group col-md-6">
              <a href="productt.php?category=8" class="none-decoration">
              	<img itemprop="image" class="img-responsive img-category" src="../Images/Categories/watch (2).jpg" >
              	<div class="background_category"><span>Đồng Hồ</span>
                </div>
              </a>
            </div>
          </div>
	   </div>
    </div><!-- /.container -->
	<script>
		var slideIndex = 1;
		showSlides(slideIndex);
		function plusSlides(n) {
		  showSlides(slideIndex += n);
		}
		function currentSlide(n) {
		  showSlides(slideIndex = n);
		}
		function showSlides(n) {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");
		  var dots = document.getElementsByClassName("dot");
		  if (n > slides.length) {slideIndex = 1}    
		  if (n < 1) {slideIndex = slides.length}
		  for (i = 0; i < slides.length; i++) {
			  slides[i].style.display = "none";  
		  }
		  for (i = 0; i < dots.length; i++) {
			  dots[i].className = dots[i].className.replace(" active", "");
		  }
		  slides[slideIndex-1].style.display = "block";  
		  dots[slideIndex-1].className += " active";
		}
		autoSlides();
		function autoSlides() {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");
		  var dots = document.getElementsByClassName("dot");
		  for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";  
		  }
		  slideIndex++;
		  if (slideIndex > slides.length) {slideIndex = 1}    
		  for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
		  }
	  slides[slideIndex-1].style.display = "block";  
	  dots[slideIndex-1].className += " active";
	  setTimeout(autoSlides, 3000); // Change image every 3 seconds
	}
	</script>
</body>
<footer>
  	<?php
		include "masterPage/footerr.php";
	?>
</footer>
</html>
