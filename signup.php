<?php 
include 'functions/auth.php';
$flag;
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
if (isset($_POST['username']) and isset($_POST['password']) and isset($_POST['cpassword'])) {
    $username=$_POST['username'];
    $query="SELECT * FROM `miniproject`.`authentication` WHERE username = '$username';";
    $db_conn=get_db_connection();
    $result=mysqli_query($db_conn,$query);
    if (mysqli_num_rows($result)==1){
        $flag=0;
    }else{
        if ($_POST['password'] == $_POST['cpassword']) {
            $username=$_POST['username'];
            $password=$_POST['password'];
            if(do_signup($username,$password)==1){
                $flag=1;
            }
        }else{
            $flag=-2;
        }
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
          bottom: 10%;
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
    <img class="mb-4" id="logo" src="assets/img/logo1.jpg" alt="" width="72" height="57">
    <h4 class="card-title mb-4 mt-1">Sign Up</h4>
    <form id="form_signup" class="form-signin" method="POST" action="signup.php"> 
    <?php
      if ($flag == 1){ 
        ?>
        <div class="alert alert-success" role="alert">
          Registered now you can login!!!.. <br> 
          <?php echo "Welcome ".$_POST['username'];
          usleep(50000);
          $location="Location: /verify.php";//?username=$username
          header($location);
            ?>
        </div>
      <?php }elseif($flag==0){ ?>
        <div class="alert alert-danger" role="alert">
           User already Exist!!!....
        </div>
      <?php 
     }elseif($flag==-2){ ?>
        <div class="alert alert-danger" role="alert">
           Passwords did'nt match
        </div>
      <?php }
      ?>
      <div class="form-floating">
        <input name="username" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
        <label for="floatingInput">Email Address</label>
      </div>
      <div class="form-floating">
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
        <label for="floatingPassword">password</label>
      </div>
      <div class="form-floating">
        <input name="cpassword" type="password" class="form-control" id="floatingCPassword" placeholder="Password" required>
        <label for="floatingPassword">Confirm Password</label>
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
