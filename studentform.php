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
		
		<div class="title" align="center">Registration</div>
		<!-- <img class="mb-4" id="logo" src="assets/img/logo1.jpg" alt="" width="300px" height="150px" align="center"> -->
		<form action="sg.php" method="POST">
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
			<div class="gender-details">
				<input type="radio" name="gender" id="dot-1">
				<input type="radio" name="gender" id="dot-2">
				<input type="radio" name="gender" id="dot-3">
				<span class="gender-title">Gender</span>
				<div class="category">
					<label for="dot-1">
						<span class="dot one"></span>
						<span class="gender">Male</span>
					</label>
					<label for="dot-2">
						<span class="dot two"></span>
						<span class="gender">Female</span>
					</label>
					<label for="dot-3">
						<span class="dot three"></span>
						<span class="gender">Transgender</span>
					</label>
				</div>
			</div>
			<div class="button">
				<input type="submit" value="submit">
			</div>
		</form>
	</div>
</body>
</html>