<?php
$servername = "localhost";
$username = "id21075946_safezone";
$password = "Safezone1+";
$dbname = "id21075946_safezone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Enroll</title>
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
              <a class="sidebar-link" href="AdminS.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="schoolstudents.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Student's List</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="parents.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Parent's List</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="enroll.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Enroll</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="unenroll.php" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Unenroll</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="reports.php" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Reports</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="leaves.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Leaves</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="attendance.php" aria-expanded="false">
                <span>
                  <i class="ti ti-typography"></i>
                </span>
                <span class="hide-menu">Attendance</span>
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
				
				<form class="login100-form validate-form"  method = 'POST'>
					<span class="login100-form-title">
						Parent's Information
					</span>

					<div class="wrap-input100 validate-input">
                        <h6>Name</h6>
						<input class="input100" type="text" name="name" id="name" placeholder="Name" required>
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input">
                        <h6>Mobile Number</h6>
						<input class="input100" type="tel" name="number" id="number" placeholder="Ex: 03331234567" required pattern="[0-9]{11}">
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input">
                        <h6>Email</h6>
						<input class="input100" type="email" name="email" id="email" placeholder="Ex: example@gmail..com" required>
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input">
                        <h6>Address</h6>
						<input class="input100" type="text" name="address" id="address" placeholder="Address" required>
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
              <table><tr><td>
              <button style = "margin-top: 25px;" class="login100-form-btn-2" name = 'enrolled' formnovalidate>Enrolled Already
							
						</button>
						</td><td>
              <button style = "margin-top: 25px;" class="login100-form-btn" type = 'submit' name = 'submit' value = 'submit'>
							Enroll
						</button>
                        </td></tr></table>
					</div>
				</form>


        <?php

           if(isset($_POST['submit'])) {

          

          try {
            // Create a new PDO instance
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        
            // Set the error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            // Prepare the SQL statement
            $stmt = $pdo->prepare("INSERT INTO parents (id, prefix, name, password, phone, email, address) VALUES (NULL,:prefix,:name,:name,:number,:email,:address)");
        
            // Bind the parameters
            $stmt->bindParam(':prefix', $prefix);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':number', $number);
            $stmt->bindParam(':address', $address);
        
            // Set the values
            $name = $_POST['name'];
          $number = $_POST['number'];
          $email = $_POST['email'];
          $address = $_POST['address'];
          $prefix = 'AHP';
        
            // Execute the statement
            $stmt->execute();
            ?>

            <script type="text/javascript">
window.location = "enrollstudent.php";
</script>   

        <?php
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        }

        if(isset($_POST['enrolled'])){  ?>
          <script type="text/javascript">
window.location = "enrolled.php";
</script>   
       <?php }

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