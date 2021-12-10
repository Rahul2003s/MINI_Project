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

$db_conn=get_db_connection();
$query="SELECT COUNT(*) FROM `miniproject`.`teams`;";
$result=mysqli_query($db_conn,$query);
if ($result) {
    $row=mysqli_fetch_assoc($result);
    $total_team=$row['COUNT(*)'];
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
                    <section class="py-5 text-center container">
                        <div class="row py-lg-5">
                          <div class="col-lg-6 col-md-8 mx-auto">
                            <h1 class="fw-light">Team Overview</h1>
                            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                            <!-- <p>
                              <a href="#" class="btn btn-primary my-2">Main call to action</a>
                              <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                            </p> -->
                          </div>
                        </div>
                      </section>

                      <div class="album py-5 bg-light">
                        <div class="container">
                          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            <?php
                            $project_detail;
                            $db_conn=get_db_connection();
                            $query="SELECT * FROM `miniproject`.`teams`;";
                            $result=mysqli_query($db_conn,$query);
                            if($result){
                                while ($row=mysqli_fetch_assoc($result)) {
                                    $team_id=$row['team_id'];
                                    $team_name=$row['team_name'];
                                    $team_members=$row['team_members'];
                                    $project_detail=get_project_details($team_id);
                            ?>
                            <div class="col">
                              <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#343a40"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Team-<?php echo $team_id; ?></text></svg>
                                <div class="card-body">
                                  <p class="card-text"><h3><?php echo $project_detail['project_name']; ?></h3><?php echo $project_detail['project_dic']; ?></p>
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                      <a href="team_ind_teach.php?id=<?php echo $team_id; ?>" class="btn btn-primary  active" role="button" aria-pressed="true">View More</a>
                                    </div>
                                    <small class="text-muted">Completed <?php echo $project_detail['project_completed']; ?></small>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            }
                            ?>
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
