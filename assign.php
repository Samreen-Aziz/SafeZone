<?php
$servername = "localhost";
$username = "id21075946_safezone";
$password = "Safezone1+";
$dbname = "id21075946_safezone";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Assign Student</title>
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
	<link rel="stylesheet" type="text/css" href="css/enrollstudent.css">

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
				
				<form class="login100-form validate-form" action = '' method = 'POST'>
                <span class="login100-form-title">
						Assign Student
					</span>

					<div class="wrap-input100 validate-input">
                        <h6>Student's Id</h6>
						<input class="input100" type="text" name="s_id" id="s_id" placeholder="Student's Id">
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input">
                        <h6>Driver's Name</h6>
						<input class="input100" type="mobile" name="dn" id="dn" placeholder="Driver's Name">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
              
              <button style = "margin-top: 25px ;" class="login100-form-btn" type = 'submit' name = 'submit'>
							Assign
						</button>
					</div>
				</form>

           
        </tbody>
      </table>
    </div>


    <?php
if (isset($_POST['submit'])) {
    $driverName = $_POST['dn'];
    $studentId = $_POST['s_id'];

    // Retrieve the driver ID and prefix based on the driver's name
    $selectQuery = "SELECT d_id, d_prefix FROM driver WHERE `name` = ?";
    $stmt = $mysqli->prepare($selectQuery);
    $stmt->bind_param('s', $driverName);
    $stmt->execute();
    $stmt->bind_result($driverId, $driverPrefix);
    $stmt->fetch();
    $stmt->close();

    // Update the student record with the new driver ID and prefix
    $updateQuery = "UPDATE student SET d_id = ?, d_prefix = ? WHERE s_id = ?";
    $stmt = $mysqli->prepare($updateQuery);
    $stmt->bind_param('sss', $driverId, $driverPrefix, $studentId);
    $stmt->execute();

    // Check if any rows were affected during the update
    $affectedRows = $stmt->affected_rows;

    if ($affectedRows > 0) {?>
    <script type="text/javascript">
        window.location = "assign.php";
        alert("Student Assigned.");
    </script>
    <?php
    }
}
?>




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