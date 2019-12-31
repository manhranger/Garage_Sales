<?php
	error_reporting(0);
	include"../config.inc.php";
	$_SESSION['namePage']="productt";
	error_reporting(0);
    $limitItem=5;
    if(isset($_GET["page"])){
        $current=$_GET["page"];
	}else{
        $current=1;
	}
    $start=($current-1)*$limitItem;
    //mysqli_query("set name 'utf8'");
    mysqli_set_charset("utf8");
    $getproduct="SELECT * FROM `product` inner join `user` where `user`.`Username` = `Product`.`Username`";
    $allproduct=mysqli_query($connect,$getproduct);
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

    <title>Sản phẩm</title>

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

  <body style="background-color:#CCC" onLoad="<?php echo 'myFunctionFilter('.$limitItem.')'; ?>">

    <?php
		include "masterPage/headerr.php";
	?>

    <div class="container-product" style="padding-top:0px;">
    	<div class="starter-template" style="background-color:#FFF;padding-bottom:0;margin-bottom:5px">
      <form>
      	  <div class="form-group ms07" style="padding-left:15px;padding-right:16px">
            <input id="myInput" <?php echo'onKeyUp="myFunctionFilter('.$limitItem.')"'; ?> type="text" class="search" name="search" placeholder="Tìm kiếm sản phẩm ở đây..">
          </div>
          <div class="form-row" style="text-align:left;">
            <div class="form-group col-md-6 ms07">
              <select id="filterAddress" <?php echo'onChange="myFunctionFilter('.$limitItem.')"'; ?> class="search" style="">
              <option value="" disabled="" selected="" id="">Chọn nơi..</option>
              <option value="" id="">Chọn tất cả..</option>
              <option value="1" id="Bình dương">Bình Dương</option>
              <option value="2" id="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
              <option value="3" id="Hà Nội">Hà Nội</option>
            </select>
            </div>
            <div class="form-group col-md-6 ms07-2" style="margin-left:-1px;">
              <select id="filterType" <?php echo'onChange="myFunctionFilter('.$limitItem.')"'; ?> class="search" style="margin-bottom:20px;">
              <option value="-1" id="" disabled="" selected="">Chọn loại...</option>
              <option value="" id="">Tất cả các loại...</option>
              <option value="1" id="Máy tính bảng" <?php if($_GET["category"]==1){echo 'selected';} ?>>Máy tính bảng</option>
              <option value="2" id="Điện thoại" <?php if($_GET["category"]==2){echo 'selected';} ?>>Điện thoại</option>
              <option value="3" id="Laptop" <?php if($_GET["category"]==3){echo 'selected';} ?>>Laptop</option>
              <option value="4" id="Máy ảnh,máy quay" <?php if($_GET["category"]==4){echo 'selected';} ?>>Máy ảnh,Máy quay</option>
              <option value="5" id="Phụ kiện" <?php if($_GET["category"]==5){echo 'selected';} ?>>Phụ kiện</option>
              <option value="6" id="Linh kiện" <?php if($_GET["category"]==6){echo 'selected';} ?>>Linh kiện</option>
              <option value="7" id="Tivi,loa" <?php if($_GET["category"]==7){echo 'selected';} ?>>Tivi, Loa</option>
              <option value="8" id="Đồng hồ" <?php if($_GET["category"]==8){echo 'selected';} ?>>Đồng hồ</option>
            </select>
            </div>
          </div>
          <div id="myFilter" class="form-group" style="padding-left:13px;padding-right:13px;">
            <div class="row" style="text-align:left;padding-left:30px;">
					<?php
					if(isset($_GET["category"])){
						if($_GET["category"]=="1"){
							$category="Máy tính bảng";
						}else if($_GET["category"]=="2"){
							$category="Điện Thoại";
						}else if($_GET["category"]=="3"){
							$category="Laptop";
						}else if($_GET["category"]=="4"){
							$category="Máy ảnh";
						}else if($_GET["category"]=="5"){
							$category="Phụ kiện";
						}else if($_GET["category"]=="6"){
							$category="Linh kiện";
						}else if($_GET["category"]=="7"){
							$category="Tivi,loa";
						}else{
							$category="Đồng hồ";
						}
						//echo $category;
						//$productlimit=mysqli_query($connect, "SELECT * FROM `product` WHERE Typename = '".$category."'");	
					}else{
						//$productlimit=mysqli_query($connect, "SELECT * FROM `product` LIMIT $start,$limitItem  ");	
					}
                    while($product = mysqli_fetch_assoc($allproduct))
					echo '<div class="box form-row displayy" style="text-align:left;">
						<div class="form-group col-md-10 line-bottom line-bottom-left" style="padding-left:0px;padding-bottom:20px;margin-bottom:0px">
							<div class="col">
							  <div class="imageproduct"><img src="'.$product["Picture"].'" width="150" height="100"></div>
							  <h3 class="font-style" style="margin-left:5px;padding-bottom:15px;font-weight:600">'.$product["Title"].'</h3>
							  <p class="showcode" style="margin-left:5px;color: #d0021b;font-size: 13px;font-weight: 900;">
								<script>
									var a="'.$product["Price"].'";
									a = a.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
									document.write(a);
								</script> đ
							  </p>
							  <div>
							  	<img src="../Images/Avatars/default.jpg" style="float:left;margin-right:5px;border-radius:100%;" width="20" height="20">
							  	<p style="margin-left:5px;font-size:15px;font-style:normal">'.$product["name"].'</p>
							  </div>
							</div>
							<div class="hidden">
								<p class="typeItem">'.$product["Typename"].'</p>
								<p class="addressItem">'.$product["Location"].'</p>
							</div>
						</div>
					   <div class="form-group col-md-2 ms03 text-right line-bottom">
							<a href="productDetaill.php?id_Product_Detail='.$product["ProductID"].'"><button class="btn-blue-sofm" type="button" style="right:0;bottom:15px;"/>
									Xem chi tiết
							</button></a>
						</div>
					</div>';
                    ?> 
             </div>
          </div>
          <nav aria-label="Page navigation example"><!--paging-->
              <ul class="pagination justify-content-center">
                <?php  											/*PADDING*/
				if(!isset($_GET['category'])){
				}else{
					$allproduct=mysqli_query($connect,"SELECT * FROM `product` WHERE Typename = '".$category."'");
				}
				echo'
					<li class="page-item">
						<a class="page-link movePage" onClick="prePage('.$limitItem.')" >Previous</a>
					</li>';
				for ($i=1;$i<=ceil(mysqli_num_rows($allproduct)/$limitItem);$i++){
					if($i==($_GET['page'])){
						echo '<li class="page-item"><a class="page-link pageLinks" onClick="Pagging('.$i.','.$limitItem.')" >'.$i.'</a></li>';
					}else if($i==1&&!isset($_GET['page'])){
						echo '<li class="page-item"><a class="page-link pageLinks" onClick="Pagging(1,'.$limitItem.')">'.$i.'</a></li>';
					}
					else{
						echo '<li class="page-item"><a class="page-link pageLinks" onClick="Pagging('.$i.','.$limitItem.')">'.$i.'</a></li>';
					}
				}
				echo'
					<li class="page-item">
						<a class="page-link movePage" onClick="nextPage('.($i-1).','.$limitItem.')" >Next</a>
					</li>';
				?>
              </ul>
          </nav>
    </form>
    </div>
</div><!-- /.container -->
<script>
function myFunctionFilter(limit) {
  var input, filter, i, txtValue, typeItem,items=0;
  filterTypee = document.getElementById("filterType");
  filterType = filterTypee.options[filterTypee.selectedIndex].id.toUpperCase();
  typeItem = document.getElementsByClassName("typeItem");
  pageLinks = document.getElementsByClassName("pageLinks");
  
  filterAddresss = document.getElementById("filterAddress");
  filterAddress = filterAddresss.options[filterAddresss.selectedIndex].id.toUpperCase();
  addressItem = document.getElementsByClassName("addressItem");
  
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myFilter");
  box = document.getElementsByClassName("box");
  title = div.getElementsByTagName("h3");
    	  	
  //document.write(typeItem[0].textContent.toUpperCase().indexOf(filterType));
  //document.write(addressItem[0].textContent+filterAddress);
  //box[1].style.display = "none";
  for (i = 0; i < title.length; i++) {
      txtValue = title[i].textContent;
      txtType = typeItem[i].textContent;
	  txtAddress = addressItem[i].textContent;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        if (txtType.toUpperCase().indexOf(filterType) > -1) {
          if (txtAddress.toUpperCase().indexOf(filterAddress) > -1) {
			  box[i].style.display = "";items++;
		  }else {
			  box[i].style.display = "none";
		  }
        }else {
          box[i].style.display = "none";
        }
      } else {
        box[i].style.display = "none";
      }
  }
  for( i = 0 ; i < pageLinks.length ; i++)
  {
	  if(i< Math.ceil(items/limit) )
	  {
		  pageLinks[i].className = pageLinks[i].className.replace (/ hidden/g,"");
	  }else{
	  	pageLinks[i].className = pageLinks[i].className + " hidden";
	  }
  }
  Pagging(1,limit);
}
</script>
<script>
var pageNum;
movePage = document.getElementsByClassName("movePage");
		  function Pagging(pageNumber,limit) {	
		  	var i , items = 0 ; pageNum = pageNumber ;
			box = document.getElementsByClassName("box");
			pageLinks = document.getElementsByClassName("pageLinks");
			displays = document.getElementsByClassName("displayy");
			for(i=0;i<box.length;i++)
			{
				if(box[i].style.display != "none"){
					displays[i].className = displays[i].className.replace(" hidden","");
					if(items >= limit*pageNumber){
						displays[i].className = displays[i].className + " hidden";
					}else if(items < (limit*pageNumber-limit)){
						items++;
						displays[i].className = displays[i].className + " hidden";
					}else{
						items++;
					}
				}
			}
			for( i = 0 ; i < pageLinks.length ; i++)
		  	{
				pageLinks[i].className = pageLinks[i].className.replace (/ currentPage| disabled/g,"");
				  if( i + 1 == pageNumber ){
					pageLinks[i].className = pageLinks[i].className + " currentPage";
			  	  }
				  if(pageNumber==1){
					  pageLinks[i].className = pageLinks[i].className + " ";
				  }
		  	}
          }
		  function nextPage(lastPage,limit){
			  if(pageNum+1<=lastPage){
				  Pagging(pageNum+1,limit);
			  }else{
			  }
		  }
		  function prePage(limit){
		  	if(pageNum-1>=1){
				  Pagging(pageNum-1,limit);
			  }else{
			  }
		  }
</script>    
  </body>
  <footer>
  	<?php
		include "masterPage/footerr.php";
	?>
  </footer>
</html>
