<?php
	include"../config.inc.php";
	include"../checkLogin.php";/*Kiểm tra đăng nhập*/
	$_SESSION['namePage']="profilee";
    if (isset($_GET["id_Product_Delete"])){
        mysqli_query($connect, "DELETE FROM `product` WHERE ProductID=".$_GET["id_Product_Delete"]);
        header("Location:profilee.php");
    }
	$mySQL=mysqli_query($connect, "SELECT * FROM user where  user.username ='".$_SESSION["username"]."'");
	$getValue=mysqli_fetch_assoc($mySQL);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Thông tin cá nhân</title>

    <!-- Bootstrap core CSS -->
    <link href="../Bootstraps/assets/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Fixing Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../Bootstraps/assets/css/mystyle.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../Bootstraps/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    
    <!-- using icons -->
     <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Custom styles for this template -->
    <link href="../Bootstraps/assets/css/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="Bootstraps/assets/js/ie-emulation-modes-warning.js"></script>

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
    <script src="../Bootstraps/assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../Bootstraps/assets/js/ie10-viewport-bug-workaround.js"></script>
    
    <!--javascript for tabs-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  </head>

  <body>

    <?php
		include "masterPage/headerr.php";
	?>

    <div class="container-product" style="margin-bottom:5px">
    	<div class="starter-template" style="padding:0px;padding-top:15px;min-height:200px;">
              <form>
                  <div class="form-row" style="text-align:left;">
                    <div class="form-group col-md-5" style="padding:0px;">
                      <div class="detailProductImages product-line" style="padding-left:10%;height:200px;border:0px;">
                          <h2>Thông tin cá nhân</h2>
                          <img src="../Images/Avatars/default.jpg" width="70" height="70" style="float:left;border-radius:100px;">
                          <div style="float:left;padding-left:10px;font-size:18px;width:75%">
                          		<strong><?php echo $getValue["name"] ?></strong>
                                <p style="font-size:12px;margin-bottom:0px;">Số sản phẩm đã bán: <strong>12</strong></p>
                                <p style="font-size:12px;margin-bottom:0px;">Số sản phẩm đã đăng: <strong>24</strong></p>
                                <p style="font-size:12px;">Số sản phẩm đã hủy: <strong>2</strong></p>
                          </div>
                      </div>
                    </div>
                    <div class="form-group col-md-7" style="padding-left:10%">
                       <div class="detailProductImages" style="height:200px;">
                      	   <h2>Thông tin chi tiết</h2>
                           <div class="form-group col-md-10" style="display: table;margin: 0 auto;">
                                    <p><i class="far fa-calendar-alt"></i> Ngày tham gia: <strong><?php echo $getValue["TimeCreateAccount"]."." ?></strong></p>
                                    <p ><i class="fas fa-map-marked-alt"></i> Địa chỉ: <strong><?php echo $getValue["Address"]."." ?></strong></p>
                                    <p><i class="fas fa-phone-alt" aria-hidden="true"></i> Số điện thoại: <strong><?php echo $getValue["Cell"]."." ?></strong></p>
                           </div>
                       </div>
                    </div>
                  </div>
        	  </form>
        </div>
        <div class="starter-template" id="tabs" style="min-height:230px;">
              <div class="ms02">
              	<ul style="list-style-type:none;padding:0;">
                	<li class="ms01"><a href="#tabs-1" id="tab1" style="text-decoration:none;">
                      <div class="btn tablink btn-tab ms01-active" id="text1" style="border-right:0px;">Sản phẩm bán</div>
                    </a></li>
                    <li class="ms01"><a href="#tabs-2" id="tab2"  style="text-decoration:none">
                      <div class="btn btn-tab tablink" id="text2" style="border-right:0px;">Sản phẩm mua</div>
                    </a></li>
                </ul>
                <script language="javascript">
					var tab1 = document.getElementById("tab1");
					var text1 = document.getElementById("text1");
					tab1.onclick = function () {
					  text1.style.fontSize = "20px";
					  text1.style.color = "#006";
					  text2.style.fontSize = "18px";
					  text2.style.color = "#337ab7";
					};
					tab2.onclick = function () {
					  text2.style.fontSize = "20px";
					  text2.style.color = "#006";
					  text1.style.fontSize = "18px";
					  text1.style.color = "#337ab7";
					};
				</script>
              </div>
          <div id="tabs-1">
          	<div class="row" style="text-align:left;">
            	<?php
					$mySQL=mysqli_query($connect, "SELECT * FROM `product` inner join `user` where `user`.`Username` = `Product`.`Username` and `Product`.`Username`= '".$_SESSION["username"]."'");
					while($getValue = mysqli_fetch_assoc($mySQL)) {
						if ($getValue["Sole"] == 1)
							$sole = "da ban";
						else
							$sole = "chua ban";
						echo '
						<div class="form-row" style="text-align:left;padding-left:30px;padding-right:50px">
							<div class="form-group col-md-10 line-bottom line-bottom-left" style="padding-left:0px;padding-bottom:20px;margin-bottom:0px">
								<div class="col">
								  <div class="imageproduct"><img src="'.$getValue["Picture"].'" width="150" height="100"></div>
								  <h3 class="font-style" style="margin-left:5px;padding-bottom:15px;font-weight:550">'.$getValue["Title"].'</h3>
								  <p class="showcode" style="margin-left:5px;color: #d0021b;font-size: 13px;font-weight: 900;">
									<script>
										var a="'.$getValue["Price"].'";
										a = a.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
										document.write(a);
									</script> đ
								  </p>
								  <div>
									<img src="../Images/Avatars/default.jpg" style="float:left;margin-right:5px;border-radius:100%;" width="20" height="20">
									<p style="margin-left:5px;font-size:15px;font-style:normal">'.$getValue["name"].'</p>
								  </div>
								</div>
							</div>
							<div class="form-group col-md-2 ms03 text-right line-bottom">
								<a href="productDetaill.php?id_Product_Detail='.$getValue["ProductID"].'">
								<input class="btn-blue-sofm" type="submit" value="Xem chi tiết" name="detail"/>
								</a>
								<!-- Button trigger modal -->	
								<button type="button" class="btn-red-sofm" data-toggle="modal" data-target="#exampleModal'.$getValue["ProductID"].'"/>
									Xóa sản phẩm
								</button>	
								<!-- Modal -->
								<div class="modal fade" id="exampleModal'.$getValue["ProductID"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-body text-center">
										<h3>Bạn có chắc muốn xóa??</h3>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-lg" data-dismiss="modal">Không</button>
										<a href="profilee.php?id_Product_Delete='.$getValue["ProductID"].'">
											<input type="submit" value="Có,tôi muốn xóa nó" name="delete" class="btn btn-lg btn-danger">
										</a>
									  </div>
									</div>
								  </div>
								</div>
							</div>
						</div>
						';
						
					}
				?>
        	</div>
          </div>
          <div id="tabs-2">
          	<div class="row" style="text-align:left;padding-left:30px;">
            	<div class="form-row" style="text-align:left;">
                	<div class="form-group col-md-10">
                        <div class="col">
                          <div class="imageproduct"></div>
                          <h3 style="margin-left:5px;">Column 4</h3>
                          <p style="margin-left:5px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                          <p style="margin-left:5px;">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                        </div>
                    </div>
                   <div class="form-group col-md-2 ms03 text-right">
                    	<button class="btn-blue-sofm" style="margin-bottom:5px;" type="button"/>
                                Xem chi tiết
                        </button>
                    	<button class="btn-red-sofm" type="button"/>
                                Xóa sản phẩm
                        </button>
                    </div>
                </div>
                <div class="form-row" style="text-align:left;">
                	<div class="form-group col-md-10">
                        <div class="col">
                          <div class="imageproduct"></div>
                          <h3 style="margin-left:5px;">Column 5</h3>
                          <p style="margin-left:5px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                          <p style="margin-left:5px;">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                        </div>
                    </div>
                    <div class="form-group col-md-2 ms03 text-right">
                    	<button class="btn-blue-sofm" style="margin-bottom:5px;" type="button"/>
                                Xem chi tiết
                        </button>
                    	<button class="btn-red-sofm" type="button"/>
                                Xóa sản phẩm
                        </button>
                    </div>
                </div>
                <div class="form-row" style="text-align:left;">
                	<div class="form-group col-md-10">
                        <div class="col">
                          <div class="imageproduct"></div>
                          <h3 style="margin-left:5px;">Column 6</h3>
                          <p style="margin-left:5px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                          <p style="margin-left:5px;">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                        </div>
                    </div>
                    <div class="form-group col-md-2 ms03 text-right">
                    	<button class="btn-blue-sofm" style="margin-bottom:5px;" type="button"/>
                                Xem chi tiết
                        </button>
                    	<button class="btn-red-sofm" type="button"/>
                                Xóa sản phẩm
                        </button>
                    </div>
                </div>
        	</div>
          </div>
        </div>
    </div><!-- /.container -->
    <!--Khu Vực Script-->
	<script>
	  $( function() {
		$( "#tabs" ).tabs();
	  } );
	</script>
    <!--Khu Vực Script-->
  </body>
  <footer>
  	<?php
		include "masterPage/footerr.php";
	?>
  </footer>
</html>
