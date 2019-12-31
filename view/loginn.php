<?php
	include"../config.inc.php";
	$_SESSION['namePage']="loginn";
	$mySQL="SELECT * FROM `user`";
	$user='';$pass='';
	$alluser = mysqli_query($connect,$mySQL);
		if(isset($_POST['username'])&& isset($_POST['password']))
	{
		
		$user=$_POST['username'];
		$pass=$_POST['password'];
		while($row = mysqli_fetch_assoc($alluser))  
		{
        	if($user==$row["username"]&& $pass==$row["password"]&& $row["role"]==1)
			{
			    $_SESSION["username"]=$row["username"];
                $_SESSION["user"]=null;
				$_SESSION["admin"]=$row["name"];
				session_write_close();
				header("Location:indexx.php");
				exit();
				break;
			}
			elseif($user==$row["username"]&& $pass==$row["password"]&& $row["role"]==0)
			{
                $_SESSION["username"]=$row["username"];
                $_SESSION["admin"]=null;
                $_SESSION["user"]=$row["name"];
                session_write_close();
				header("Location:indexx.php");
				exit();
				break;
			}
			else
				$_SESSION['notification']='Tài khoản hoặc mật khẩu không đúng,xin kiểm tra lại!!';
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

    <title>Đăng nhập</title>

    <!-- Bootstrap core CSS -->
    <link href="../Bootstraps/assets/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Fixing Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../Bootstraps/assets/css/mystyle.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="Bootstraps/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Bootstraps/assets/css/starter-template.css" rel="stylesheet">
    
    <!-- using icons -->
     <script src="https://kit.fontawesome.com/a076d05399.js"></script>

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
    <script src="Bootstraps/assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="Bootstraps/assets/js/ie10-viewport-bug-workaround.js"></script>
  </head>

  <body>

    <?php
		include "masterPage/headerr.php";
	?>

    <div class="container container-sofm">
      <form method="post" class="form-signin">
        <h2 class="form-signin-heading text-center">Đăng nhập</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Địa chỉ Email" value="<?php echo $user; ?>" name="username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Mật khẩu" value="<?php echo $pass; ?>" name="password" required>
        <div class="checkbox">
          <label style="padding:0px">
            <p>Bạn chưa có tài khoản <a href="signinn.php">đăng kí ngay!!</a></p>
          </label>
        </div>
        <p style="color: red;"><?=@$_SESSION['notification']?></p>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng Nhập</button>
      </form>

    </div> <!-- /container -->
  </body>
  <footer>
  	<?php
		include "masterPage/footerr.php";
	?>
  </footer>
</html>
