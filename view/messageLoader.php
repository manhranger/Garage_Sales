<?php
	include"../config.inc.php";
	if(!isset($_GET["listTexter"])){
		if(isset($_GET["text"])){
			mysqli_query($connect, 'INSERT INTO `messages`(`text`, `texter1`, `texter2`) VALUES ("'.$_GET["text"].'","'.$_SESSION["username"].'","'.$_SESSION["username2"].'")');
		}else if(isset($_GET["texter2"])){
			$_SESSION["username2"] = $_GET["texter2"];
			$query="SELECT * FROM `messages` WHERE `texter1` = '".$_SESSION["username"]."' and `texter2` = '".$_SESSION["username2"]."' or `texter2` = '".$_SESSION["username"]."' and `texter1` = '".$_SESSION["username2"]."' ORDER BY `Id_Stt` ASC";
			$mySQL=mysqli_query($connect,$query);
			while($conversations = mysqli_fetch_assoc($mySQL)){
				if($conversations["texter1"]==$_SESSION["username"]){
					echo '
									<ul>
										<li class="msg-right" style="display:inline-block">
											<div class="msg-left-sub">
												<div class="msg-desc" style="display:inline-block;float: right;">
													<p style="width:auto;display:inline-block;margin: 0 0 0px">'.$conversations["text"].'</p>
												</div>
											</div>
										</li>
									</ul>
					';
				}else{
					echo'
									<ul>
										<li class="msg-left">
											<div class="msg-left-sub">
												<div class="msg-desc" style="display:inline">
													<p style="width:auto;display:inline-block">'.$conversations["text"].'</p>
												</div>
											</div>
										</li>
									</ul>
					';
				}                   
			}
		}
	}else{
		$query="SELECT * FROM `messages` WHERE `texter1` = '".$_SESSION["username"]."' or `texter2` = '".$_SESSION["username"]."' ORDER BY `Id_Stt` DESC";
		$mySQL=mysqli_query($connect,$query);
		$texter=array();$i=0;
		echo '<ul>';
		while($conversations = mysqli_fetch_assoc($mySQL)){
			if($conversations["texter1"] == $_SESSION["username"]){
				if(count($texter)==0){
					echo '
							<a onClick="scrollToEnd('."'".$conversations["texter2"]."'".')">
                            <li>
                                <div class="chatList">
                                    <div class="desc">
                                        <h5>'.$conversations["texter2"].'</h5>
                                    </div>
                                </div>
                            </li>
							</a>
					';
					$texter[0]=$conversations["texter2"];
				}
				for($i = 0 ; $i < count($texter) ; $i++){
					if($conversations["texter2"]==$texter[$i]){
						$i=0;break;
					}
				}
				if($i == count($texter)){
					echo '
							<a onClick="scrollToEnd('."'".$conversations["texter2"]."'".')">
                            <li>
                                <div class="chatList">
                                    <div class="desc">
                                        <h5>'.$conversations["texter2"].'</h5>
                                    </div>
                                </div>
                            </li>
							</a>
					';
				   	$texter[$i]=$conversations["texter2"];
				}
			}else{
				if(count($texter)==0){
					echo '
							<a onClick="scrollToEnd('."'".$conversations["texter1"]."'".')">
                            <li>
                                <div class="chatList">
                                    <div class="desc">
                                        <h5>'.$conversations["texter1"].'</h5>
                                    </div>
                                </div>
                            </li>
							</a>
					';
					$texter[0]=$conversations["texter1"];
				}
				for($i = 0 ; $i < count($texter) ; $i++){
					if($conversations["texter1"]==$texter[$i]){
						$i=0;break;
					}
				}
				if($i == count($texter)){
					echo '
							<a onClick="scrollToEnd('."'".$conversations["texter1"]."'".')">
                            <li>
                                <div class="chatList">
                                    <div class="desc">
                                        <h5>'.$conversations["texter1"].'</h5>
                                    </div>
                                </div>
                            </li>
							</a>
					';
				   	$texter[$i]=$conversations["texter1"];
				}
			}
		}echo '</ul>';
	}
?>