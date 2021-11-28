
<?php

include 'student.php';

if (isset($_POST['name']) and isset($_POST['Registration']) and isset($_POST['email'])) {
  $name=$_POST['name'];
  $reg_no=$_POST['Registration'];
  $email=$_POST['email'];
  $db_conn=get_db_connection();
  $query="INSERT INTO `miniproject`.`registration_no` (`name`, `reg_no`, `email`) VALUES ('Uday labishetty', '20MIC0116', 'sakthivelan.ks2020@vitstudent.ac.in')";
  if (mysqli_query($db_conn,$query)) {
    echo "sucess";
  }else{
    echo "not added";
    echo mysql_error($db_conn);
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signup</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      #logo{
        width: 300px;
        height: 150px;
      }
      #form{
    /*    background-color: #0d6efd;*/
      }
      body{
        background-color: #0d6efd;
      }
      #card{
        background-color: #f8f9fa;
          margin: auto;
          padding: 10px 0 10px;
          position: absolute;
          /*top: 3%;*/
          left: 38%;
          bottom: 50%;
          width: 28%;
      }
      #form_verify{
        top: 10%;
        bottom: 50%;
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center" style="background-color:#343a40;"><!--  //powderblue -->
    <center>
    <div class="card" id="card">
    <article class="card-body">
    <h4 class="card-title mb-4 mt-1">Sign Up</h4>
    <form id="form_signup" class="form-signin" method="POST" action="insert.php"> 
      <div class="form-floating">
        <input name="name" type="text" class="form-control" id="floatingInput" placeholder="name" required>
        <label for="floatingInput">name</label>
      </div>
      <div class="form-floating">
        <input name="Registration" type="text" class="form-control" id="floatingPassword" placeholder="Registration" required>
        <label for="floatingPassword">Registration</label>
      </div>
      <div class="form-floating">
        <input name="email" type="text" class="form-control" id="floatingCPassword" placeholder="email" required>
        <label for="floatingPassword">email</label>
      </div>
      <button class="w-100 float-right btn btn-outline-primary" type="submit">Sign Up</button>
      <div class="card-footer text-center py-3">
        <div class="small"><a href="signin.php">Have an account? Go to login</a></div>
      </div>
    </form>
    </article>  
    </div>
    </center>
  </body>
</html>
