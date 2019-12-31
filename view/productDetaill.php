<?php
		error_reporting(0);
        include"../config.inc.php";
		$_SESSION['namePage']="productDetaill";
		$_SESSION["idConvers"]=1;
		include"../checklogin.php";
		mysqli_set_charset("utf8");
		if (isset($_GET["id_Product_Detail"])){
			$mySQL=mysqli_query($connect, "SELECT * FROM user inner join product where  user.username=product.username and 		product.productID=".$_GET["id_Product_Detail"]);
			$getValue=mysqli_fetch_assoc($mySQL);
		    $usernameSeller=$getValue["username"];
		}
		$mySQL='SELECT * FROM `conversation` inner join `messages` WHERE `Username_Buyer`="'.$_SESSION["username"].'" and `Username_Seller`="'.$usernameSeller.'" and `conversation`.`Id_Convers` = `messages`.`Id_Convers`';
		while($idConvers = mysqli_fetch_assoc(mysqli_query($connect,$mySQL)))
		{
			$_SESSION["idConvers"]=$idConvers["Id_Convers"];break;
		}
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

    <title>Chi tiết sản phẩm</title>

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
    	<div class="starter-template">
              <form method="post" action="messagee.php?texter2=<?php echo $getValue["username"]; ?>&name2=<?php echo $getValue["name"]; ?>">
                  <div class="form-row" style="text-align:left;">
                    <div class="form-group col-md-7" style="padding:0px;background-color:#333">
                      <div class="detailProductImages" style="display:inline-block;">
                      <?php echo'<img itemprop="image" class="img-responsive vertical-align-p" src="'.$getValue["Picture"].'" style="width:99.9%;height:80%;">'
                      ?>
                </div>
                      </div>
                    </div>
                    <div class="form-group col-md-5" style="padding:0px;">
                       <div class="detailProductImages">
                       	<h2 style="text-align:center;margin-top:0px;">Thông tin người bán</h2>
                        <div class="form-group col-md-7 col-md-7-sofm" style="height:50px;padding-left:10px">
                          <img src="../Images/Avatars/default.jpg" width="50" height="50" style="float:left;border-radius:100%;">
                          <div style="float:left;width:72%;" class="vertical-align-p"><?php echo $getValue["name"] ?></div>
                        </div>
                        <div class="form-group col-md-5 col-md-5-sofm" style="padding-right:0px">
                           <button type="button" class="btn btn-primary" style="margin-top:5px;width:100%;padding-left:5px;padding-right:5px">Xem thông tin</button>
                        </div>
                        <div class="form-group div-sdt" style="padding-right:0px;width:100%">
                            <button type="button" class="btn btn-success" style="height:50px;width:100%;margin-bottom:5px;font-weight:750;cursor:default">
                                <i class="fas fa-phone-alt" aria-hidden="true"></i> <?php echo $getValue["Cell"]; ?>
                            </button>
                            <button type="submit" class="btn btn-success" style="height:50px;width:100%;margin-bottom:5px;font-weight:750;cursor:default">
                                 <i class="fas fa-phone-alt" aria-hidden="true"></i> Chat với người bán
                            </button>
                        </div>
                       </div>
                    </div>
                  </div>
        	  </form>
              <form class="starter-template" style="padding-top:5px">
              	  <div class="form-row text-left col-md-10" style="margin-bottom:30px;">
                        <h3><?php echo $getValue["Title"];?></h3>
                        <p style="line-height: 1.5;"><?php echo $getValue["Moreinfor"]; ?></p>
                  </div>
                  <div class=" form-group row text-left">
                        <div class="col-md-6" style="height:50px">
                            <img src="https://static.chotot.com/storage/icons/logos/ad-param/mobile_brand.png" width="50" height="50" alt="icon" style="float:left;margin-left:5px;">
                            <p class="vertical-align-p" style="float:left;margin-left:15px;"><strong>Hãng:</strong> <?php echo $getValue["Productname"];
                            ?></p>
                        </div>
                        <div class="col-md-6" style="height:50px">
                            <img src="https://static.chotot.com/storage/icons/logos/ad-param/mobile_model.png" width="50" height="50" alt="icon" style="float:left;margin-left:5px;">
                            <p class="vertical-align-p" style="float:left;margin-left:15px;"><strong>Xuất xứ: </strong><?php echo $getValue["Manufacturer"];?></p>
                        </div>
                  </div>
                  <div class=" form-group row text-left">
                        <div class="col-md-6" style="height:50px">
                            <img src="https://static.chotot.com/storage/icons/logos/ad-param/elt_condition.png" width="50" height="50" alt="icon" style="float:left;margin-left:5px;">
                            <p class="vertical-align-p" style="float:left;margin-left:15px;"><strong>Tình trạng:</strong> <?php echo $getValue["Status"];
                            ?></p>
                        </div>
                        <div class="col-md-6" style="height:50px">
                            <img src="https://static.chotot.com/storage/C2C_CDN_PRODUCTION/6a7bcfb1564aa74c9983381d2e5fd093.png" width="50" height="50" alt="icon" style="float:left;margin-left:5px;">
                            <p class="vertical-align-p" style="float:left;margin-left:15px;"><strong>Địa chỉ:</strong> <?php echo $getValue["Location"];
                            ?></p>
                        </div>
                  </div>
              </form>
              <div class="chat-popup" id="myFormMessage">
                  <form class="form-chat">
                    <h1>Chat</h1>
                	<div style="width:100%;height:200px;border: solid 1px grey;overflow:auto" id="message-box">
                    	ww
                    </div>
                    <label for="msg"><b>Message</b></label>
                    <textarea placeholder="Type message.." name="msg" id="msg" style="min-height:5em;" required></textarea>
                
                    <button type="button" class="btn-send" onClick="sendMessage()">Send</button>
                    <button type="button" class="btn-cancel" onclick="closeFormMessage()">Close</button>
                  </form>
              </div>
        </div>
    </div><!--container-->
	<script>
		isMessageLoad=true;
        function openFormMessage() {
			isMessageLoad=true;
            document.getElementById("myFormMessage").style.display = "block";
			textMessage();
        }
		function textMessage(){
			if(isMessageLoad==true){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						  document.getElementById("message-box").innerHTML = this.responseText;
					}
				};
				xhttp.open("POST", "messageLoader.php", true);
				xhttp.send();
				setTimeout(textMessage,3000);//load mess every Milisecond.
			}
		}
		function sendMessage(){
				text=document.getElementById("msg").value;
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						  document.getElementById("message-box").innerHTML = this.responseText;
					}
				};
				xhttp.open("POST", "messageLoader.php?text=" + text, true);
				xhttp.send();
		}
        function closeFormMessage() {
			isMessageLoad=false;
            document.getElementById("myFormMessage").style.display = "none";
        }
    </script>
  </body>
  <footer>
  	<?php
		include "masterPage/footerr.php";
	?>
  </footer>
</html>
