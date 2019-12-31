<?php
include"../config.inc.php";
if(isset($_GET['loaisp'])) {
	echo '
		<label for="inputAddress" style="margin-left:10px;margin-top:10px">Hãng</label>
		<select name="hang" class="input_option">
			<option value="-1" disabled selected="">Chọn hãng..</option>';
			$mysql=mysqli_query($connect, "SELECT * FROM `Product_Type` WHERE productType='".$_GET['loaisp']."'");
                while($productType = mysqli_fetch_assoc($mysql)){
					echo'
					<option value="'.$productType["productName"].'">'.$productType["productName"].'</option>
					';}
	echo'
		</select>
		<label for="error" id="labelError2" style="margin-left:10px;margin-top:10px;color:#C03;width:100%;display:none">Bạn chưa chọn hãng</label>';
}
if(isset($_GET['tinh'])) {
	echo '
		<label for="inputAddress" style="margin-left:10px;margin-top:10px">Quận,Huyện,Thị xã</label>
		<select name="huyen" class="input_option">
			<option value="-1" disabled selected="">Chọn Quận,Huyện,Thị xã..</option>';
			$mysql=mysqli_query($connect, "SELECT * FROM `districts` WHERE provincesName='".$_GET['tinh']."'");
                while($provinces = mysqli_fetch_assoc($mysql)){
					echo'
					<option value="'.$provinces["districtsName"].'">'.$provinces["districtsName"].'</option>
					';}
	echo'
		</select>
		<label for="error" id="labelError5" style="margin-left:10px;margin-top:10px;color:#C03;width:100%;display:none">Bạn chưa chọn huyện</label>';
}
?>