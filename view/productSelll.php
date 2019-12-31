<?php
		error_reporting(0);
        include"../config.inc.php";
		include"../checkLogin.php";/*Kiểm tra đăng nhập*/
		$_SESSION['namePage']="productSelll";
		session_start();
        if(isset($_POST["add"])) {
            if ($_POST["tinh"] != null && $_POST["price"] != null && $_POST["hang"] != null)
            {
                $username = $_SESSION["username"];
                $now = date('d/m/Y');
                $nameproduct = $_POST["hang"];
                $price = $_POST["price"];$price = str_replace('.','',$price);
                $manufacturer = $_POST["xuatxu"];
                $infor = htmlspecialchars($_POST['moreinfor']);
                $status = $_POST["tinhtrang"];
                $local = $_POST["huyen"].', '.$_POST["tinh"];
                $style = $_POST["loaisanpham"];
				$title = $_POST["title"];
                $target_file=null;
				
				$target_dir = "../Images/Products/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                      /*echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";*/
                }else{
                      echo "Sorry, there was an error uploading your file.";
                }
				
                if (!isset($_GET["ID"]))
                {
                    $addproduct = "INSERT INTO `product` ( `Username`, `Productname`, `Typename`, `Price`, `Manufacturer`, `Status`, `Moreinfor`, `Timestart`, `Picture`, `Location`, `Title`, `Sole`)".
                        " VALUES ('" . $username . "','" . $nameproduct . "','" . $style . "','" . $price . "'" .
                        ",'" . $manufacturer . "','" . $status . "','" . $infor . "','" . $now . "','" . $target_file . "','".$local."','".$title."',0)";
					//echo $addproduct;
                    $notice = mysqli_query($connect, $addproduct);
                    if ($notice)
                        echo "<script type='text/javascript'>alert('Thêm Sản phẩm thành công');</script>";
                    else
                        echo "<script type='text/javascript'>alert('Lỗi không xác định!!');</script>";

                }
                else
                {
                    $update="UPDATE product SET 
                        'Username'='".$username."',".
                        "'Productname'='".$nameproduct."',".
                        "'Typename'='".$style."','Price'='".$price."','Manufacturer'='".$manufacturer."','Status'='".$status."',".
                        "'Moreinfor'='".$infor."',picture'='".$target_file."','location'='".$local."' WHERE 'ProductID'=".$_GET['ID'];
                    $notice = mysqli_query($connect, $update);
                    if ($notice)
                        echo "<script type='text/javascript'>alert('sua thong tin thanh cong');</script>";

                }

            }
            else
                echo "<script type='text/javascript'>alert('dien day du de them san pham');</script>";
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

    <title>Thêm sản phẩm</title>

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

  <body style="background-color:#FFF">

    <?php
		include "masterPage/headerr.php";
	?>

    <div class="container-sofm">
    	<div class="starter-template" style="background-color:white;">
                 <div>
                    <a href="#" onclick="checkVal(event, 'Buoc1');" style="text-decoration:none">
                      <div class="btn tablink btn-tab highlight-color" style="border-right:0px;">Bước 1</div>
                    </a>
                    <a href="#" onclick="checkVal(event, 'Buoc2');" style="text-decoration:none">
                      <div class="btn tablink btn-tab" style="border-right:0px;">Bước 2</div>
                    </a>
                    <a href="#" onclick="checkVal(event, 'Buoc3');" style="text-decoration:none">
                      <div class="btn tablink btn-tab">Bước 3</div>
                    </a>
                 </div>
          <form name="form1" method="post" enctype="multipart/form-data">
          <div id="Buoc1" class="city showEffect">
            <h3 style="text-align:center;"> Chọn danh mục </h3>
                      <div class="form-row" style="text-align:left;">
                            <div class="form-group">
                                <label for="inputAddress" style="margin-left:10px;margin-top:20px">Loại sản phẩm</label>
                                <select id="loaisanpham" name="loaisanpham" onChange="filterHang()" id="style" class="input_option" required="required">
                                  <option value="-1" disabled selected="">Chọn loại sản phẩm..</option>
                                  <option id="Điện thoại" value="Điện thoại">Điện Thoại</option>
                                  <option id="Máy tính bảng" value="Máy tính bảng"> Máy tính bảng</option>
                                  <option id="Laptop" value="Laptop">Laptop</option>
                                  <option id="Máy tính để bàn" value="Máy tính để bàn">Máy tính để bàn</option>
                                  <option id="Máy ảnh,Máy quay" value="Máy ảnh,Máy quay">Máy ảnh,máy quay</option>
                                  <option id="Tivi,Loa" value="Tivi,Loa">Tivi,loa</option>
                                  <option id="Đồng hồ" value="Đồng hồ">Đồng hồ</option>
                                  <option id="Linh kiện" value="Linh kiện">Linh kiện</option>
                                  <option id="Phụ kiện" value="Phụ kiện">Phụ kiện</option>
                                </select>
                                <label for="error" id="labelError1" style="margin-left:10px;margin-top:10px;color:#C03;width:100%;display:none">Bạn chưa chọn sản phẩm</label>
                            </div>
                            <div class="form-group" id="hang">
                                <label for="inputAddress" style="margin-left:10px;margin-top:10px">Hãng</label>
                                <select class="input_option">
                                  <option value="-1" disabled selected="">Bạn chưa chọn loại sản phẩm..</option>
                                </select>
                                <label for="error" id="labelError2" style="margin-left:10px;margin-top:10px;color:#C03;width:100%;display:none">Bạn chưa chọn hãng</label>
                            </div>	
                            <div class="form-group">
                                <label for="inputAddress" style="margin-left:10px;margin-top:10px">Xuất xứ</label>
                                
                                <select name="xuatxu" class="input_option">
                                  <option value="-1" disabled selected="">Chọn xuất xứ..</option>
                                  <option value="Trung Quốc">Trung Quốc</option>
                                  <option value="Việt Nam">Việt Nam</option>
                                  <option value="Nhật Bản">Nhật Bản</option>
                                  <option value="Hàn Quốc">Hàn Quốc</option>
                                  <option value"Đài Loan">Đài Loan</option>
                                  <option value="Singapore">Singapore</option>
                                </select>
                                <label for="error" id="labelError3" style="margin-left:10px;margin-top:10px;color:#C03;width:100%;display:none">Bạn chưa chọn xuất xứ</label>
                            </div>	
 
                            <button type="button" class="btn btn-dark-sofm arrayButton btn-lg" id="btn_tab1" style="margin:15px;margin-right:0px;;float:right;"/>Bước kế tiếp <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
          </div>
        
          <div id="Buoc2" class="city hiding showEffect">
            <h3 style="text-align:center;"> Chọn khu vực giao dịch </h3>
                        <div class="form-row" style="text-align:left;">
                            <div class="form-group">
                                <label for="inputAddress" style="margin-left:10px;margin-top:20px">Khu vực tỉnh</label>
                                
                                <select id="tinh" name="tinh" onChange="filterQuanHuyen()" class="input_option" required="required">
                                  <option value="-1" disabled="" selected="">Chọn Tỉnh..</option>
                                  <option id="Bình Dương" value="Bình Dương">Bình Dương</option>
                                  <option id="TP Hồ Chí Minh" value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
                                  <option id="Hà Nội" value="Hà Nội">Hà Nội</option>
                                  <option id="Đà Nẵng" value="Đà Nẵng">Đà Nẵng</option>
                                </select>
                                <label for="error" id="labelError4" style="margin-left:10px;margin-top:10px;color:#C03;width:100%;display:none">Bạn chưa chọn tỉnh thành</label>
                            </div>
                            <div class="form-group" id="quan">
                                <label for="inputAddress" style="margin-left:10px;margin-top:10px">Quận,Huyện,Thị Xã</label>
                                <select name="huyen" class="input_option" required="required">
                                  <option value="-1" disabled="" selected="">Bạn chưa chọn tỉnh..</option>
                                </select>
                                <label for="error" id="labelError5" style="margin-left:10px;margin-top:10px;color:#C03;width:100%;display:none">Bạn chưa chọn huyện</label>';
                            </div>
                            <button class="btn btn-dark-sofm arrayButton btn-lg" id="btn_tab2" type="button" style="margin:15px;margin-right:0px;;float:right;"/>
                                Bước kế tiếp <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
          </div>
        
          <div id="Buoc3" class="city hiding showEffect">
             <h3 style="text-align:center;"> Thông tin về sản phẩm </h3>
                        <div class="form-row" style="text-align:left;">
                            <div class="form-group">
                                <label for="inputAddress" style="margin-left:10px;margin-top:20px">Tiêu đề</label>
                                <input class="input_option" type="text" name="title" placeholder="vd:Cần bán điện thoại Iphone X"/>
        <div class="invalid-feedback">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress" style="margin-left:10px;margin-top:10px">Tình trạng</label>
                                
                                <select name="tinhtrang" class="input_option">
                                  <option value="-1" disabled="" selected="">Tình trạng..</option>
                                  <option value="Chưa sử dụng">Chưa sử dụng</option>
                                  <option value="Đã sử dụng(chưa sữa chữa)">Đã sử dụng(chưa sữa chữa)</option>
                                  <option value="Đã sử dụng(đã sữa chữa)">Đã sử dụng(đã sữa chữa)</option>
                                </select>
                            </div>
                            <div class="form-group">
                            	<label for="inputAddress" style="margin-left:10px;margin-top:10px;float:left;width:100%;">Giá</label>
                                <input type="text" name="price" class="input_option ms04" onkeyup="format_money(this);">
                                <span class="search input-group-text" style="color: #d0021b;">VNĐ</span>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress" style="margin-left:10px;margin-top:10px;float:left;width:100%;">Mô tả</label>
                                <textarea name="moreinfor" class="form-control is-invalid comment" id="validationTextarea" 																                                placeholder="Required example textarea" required></textarea>
                            </div>
                            <div class="form-group">
                            	<label for="inputAddress" style="margin-left:10px;margin-top:10px;float:left;width:100%;">Đăng hình</label>
                                <input type="file"  accept="image/*" name="fileToUpload" id="fileToUpload" required onchange="loadFile(event)">
                                <img id="output" width="200" src="<?=@$product["picture"]?>" />
                            </div>
                            <input type="submit" name="add" value="Đang tin ngay!!" class="btn btn-dark-sofm btn-lg" style="margin:15px;margin-right:0px;float:right;"/>
                            </div>
                        </div>
          </div>
          </form>
          <!--Khu vực script-->
          <script>
			function checkVal(evt, cityName) {
			  if(cityName=="Buoc1"){
				  moveTab(evt, "Buoc1");
			  }else if(cityName=="Buoc2" && validate_tab1()==true){
				  moveTab(evt, "Buoc2");
			  }else if(cityName=="Buoc3" && validate_tab2()==true){
				  moveTab(evt, "Buoc3");
			  }
			}
		  </script>
          <script>
			function nextTab(cityName) {
				  var i, div, tablinks, Buttons;
				  div = document.getElementsByClassName("city");
				  tablinks = document.getElementsByClassName("tablink");
				  for (i = 0; i < div.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" highlight-color", "");
					div[i].className = div[i].className.replace(" hiding","");
					div[i].className = div[i].className + " hiding";
				  }
				  if(cityName=="Buoc2")
				  {
					  tablinks[1].className = tablinks[1].className + " highlight-color";
					  div[0].className = div[0].className.replace(" show-effect","");
					  div[1].className = div[1].className + " show-effect";

				  }else{
					  tablinks[1].className = tablinks[1].className.replace(" highlight-color", "");
					  tablinks[2].className = tablinks[2].className + " highlight-color";
					  div[1].className = div[1].className.replace(" show-effect","");
					  div[2].className = div[2].className + " show-effect";
				  }
			}
		  </script>
          <script>
		  function moveTab(evt, cityName) {	
		  	var i, div, tablinks;
			div = document.getElementsByClassName("city");
			tablinks = document.getElementsByClassName("tablink");
			for (i = 0; i < div.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" highlight-color", "");
				div[i].className = div[i].className.replace(" show-effect","");
				div[i].className = div[i].className.replace(" hiding","");
				div[i].className = div[i].className + " hiding";
			}
			if(cityName=="Buoc2"){
				div[1].className = div[1].className + " show-effect";
			}else if(cityName=="Buoc3"){
				div[2].className = div[2].className + " show-effect";
			}else{
				div[0].className = div[0].className + " show-effect";
			}
			evt.currentTarget.firstElementChild.className += " highlight-color";
          }
		  </script>
          <script language="javascript">
            var button_tab1 = document.getElementById("btn_tab1");
            var button_tab2 = document.getElementById("btn_tab2");
            // Thiết lập click cho button 1
            button_tab1.onclick = function () {
				if(validate_tab1()==true){
					nextTab("Buoc2");
				}
            };
            // Thiết lập click cho button 2
            button_tab2.onclick = function () {
                if(validate_tab2()==true){
					nextTab("Buoc3");
				}
            };
        </script>
        <script>  
			function validate_tab1(){
			labelError1.style.display = "none";
			labelError2.style.display = "none";
			labelError3.style.display = "none";
			if( document.form1.loaisanpham.value == "-1" ){
				 labelError1.style.display = "block";
				 return false;
			   }else if(document.form1.hang.value == "-1"){
				 labelError2.style.display = "block";
				 return false;
			   }else if(document.form1.xuatxu.value == "-1"){
				 labelError3.style.display = "block";
				 return false;
			   }else{
				   return true;
			   }
			}
			
		  </script>
          <script>  
			function validate_tab2(){
			labelError4.style.display = "none";
			labelError5.style.display = "none";
			if( document.form1.tinh.value == "-1" ){
				labelError4.style.display = "block";
				return false;
			   }else if(document.form1.huyen.value == "-1"){
				 labelError5.style.display = "block";
				 return false;
			   }else{
				 return true;
			   }
			}
		  </script>
          <script>
		  function format_money(a) {
			  a.value = a.value.replace(/\.|,/g,'');
			  a.value = a.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
		  }
		  </script>	
          <script>
			var loadFile = function(event) {
				var image = document.getElementById('output');
				image.src = URL.createObjectURL(event.target.files[0]);
			};
		</script>
        <script>
			function filterHang() {
			  loaisanphamm = document.getElementById("loaisanpham");
  			  loaisanpham = loaisanphamm.options[loaisanphamm.selectedIndex].id;
			  var xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				  document.getElementById("hang").innerHTML = this.responseText;
				}
			  };
			  xhttp.open("POST", "filterOption.php?loaisp="+ loaisanpham, true);
			  xhttp.send();
			}
			function filterQuanHuyen() {
			  tinhh = document.getElementById("tinh");
  			  tinh = tinhh.options[tinhh.selectedIndex].id;
			  var xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				  document.getElementById("quan").innerHTML = this.responseText;
				}
			  };
			  xhttp.open("POST", "filterOption.php?tinh="+ tinh, true);
			  xhttp.send();
			}
		</script>
        <!--Khu vực script-->
    	</div>
    </div><!-- /.container -->


    
  </body>
  <footer>
  	<?php
		include "masterPage/footerr.php";
	?>
  </footer>
</html>
