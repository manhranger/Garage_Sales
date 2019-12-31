<?php
	include"../config.inc.php";
	$_SESSION['namePage']="signinn";
	$error2=false;$error3=false;
	$email="";$password="";$confirmPassword="";$firstName="";$sureName="";$cellPhone="";$address="";
	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
		$email=$_POST['email'];$password=$_POST['password'];$confirmPassword=$_POST['confirmPassword'];
		$firstName=$_POST['firstName'];$sureName=$_POST['sureName'];$cellPhone=$_POST['cellPhone'];$address=$_POST['address'];
		if(strlen($password)<6){
			$error2=true;
		}else if($password!=$confirmPassword){
			$error3=true;
		}else{
			$mySQL = "INSERT INTO `sale`.`user` (`username`, `password`, `name`, `role`, `Cell`, `Address`, `TimeCreateAccount`) VALUES ('".$_POST['email']."', '".$_POST['password']."', '".$_POST['sureName']." ".$_POST['firstName']."', '0', '".$_POST['cellPhone']."', '".$_POST['address']."', '');";
			//echo $mySQL;
			$createAccount = mysqli_query($connect, $mySQL);
			if ($createAccount){
				$email="";$password="";$confirmPassword="";$firstName="";$sureName="";$cellPhone="";$address="";
				echo "<script type='text/javascript'>alert('Tạo tài khoản thành công');</script>";
			}else
				echo "<script type='text/javascript'>alert('Lỗi không xác định!!');</script>";
		}
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

    <title>Đăng kí</title>

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
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

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

    <div class="container-sofm" style="margin-top:0px;padding-top:30px;padding-bottom:50px">

      <form method="post" class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h2 class="form-signin-heading text-center" style="margin-bottom:50px">Đăng Kí</h2>
      
      <div class="form-group" style="padding-right:13px;">
        <label for="email">Địa chỉ email</label>
        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" id="Email" placeholder="Địa chỉ email" required>
      </div>
      <div class="form-group" style="padding-right:13px;">
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" value="<?php echo $password; ?>" class="form-control" id="inputAddress2" placeholder="Nhập mật khẩu.." required>
        <p name="error2" style="color:#F00" class="<?php if($error2 == false){echo "hidden";} ?>">Mật khẩu phải trên 6 kí tự!!</label>
      </div>
      <div class="form-group" style="padding-right:13px;">
        <label for="confirmpassword">Nhập lại mật khẩu</label>
        <input type="password" name="confirmPassword" value="<?php echo $confirmPassword; ?>" class="form-control" id="inputAddress2" placeholder="Nhập lại mật khẩu.." required>
        <p name="error3" style="color:#F00" class="<?php if($error3 == false){echo "hidden";} ?>" >Nhập lại mật khẩu không trùng khớp xin kiểm tra lại</label>
      </div>
      <div class="form-row" style="text-align:left;">
        <div class="form-group col-md-6" style="padding-left:0px;">
          <label for="surename">Họ</label>
          <input type="text" name="sureName" value="<?php echo $sureName; ?>" class="form-control" id="inputEmail4" placeholder="Họ" required>
        </div>
        <div class="form-group col-md-6" style="padding-left:0px;">
          <label for="firstname">Tên</label>
          <input type="text" name="firstName" value="<?php echo $firstName; ?>" class="form-control" id="inputPassword4" placeholder="Tên" required>
        </div>
      </div>
      <div class="form-group" style="padding-right:13px;">
        <label for="cellnumber">Số điện thoại</label>
        <input type="text" name="cellPhone" value="<?php echo $cellPhone; ?>" class="form-control" id="inputAddress2" placeholder="Số điện thoại.." required>
      </div>
      <div class="form-group" style="padding-right:13px;">
        <label for="inputAddress">Địa chỉ</label>
        <input type="text" name="address" value="<?php echo $address ?>" class="form-control" id="inputAddress" placeholder="Địa chỉ.." required>
      </div>
      <button type="submit" name="submit" class="btn btn-primary text-right">Đăng kí ngay!</button>
    </form>

    </div> <!-- /container -->
  </body>
  <footer>
  	<?php
		include "masterPage/footerr.php";
	?>
  </footer>
</html>
