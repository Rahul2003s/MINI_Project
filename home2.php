<?php

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
$total_students;

$db_conn=get_db_connection();
$query="SELECT COUNT(*) FROM `miniproject`.`teams`;";
$result=mysqli_query($db_conn,$query);
if ($result) {
    $row=mysqli_fetch_assoc($result);
    $total_team=$row['COUNT(*)'];
}


$query1="SELECT COUNT(*) FROM `miniproject`.`registration_no`;";
$result1=mysqli_query($db_conn,$query1);
if ($result1) {
    $row1=mysqli_fetch_assoc($result1);
    $total_students=$row1['COUNT(*)'];
}
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
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">TEACHERS HOME PAGE</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <center>
                                    <div class="card-body">Total Teams = <?php echo $total_team; ?></div>
                                    <center>
                                    <div class="card-footer d-flex align-items-center justify-content-between" align="center"> 
                                    </div>
                                    </center>
                                </div>
                                </center>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                <center>
                                    <div class="card-body">Total Students = <?php echo $total_students; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between" align="center">
                                    </div>
                                </div>
                                </center>
                            </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Handling Students
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" style="border-width: thick;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Registration Number</th>
                                            <th>Course</th>
                                            <th>Batch</th>
                                            <th>Branch</th>
                                            <th>Team no</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>	
                                            <th>Name</th>
                                            <th>Registration Number</th>
                                            <th>Course</th>
                                            <th>Batch</th>
                                            <th>Branch</th>
                                            <th>Team no</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        $db_conn=get_db_connection();
                                        $query="SELECT * FROM `miniproject`.`registration_no`;";
                                        $result=mysqli_query($db_conn,$query);
                                        if($result){
                                            while ($row=mysqli_fetch_assoc($result)) {
                                                $team_id=find_team_no($row['reg_no']);
                                        ?>
                                        <tr>
                                            <td><a href="single_student.php?id=<?php echo $row['id'] ?>"><?php echo $row['name']; ?></a></td>
                                            <td><?php echo $row['reg_no']; ?></td>
                                            <td>Mtech Integrated Computer Science</td>
                                            <td>2020</td>
                                            <td>Vellore</td>
                                            <td>Team no: <?php echo $team_id; ?></td>
                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;  2021</div>
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