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
      if (verify_teacher($username)==1) {
        header("Location: /home1.php");
      }else{
        header("Location: /studentform.php");
      }
    } 
  }
}


$flag;
if (isset($_POST['username']) and isset($_POST['password'])) {
  if(do_login($_POST['username'], $_POST['password'])){
    $flag = 1;
  }else{
    $flag = 0;
  }

}else{
  $flag = -1;
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Rahul.S">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin</title>

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
          /*top: 50%;*/
          left: 34%;
          bottom: 10%;
          width: 28%;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center" style="background-color:#343a40;"><!--  //powderblue -->
    <center>
    <div class="card" id="card">
    <article class="card-body">
    <img class="mb-4" id="logo" src="assets/img/logo1.jpg" alt="" width="72" height="57">
    <h4 class="card-title mb-4 mt-1">Sign in</h4>
    <form id="form" class="form-signin" method="POST" action="signin.php"> <!-- super_globals.php -->
      <?php
      if ($flag == 1) { 
        ?>
        <div class="alert alert-success" role="alert">
          Welcome, <?php echo $_POST['username']; 
          $username=$_POST['username'];
          // newt_delay(5000000);
          if (verify_privilege($username)==1) {
            if (verify_student($username)) {
              header("Location: /home1.php");
            }else{
              header("Location: /studentform.php");
            }
          }elseif (verify_privilege($username)==2) {
            header("Location: /home2.php");
          } 
          ?>
        </div>
      <?php }elseif($flag == 0){ ?>
        <div class="alert alert-danger" role="alert">
          username or pasword wrong!!!...
        </div>
      <?php }
      ?>
      <div class="form-floating">
        <input name="username" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
        <label for="floatingInput">Email Address</label>
      </div>
      <div class="form-floating">
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
        <label for="floatingPassword">Password</label>
      </div>


      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="w-100 float-right btn btn-outline-primary" type="submit">Sign in</button>
      <div> <a class="small" href="password.php">Forgot Password?</a></div>
      <div class="small"><a href="signup.php">Need an account? Sign up!</a></div>
    </form>
    </article>  
    </div>
    </center>
  </body>
</html>
