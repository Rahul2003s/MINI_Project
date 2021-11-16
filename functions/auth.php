<?php 
$SALT = "eph35pifnbpi3nq9brnb3bh0wrn4q4[0gj3nb3b39j3";

$db_conn = null;
$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name="miniproject";

function get_db_connection(){
	global $db_conn;
	global $db_servername;
	global $db_username;
	global $db_password;
	global $db_name;
	if ($db_conn != null) {
		return $db_conn;
	}else{
		$db_conn = mysqli_connect($db_servername, $db_username, $db_password,$db_name);
		if (!$db_conn) {
			$db_conn=null;
			die("connection failed  ". mysqli_connect_error());
		}else{
			return $db_conn;
		}
	}
}

function get_hashed($password){
	global $SALT;
	return sha1(strrev($password.$SALT));
}
// 1.save the detils to the databaase,if username ends with vit.ac.in teachers or vitstudent.ac.in student other than this no username will be acepted
// 2.password to be hashed
// 3. OTP generate 
// 
function do_signup($username,$password){
	$hashed_password=get_hashed($password);
	$p_check= explode('@', $username)[1];
	$p_id=0;
	$db_conn=get_db_connection();
	if ($p_check == "vit.ac.in"){
		//Teachers
		$p_id=2;
	}elseif($p_check == "vitstudent.ac.in"){
		//students
		$p_id=1;
	}else{
		$p_id=0;
	}
	$otp=rand(100000,999999);
	$query="INSERT INTO `miniproject`.`authentication` (`username`,`password`,`otp`,`p_id`) VALUES ('$username','$hashed_password','$otp','$p_id');";

	if (mysqli_query($db_conn, $query)){
		return 1;
	} else {
		return mysqli_error($db_conn);
	}
}


/*
1. check otp same as in db
2. if otp crt, then set active to 1
*/
function do_verify_signup($username,$otp){
	$query="select * from miniproject.authentication where username='$username';";
	$db_conn=get_db_connection();
	$result=mysqli_query($db_conn,$query);
	if (mysqli_num_rows($result)==1) {
		$row=mysqli_fetch_assoc($result);
		if ($row['otp']==$otp){
			return activate($username);
		}else{
			return 0;
		}
	}else{
		return 0;
	}

}

//set active to 1
function activate($username){
	$db_conn=get_db_connection();
	$query="UPDATE `miniproject`.`authentication` SET `active` = '1' WHERE (`username` = '$username');";
	
	return mysqli_query($db_conn,$query);
}



/*
1.check user exist in db
2.if exist,then check password crt
3.if password crt , set cookies
*/
function do_login($username,$password){
	$hashed_password=get_hashed($password);
	$query="select * from miniproject.authentication where username='$username';";
	$db_conn=get_db_connection();
	$result=mysqli_query($db_conn,$query);
	if (mysqli_num_rows($result)==1) {
		$row=mysqli_fetch_assoc($result);
		if ($row['password']==$hashed_password){
			if ($row['active']==1) {
				$token=get_hashed(rand(100000,999999));
				$expiry=time()+(60*60);
				return add_session($username,$token,$expiry);
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}else{
		return 0;
	};

}


/*
1.on successful login, we generate a $token and add it to the db "session table".
2.set proper expiry time for same as the cookies.
*/
function add_session($username,$token,$expiry){
	$mysqltime=date('Y-m-d H:i:s', $expiry);
	$query = "INSERT INTO `miniproject`.`session` (`username`, `token`, `expiry`) VALUES ('$username', '$token', '$mysqltime');";
	$db_conn=get_db_connection();

	if (mysqli_query($db_conn, $query)){
		setcookie('username', $username, $expiry, '/', 'localhost');
		setcookie('token', $token, $expiry, '/', 'localhost');

		return 1;
	} else {
		return mysqli_error($db_conn);
	}

	
}


/*
1.every time when a user access any page , we check the $username and $token
combo from $_COOKIE to ensure the session is still valid and not expired
2.if vaild, continue
3.if not , invalidate session and send to login page
4.we will take the input for verify session from to cookie to verify 
*/
function verify_session($username,$token){
	$query="select * from miniproject.session where username='$username' AND token='$token';";
	$db_conn=get_db_connection();
	$result=mysqli_query($db_conn,$query);
	if (mysqli_num_rows($result)==1) {
		$row=mysqli_fetch_assoc($result);
		if ((int)$row['active']==1) {
			$expiry = strtotime($row['expiry']);
			if ($expiry > time()) {
				return 1;
			}else{//logout
				return 0;
			}
		}else{
			return 0;
		}
	}else{
		return 0;
	};

}


/*
1.set expiry to current time and set active to 0
this is logout
*/
function invalidate_session($username,$token){
	$db_conn=get_db_connection();
	$query="UPDATE `miniproject`.`session` SET `active` = '0' WHERE `username` = '$username' AND `token` = '$token';";
	
	return mysqli_query($db_conn,$query);
}

function verify_privilege($username)
{
	$query="select * from miniproject.authentication where username='$username';";
	$db_conn=get_db_connection();
	$result=mysqli_query($db_conn,$query);
	if (mysqli_num_rows($result)==1) {
		$row=mysqli_fetch_assoc($result);
		if ((int)$row['p_id']==1){
			return 1;
		}elseif((int)$row['p_id']==2){
			return 2;
		}else{
			return 0;
		}
	}else{
		return 0;
	};
}
?>