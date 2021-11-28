<?php

include 'functions/auth.php';

if(isset($_COOKIE['username']) and isset($_COOKIE['token'])){
	$username = $_COOKIE['username'];
	$token = $_COOKIE['token'];

	if(verify_session($username, $token)){
		invalidate_session($username, $token);
		header("Location: /index.php");
	} else {
		header("Location: /index.php");
	}
} else {
	header("Location: /index.php");
}
?>