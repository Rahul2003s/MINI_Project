<?php

include 'functions/student.php';

if (isset($_COOKIE['username']) and isset($_COOKIE['token'])) {
	$username=$_COOKIE['username'];
	$token=$_COOKIE['token'];
	if (verify_session($username,$token)) {
		if (verify_privilege($username)==1) {
			if (verify_student($username)==1) {
				header("Location: /home1.php");
			}else{
				header("Location: /studentform.php");
			}
		}elseif (verify_privilege($username)==2) {
			header("Location: /home2.php");
		}
	}else{
		header("Location: /signin.php");
	}
}else{
	header("Location: /signin.php");
}

?>