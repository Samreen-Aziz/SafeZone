<?php
$servername = "localhost";
$username = "id21075946_safezone";
$password = "Safezone1+";
$dbname = "id21075946_safezone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$con=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$stmt = $con->query("SELECT * FROM driver ORDER BY d_id DESC LIMIT 1");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Driver Details</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />

<!--===============================================================================================-->	
<link rel="icon" style="width: 180px;" type="image/png" href="assets/images/logos/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/enroll.css">

</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="index.html" class="text-nowrap logo-img">
            <img src="assets/images/logos/SAFEZONE.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="sidebar-item">
              <a class="sidebar-link" href="AdminV.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="driver.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Driver's List</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="add.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Add Driver</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="delete.php" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Delete Driver</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="students.php" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Student's List</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="assign.php" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Assign Students</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="vcr.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Van Change Request</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="routes.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Add Routes</span>
              </a>
            </li>
            
            
          </ul>
        </nav>
      </div>
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper"><div class="limiter">
		<div class="container-login100">
      <div class="wrap-login100">

      <h4>Information</h4>
				
			<table>
        <tr>
          <td>
          <h2>Id: </h2>
          </td>
          <td><h3><?php foreach($rows as $row){
                echo $row['d_prefix'].$row['d_id'];
            } ?></h3></td>
        </tr>

        <tr>
          <td><h2>Password: </h2></td>
          <td>
              <h3><?php foreach($rows as $row){
              echo $row['password'];
            } ?></h3></td>
        </tr>

      </table>	        
      
    </div>



			</div>
      </div>
</div></div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
</body>

</html>