<?php 
include 'functions/auth.php';
//include 'signup.php';
if (isset($_COOKIE['username']) and isset($_COOKIE['token'])) {
    $username=$_COOKIE['username'];
    $token=$_COOKIE['token'];
    if (verify_session($username,$token)) {
        if (verify_privilege($username)==1) {
            header("Location: /home1.php");
        }elseif (verify_privilege($username)==2) {
            header("Location: /home2.php");
        }
    }
}
$flag;
if (isset($_POST['otp']) and isset($_POST['username'])) {
    $username=$_POST['username'];
    $otp=$_POST['otp'];
    if (do_verify_signup($username,$otp)==1) {
      echo "string";
      $flag=1;
      header("Location: /signin.php");
    }else{
      $flag=0;
    }
}else{
  $flag=-1;
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
          bottom: 20%;
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
  <body class="text-center" style="background-color:#343a40;">
    <center>
    <div class="card" id="card">
    <article class="card-body">
    <img class="mb-4" id="logo" src="assets/img/logo1.jpg" alt="" width="72" height="57">
    <h4 class="card-title mb-4 mt-1">OTP Verification </h4>
    <form id="form_signup" class="form-signin" method="POST" action="verify.php"> 
      <?php 
      if ($flag == 1) { 
        header("Location: /signin.php");
      }elseif ($flag==0){
      ?>
        <div class="alert alert-danger" role="alert">
           Invalid OTP!!..
        </div>
<?php    } ?>
      <div class="form-floating">
        <input name="username" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
        <label for="floatingInput">Email Address</label>
      </div>
      <div class="form-floating">
        <input name="otp" type="text" class="form-control" id="floatingInput" placeholder="Enter 6 digit OTP" required>
        <label for="floatingInput">Enter OTP</label>
      </div><br>
      <button class="w-100 float-right btn btn-outline-primary" type="submit">Submit</button>
    </form>
    </article>  
    </div>
    </center>
  </body>
</html>