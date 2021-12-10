<?php
$team_id=$_GET['id'];
include 'functions/student.php';

if (isset($_COOKIE['username']) and isset($_COOKIE['token'])) {
    $username=$_COOKIE['username'];
    $token=$_COOKIE['token'];
    if (verify_session($username,$token)) {
        // echo ".";
        // if (verify_teacher($username)) {
  //           // echo ".";
  //       }else{
  //           header("Location: /studentform.php");
  //       }
    }else{
        header("Location: /signin.php");
    }
}else{
    header("Location: /signin.php");
}

$total_team;

$db_conn=get_db_connection();
$query="SELECT * FROM `miniproject`.`teams` WHERE team_id='$team_id';";
$result=mysqli_query($db_conn,$query);
if ($result) {
        $row=mysqli_fetch_assoc($result);
}

// print_r($row);

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TEACHERS HOME PAGE</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <style type="text/css">
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
    </style>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">TEACHERS HOME PAGE</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Home
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link" href="team_cards_teach.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Teams 
                            </a>
                            <a class="nav-link" href="table_stud.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Students 
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            </div>
                            <div class="sb-sidenav-menu-heading"></div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_COOKIE['username']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <br>
                    <div class="container-fluid">
                        <div class="box">
                            <div class="box-header with-border text-center">
                                <h3 class="box-title"><b>Students details</b></h3>
                            </div>

                        <form class="form-horizontal" method="post" action="addStudents" id="employeeForm" autocomplete="off">
                            <div class="box-body">
                                <div class="form-group text-center">
                                    <h4 style="color: green; font-weight: bold; --darkreader-inline-color:#72ff72;" data-darkreader-inline-color=""></h4>
                                </div>
                            </div>
                        </form>

                        <div class="" id="showDetails" style="margin: 20px 20px 20px 20px;">
                            <div class=" table-responsive">
                            <div>
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td style="background-color: rgb(171, 166, 191); font-weight: bold; --darkreader-inline-bgcolor:#403c53;" data-darkreader-inline-bgcolor="">Name</td>
                                        <td style="background-color: rgb(242, 222, 222); --darkreader-inline-bgcolor:#381616;" data-darkreader-inline-bgcolor=""><?php echo $row['team_id']."ADFSF"; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: rgb(171, 166, 191); font-weight: bold; --darkreader-inline-bgcolor:#403c53;" data-darkreader-inline-bgcolor="">Registration no</td>
                                        <td style="background-color: rgb(242, 222, 222); --darkreader-inline-bgcolor:#381616;" data-darkreader-inline-bgcolor=""><?php echo $row['team_name']; ?></td>
                                    </tr>
                                     <tr>
                                        <td style="background-color: rgb(171, 166, 191); font-weight: bold; --darkreader-inline-bgcolor:#403c53;" data-darkreader-inline-bgcolor="">School</td>
                                        <td style="background-color: rgb(242, 222, 222); --darkreader-inline-bgcolor:#381616;" data-darkreader-inline-bgcolor="">School of Computer Science and Engineering</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: rgb(171, 166, 191); font-weight: bold; --darkreader-inline-bgcolor:#403c53;" data-darkreader-inline-bgcolor="">Program</td>
                                        <td style="background-color: rgb(242, 222, 222); --darkreader-inline-bgcolor:#381616;" data-darkreader-inline-bgcolor="">Computer Science and Engineering</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: rgb(171, 166, 191); font-weight: bold; --darkreader-inline-bgcolor:#403c53;" data-darkreader-inline-bgcolor=""> Department</td>
                                        <td style="background-color: rgb(242, 222, 222); --darkreader-inline-bgcolor:#381616;" data-darkreader-inline-bgcolor="">Department of Information Security</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: rgb(171, 166, 191); font-weight: bold; --darkreader-inline-bgcolor:#403c53;" data-darkreader-inline-bgcolor="">Email</td>
                                        <td style="background-color: rgb(242, 222, 222); --darkreader-inline-bgcolor:#381616;" data-darkreader-inline-bgcolor=""><?php echo $row['team_members']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: rgb(171, 166, 191); font-weight: bold; --darkreader-inline-bgcolor:#403c53;" data-darkreader-inline-bgcolor="">Program</td>
                                        <td style="background-color: rgb(242, 222, 222); --darkreader-inline-bgcolor:#381616;" data-darkreader-inline-bgcolor="">MTECH5</td>
                                    </tr>
                                    
                                    <tr>
                                        <td style="background-color: rgb(171, 166, 191); font-weight: bold; --darkreader-inline-bgcolor:#403c53;" data-darkreader-inline-bgcolor="">Mobile Number</td>
                                        <td style="background-color: rgb(242, 222, 222); --darkreader-inline-bgcolor:#381616;" data-darkreader-inline-bgcolor="">xxxxxxxxxx</td>
                                    </tr>
                                </tbody></table>                                
                                </div>
                            </div>
                            </div>
                        </div>
                        <br>
                        <div class="box">
                            <div class="box-header with-border text-center">
                                <h3 class="box-title"><b>Team details details</b></h3>
                            </div>

                        <form class="form-horizontal" method="post" action="addStudents" id="employeeForm" autocomplete="off">
                            <div class="box-body">
                                <div class="form-group text-center">
                                    <h4 style="color: green; font-weight: bold; --darkreader-inline-color:#72ff72;" data-darkreader-inline-color=""></h4>
                                </div>
                            </div>
                        </form>

                        <div class="" id="showDetails" style="margin: 20px 20px 20px 20px;">
                            <div class=" table-responsive">
                            <div>
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td style="background-color: rgb(171, 166, 191); font-weight: bold; --darkreader-inline-bgcolor:#403c53;" data-darkreader-inline-bgcolor="">  Name</td>
                                        <td style="background-color: rgb(242, 222, 222); --darkreader-inline-bgcolor:#381616;" data-darkreader-inline-bgcolor="">SWARNALATHA P</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: rgb(171, 166, 191); font-weight: bold; --darkreader-inline-bgcolor:#403c53;" data-darkreader-inline-bgcolor=""> Designation</td>
                                        <td style="background-color: rgb(242, 222, 222); --darkreader-inline-bgcolor:#381616;" data-darkreader-inline-bgcolor="">Associate Professor Grade 2</td>
                                    </tr>
                                     <tr>
                                        <td style="background-color: rgb(171, 166, 191); font-weight: bold; --darkreader-inline-bgcolor:#403c53;" data-darkreader-inline-bgcolor=""> School</td>
                                        <td style="background-color: rgb(242, 222, 222); --darkreader-inline-bgcolor:#381616;" data-darkreader-inline-bgcolor="">School of Computer Science and Engineering</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: rgb(171, 166, 191); font-weight: bold; --darkreader-inline-bgcolor:#403c53;" data-darkreader-inline-bgcolor=""> Cabin</td>
                                        <td style="background-color: rgb(242, 222, 222); --darkreader-inline-bgcolor:#381616;" data-darkreader-inline-bgcolor="">SJT-510-A18</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: rgb(171, 166, 191); font-weight: bold; --darkreader-inline-bgcolor:#403c53;" data-darkreader-inline-bgcolor=""> Department</td>
                                        <td style="background-color: rgb(242, 222, 222); --darkreader-inline-bgcolor:#381616;" data-darkreader-inline-bgcolor="">Department of Information Security</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: rgb(171, 166, 191); font-weight: bold; --darkreader-inline-bgcolor:#403c53;" data-darkreader-inline-bgcolor="">  Email</td>
                                        <td style="background-color: rgb(242, 222, 222); --darkreader-inline-bgcolor:#381616;" data-darkreader-inline-bgcolor="">pswarnalatha@vit.ac.in</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: rgb(171, 166, 191); font-weight: bold; --darkreader-inline-bgcolor:#403c53;" data-darkreader-inline-bgcolor=""> intercom</td>
                                        <td style="background-color: rgb(242, 222, 222); --darkreader-inline-bgcolor:#381616;" data-darkreader-inline-bgcolor="">2822</td>
                                    </tr>
                                    
                                    <tr>
                                        <td style="background-color: rgb(171, 166, 191); font-weight: bold; --darkreader-inline-bgcolor:#403c53;" data-darkreader-inline-bgcolor=""> Mobile Number</td>
                                        <td style="background-color: rgb(242, 222, 222); --darkreader-inline-bgcolor:#381616;" data-darkreader-inline-bgcolor="">9443630735</td>
                                    </tr>
                                </tbody></table>                                
                                </div>                              
                                
                            </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
