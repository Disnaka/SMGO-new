<?php
	session_start();
	//login out
	if(isset($_GET['action'])){
		if($_GET['action']=="logout") {
		unset($_SESSION['admin']);
	}

	}
	if(isset($_POST['login'])) {
		$login_sql="SELECT * FROM vendor WHERE username='".$_POST['username']."' AND password='".sha1($_POST['password'])."'";
		if($login_query=mysqli_query($dbconnect, $login_sql)){
		
			$login_rs=mysqli_fetch_assoc($login_query);
			$_SESSION['admin']=$login_rs['username'];
		}
	}
	
	if(isset($_SESSION['admin'])) {
		include("cpanel.php");
	} else {
		include("login.php");
	}
	
?>