<?php 
include 'functions/student.php';
$flag;
if (isset($_COOKIE['username']) and isset($_COOKIE['token']) and isset($_COOKIE['user_id'])) {
	$username=$_COOKIE['username'];
	$user_id=$_COOKIE['user_id'];
	if(verify_privilege($username)==1){
		if (verify_student($username)==1) {
			header("Location: /home1.php");
		}else{
			if (isset($_POST['F_name']) and isset($_POST['L_name']) and isset($_POST['branch']) and isset($_POST['batch']) and isset($_POST['Registration_No']) and isset($_POST['course']) and isset($_POST['gender']) and isset($_COOKIE['username']) and isset($_COOKIE['user_id'])) {
				$user_id=$_COOKIE['user_id'];
				$reg_no=$_POST['Registration_No'];
				$username=$_COOKIE['username'];
				$f_name=$_POST['F_name'];
				$l_name=$_POST['L_name'];
				$branch=$_POST['branch'];
				$gender=$_POST['gender'];
				$course=$_POST['course'];
				$batch=$_POST['batch'];
				$team_id=12;
				if(register_student($user_id,$username,$f_name,$l_name,$reg_no,$course,$branch,$gender,$batch,$team_id)){
					$flag=1;
					header("Location: /home1.php");
				}else{
					$flag=0;
				}
			}else{
				$flag=-1;
			}
		}
	}elseif (verify_privilege($username)==2) {
		header("Location: home2.php");
	}
}else{
	header("Location: signin.php");
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="UTF-8">
	<center>
	<title>Registration</title>
	</center>
	<link rel="stylesheet" href="css/studentform.css">
	<meta name="viewport" content="width=device-width">
</head>
<style type="text/css">
	#logo{
		/*left: 100%;*/
		right: 100%;
	}
</style>
<body>
	<div class="container">
		<?php
		if ($flag==0) { ?>
		 	<div class="alert alert-danger" role="alert">
          		Invalid entry!!!....
        	</div>
		 <?php } ?>
		<div class="title" align="center">Registration</div>
		<!-- <img class="mb-4" id="logo" src="assets/img/logo1.jpg" alt="" width="300px" height="150px" align="center"> -->
		<form action="studentform.php" method="POST">
			<div class="user-details">
				<div class="input-box">
					<span class="details">First Name</span>
					<input name="F_name" type="text" placeholder="Enter your first name" required>
				</div>
				<div class="input-box">
					<span class="details">Last Name</span>
					<input name="L_name" type="text" placeholder="Enter your last name" required>
				</div>
	                 <!-- dropbox -->
	                    <div>
						    <span class="select" >Branch</span>
	                        <select class="dropbox" name="branch" required>
	                            <option>-Select branch-</option>
	                            <option value="Vellore">Vellore</option>
	                            <option value="Chennai">Chennai</option>
	                            <option value="Andhra">Andhra Pradesh</option>
	                            <option value="Bophal">Bophal</option>
	                        </select>
	                    </div>
	                    <div>
						    <span class="select">Batch</span>
	                        <select name="batch" class="dropbox" required>
	                            <option>-Select batch-</option>
	                            <option value="2018">2018</option>
	                            <option value="2019">2019</option>
	                            <option value="2020">2020</option>
	                            <option value="2021">2021</option>
	                        </select>
	                    </div> 
			<div class="input-box">
				<span class="details">Registration No.</span>
				<input name="Registration_No" type="text" placeholder="Reg NO." required>
			</div>

			<div>
				<span class="select" >Course</span>
				<select name="course" class="dropbox" required>
					<option><-Select course-></option>
					<option>B.Tech - Biotechnology</option>
					<option>B.Tech - Chemical Engineering</option>
					<option>B.Tech - Civil Engineering</option>
					<option>B.Tech - Computer Science and Engineering</option>
					<option>B.Tech - Computer Science and Engineering with Specialisation in Bioinformatics</option>
					<option>B.Tech - Computer Science and Engineering with specialisaiton in Information Security</option>
					<option>B.Tech - Computer Science and Engineering with specialisaiton in Internet of Things</option>
					<option>B.Tech - Computer Science and Engineering and Business Systems(in collaboration with TCS)</option>
					<option>B.Tech - Computer Science and Engineering with specialisaiton in Data Science</option>
					<option>B.Tech - Computer Science and Engineering with specialisaiton in Block Chain Technology</option>
					<option>B.Tech - Electrical and Electronics Engineering</option>
					<option>B.Tech - Electronics and Communication Engineering</option>
					<option>B.Tech - Electronics and Instrumentation Engineering</option>
					<option>B.Tech - Electonics and Communication with specialisation in Biomedical Engineering</option>
					<option>B.Tech - Information Technology</option>
					<option>B.Tech - Mechanical Engineering</option>
					<option>B.Tech - Mechanical with specialisation in Automative Engineering</option>
					<option>B.Tech - Mechanical with specialisation in Manufacturing Engineering</option>
					<option>B.Tech - Civil Engineering with Minor in Computer Science Engineering</option>
					<option>B.Tech - Civil Engineering with Minor in Artifical Intelligence</option>
					<option>B.Tech - Civil Engineering with Minor in Data Science</option>
					<option>B.Tech - Mechanical Engineering with Minor in Computer Science and Engineering</option>
					<option>B.Tech - Mechanical Engineering with Minor in Artifical Intelligence and Machine Learning</option>
					<option>B.Tech - Mechanical Engineering with Minor in Data Science</option>
				</select>
			</div>

			</div>
			<div>
				<span class="select">Gender</span>
	            <select name="gender" class="dropbox" required>
	                <option><-Select gender-></option>
	                <option value="Male">Male</option>
	                <option value="Female">Female</option>
	                <option value="Transgender">Transgender</option>
                </select>
	        </div> 
	        <br>
			<div class="button">
				<input type="submit" value="submit">
			</div>
		</form>
	</div>
</body>
</html>