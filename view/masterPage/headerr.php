<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src="../Images/Icons/garage_sales_200x200.png" class="logoImage" width="50"/>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-sofm" style="padding-left:5px;">
          <?php
		  	if(!isset($_SESSION['namePage'])){
				echo'
					<li><a href="indexx.php">Trang chủ</a></li>
					<li><a href="productt.php">Sản phẩm</a></li>
					<li><a href="productSelll.php">Đăng bán</a></li>
					<li><a style="cursor: pointer;" href="messagee.php">Tin nhắn</a></li>	
				';
			}else if($_SESSION['namePage']=="indexx"){
				echo'
					<li class="active"><a href="indexx.php">Trang chủ</a></li>
					<li><a href="productt.php">Sản phẩm</a></li>
					<li><a href="productSelll.php">Đăng bán</a></li>	
					<li><a style="cursor: pointer;" href="messagee.php">Tin nhắn</a></li>
				';
			}else if($_SESSION['namePage']=="productSelll"){
				echo'
					<li><a href="indexx.php">Trang chủ</a></li>
					<li><a href="productt.php">Sản phẩm</a></li>
					<li class="active"><a href="productSelll.php">Đăng bán</a></li>	
					<li><a style="cursor: pointer;" href="messagee.php">Tin nhắn</a></li>
				';
			}else if($_SESSION['namePage']=="productt"){
				echo'
					<li><a href="indexx.php">Trang chủ</a></li>
					<li class="active"><a href="productt.php">Sản phẩm</a></li>
					<li><a href="productSelll.php">Đăng bán</a></li>
					<li><a style="cursor: pointer;" href="messagee.php">Tin nhắn</a></li>	
				';
			}elseif($_SESSION['namePage']=="messagee"){
				echo'
					<li><a href="indexx.php">Trang chủ</a></li>
					<li><a href="productt.php">Sản phẩm</a></li>
					<li><a href="productSelll.php">Đăng bán</a></li>
					<li class="active"><a style="cursor: pointer;" href="messagee.php">Tin nhắn</a></li>
				';
			}else{
				echo'
					<li><a href="indexx.php">Trang chủ</a></li>
					<li><a href="productt.php">Sản phẩm</a></li>
					<li><a href="productSelll.php">Đăng bán</a></li>
					<li><a style="cursor: pointer;" href="messagee.php">Tin nhắn</a></li>
				';
			}
            if(isset($_SESSION["admin"]) || isset($_SESSION["user"])){
                echo '
					<li class="login-reponsive" style="padding:0px;">
						<div class="dropdown">
						  <button class="dropbtn">
							<i class="fas fa-user-circle" style="font-size:22px;float:left;"></i>
							<p style="float:left;">&nbsp;&nbsp;'.@$_SESSION["admin"].@$_SESSION["user"].'&nbsp;&nbsp;</p>
							<i class="fas fa-caret-down"></i>
						  </button>
						  <div class="dropdown-content text-center">
						  <a href="profilee.php">Xem thông tin cá nhân</a>
						  <a href="logout.php">Đăng Xuất</a>
						  </div>
						</div>
					</li>
				';
			}else{
				echo'
				<li class="login-reponsive" style="padding:0px;">
					<a href="loginn.php"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
				</li>
				';
			}
            ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>