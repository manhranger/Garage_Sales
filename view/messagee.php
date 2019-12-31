<?php
	error_reporting(0);
	include"../config.inc.php";
	include"../checkLogin.php";/*Kiểm tra đăng nhập*/
	$_SESSION['namePage']="messagee";
	mysqli_set_charset("utf8");
	$query="SELECT * FROM `messages` WHERE `texter1` = '".$_SESSION["username"]."' or `texter2` = '".$_SESSION["username"]."' ORDER BY `Id_Stt` DESC";
	$mySQL=mysqli_query($connect,$query);
	while($conversations = mysqli_fetch_assoc($mySQL)){
		if($conversations["texter1"] == $_SESSION["username"]){
			$_SESSION["username2"] = $conversations["texter2"];
			break;
		}else{
			$_SESSION["username2"] = $conversations["texter1"];
			break;
		}
	}
	if(isset($_GET["texter2"])){
		$_SESSION["username2"] = $_GET["texter2"];
	}	
	$dk='reLoadAll("'.$_SESSION["username2"].'")';
?>
<!doctype html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Tin Nhắn</title>

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
    
    <!--For message-->
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="../Bootstraps/assets/css/message.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- custom scrollbar plugin -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    
  </head>

<body style="background-color:#CCC" onLoad='<?php echo $dk; ?>'>
    <?php
		include "masterPage/headerr.php";
	?>

    <div class="container-product" style="padding-top:0px;margin-bottom:5px;">
          <div class="main-section">
                <div class="head-section">
                    <div class="headRight-section">
                        <div class="headRight-sub">
                            <h3 id="email"></h3>
                            <small>Tham gia tin nhắn</small>
                        </div>
                    </div>
                </div>
                <div class="body-section">
                    <div class="left-section mCustomScrollbar list-messenger" id="myListTexter" data-mcs-theme="minimal-dark">
                    </div>
                    <div class="right-section">
                        <div class="message mCustomScrollbar" id="myFormMessage" data-mcs-theme="minimal-dark" style="overflow:auto !important;height: 390px;">
                        </div>
                        <div class="right-section-bottom">
                            <form>
                                <textarea name="moreinfor" name="msg" id="msg" class="form-control is-invalid comment text-input" placeholder="Nhập tin nhắn .."></textarea>
                                <button type="button" onClick="sendMessage()" class="search input-group-text ms08" style="border: 1px solid #E6E6E6;float:left">Gửi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <a onClick="on()">on
            </a>
            <a onClick="off()">off
            </a>
    </div><!-- /.container -->
	<script>
		isMessageLoad=true;wantToLoad=false;scrollAreally=false;email2="";
		function reLoadAll(texter2){
			if(wantToLoad==false){
				email2 = texter2;
				wantToLoad=true;
			}
			openFormMessage(email2);
			listTexter();
			setTimeout(reLoadAll,1000);
		}
        function openFormMessage(email2) {
				document.getElementById('email').innerText = email2;
				if(isMessageLoad==true){
					var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							  document.getElementById("myFormMessage").innerHTML = this.responseText;
						}
					};
					xhttp.open("POST", "messageLoader.php?texter2=" + email2, true);
					xhttp.send();
				}
		}
		function scrollToEnd(texter2){
			email2=texter2;
			openFormMessage(email2);
			var scrollbar = document.getElementById("myFormMessage");
			scrollbar.scrollTo(0,10000);
		}
		function listTexter(){
			if(isMessageLoad==true){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						  document.getElementById("myListTexter").innerHTML = this.responseText;
					}
				};
				xhttp.open("POST", "messageLoader.php?listTexter=1", true);
				xhttp.send();
				//setTimeout(listTexter,3000);//load mess every Milisecond.
			}
		}
		function justListTexter(){
			listTexter();
			//setTimeout(justListTexter,1000);
		}
		function sendMessage(){
				text=document.getElementById("msg").value;
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						  document.getElementById("myFormMessage").innerHTML = this.responseText;
					}
				};
				xhttp.open("POST", "messageLoader.php?text=" + text, true);
				xhttp.send();
				/*var scrollbar = document.getElementById("myFormMessage");
				scrollbar.scrollTo(0,10000);*/
		}
        function off() {
			isMessageLoad=false;
        }
		function on() {
			isMessageLoad=true;
        }
    </script>
</body>
<footer>
  	<?php
		include "masterPage/footerr.php";
	?>
</footer>
</html>
