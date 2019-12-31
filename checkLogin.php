<?php
    if($_SESSION["user"]==null && $_SESSION["admin"]==null)
    {
		$_SESSION['notification']='Bạn cần đăng nhập trước khi vào trang này!!';
        header("location:loginn.php");
    }
?>