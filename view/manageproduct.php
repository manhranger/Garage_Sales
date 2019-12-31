<?php
session_start();
$admin=$_SESSION["admin"];
$user=$_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trang chủ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<?php
    include "masterPage/header.php";
    include"../config.inc.php";
    error_reporting(0);
    if($user==null && $admin==null)
    {
        header("location:login.php");
    }
    if (isset($_GET["ID"]))
    {
        mysqli_query($connect, "DELETE FROM `product` WHERE ProductID=".$_GET["ID"]);
        header("Location:manageproduct.php");
        }
?>
<div class="container-fluid text-center" style="border: 1px solid; border-top:0px;">

    <div class="row content">
        <?php
        include "masterPage/left.php";
        ?>
        <div class="text-left" style="margin-left: 20%;">
            <?php
                echo "
                    <table class=\"table-bordered\">
        <thead>
            <th>ten sp</th>
            <th>loai sp</th>
            <th>gia</th>
            <th>nha san xuat</th>
            <th>thoi gian dang</th>
            <th>trang thai</th>
            <th>tuy chon</th>
        </thead>
         <tbody>
        ";
            $productlimit=mysqli_query($connect, "SELECT * FROM `product` where Username= '".$_SESSION["username"]."'");
            while($product = mysqli_fetch_assoc($productlimit)) {
                if ($product["Sole"] == 1)
                    $sole = "da ban";
                else
                    $sole = "chua ban";
                echo "
       
            <tr>
                <td>" . $product["Productname"] . "</td>
                <td>" . $product["Typename"] . "</td>
                 <td>" . $product["Price"] . "</td>
                  <td>" . $product["Manufacturer"] . "</td>
                   <td>" . $product["Timestart"] . "</td>
                    <td>" . @$sole . "</td>
                     <td><a href='manageproduct.php?ID=" . $product["ProductID"] . "'onclick=\"return confirm('Are you sure?')\">
                     <input type='submit' value='delete' name='delete' class='btn-block'></a><br>
                        <a href='AddProduct.php?ID=" . $product["ProductID"] . "'><input type='submit' value='update' class='btn-block'></a>                      
                      </td>
            </tr>
            ";
            }
       echo "
   </tbody>
    </table>
               ";
            ?>
        </div>

    </div>

</div>
<?php
include "masterPage/footer.php"
?>

</body>
  <footer>
  	<?php
		include "masterPage/footerr.php";
	?>
  </footer>
</html>
