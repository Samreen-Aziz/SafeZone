<?php
$servername = "localhost";
$username = "id21075946_safezone";
$password = "Safezone1+";
$dbname = "id21075946_safezone";

try {
  // Create a new PDO instance
  $con = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

  // Set the error mode to exception
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if (isset($_POST['submit'])) {
    $pre = substr($_POST['pid'], 0, 3);
    $id = substr($_POST['pid'], 3, 5);


        // Prepare the SQL statement
        $stmt = $con->prepare("INSERT INTO student (s_id, p_id, prefix, d_id, d_prefix, rfid, name) VALUES (NULL, :p_id, :prefix, :driver_id, :d_prefix, :rfid, :name)");

        // Bind the parameters
        $stmt->bindParam(':prefix', $prefix);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':p_id', $p_id);
        $stmt->bindParam(':driver_id', $d_id);
        $stmt->bindParam(':d_prefix', $d);
        $stmt->bindParam(':rfid', $rfid);

        // Set the values
        $name = $_POST['name'];
        $d_id = 0;
        $d = 0;
        $rfid = $_POST['rfid'];
    $p_id = $id;
    $prefix = $pre;

    // Execute the statement
    $stmt->execute();
    ?>
    <script>
        alert("Student Enrolled.");
    </script>
    <?php
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
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
				
				<form class="login100-form validate-form"  method = "POST">
					<span class="login100-form-title">
						Students's Information
					</span>

					<div class="wrap-input100 validate-input">
                        <h6>Parent's Id</h6>
						<input class="input100" type="text" name="pid" id="pid" placeholder = 'Ex: AHP01' required pattern="[A-Z]{3}[0-9]{2}">
						<span class="focus-input100"></span>
					</div>

            <div class="wrap-input100 validate-input">
                <h6>Name</h6>
            <input class="input100" type="text" name="name" id="name" placeholder="Name" required>
            <span class="focus-input100"></span>
            </div>

                    <div class="wrap-input100 validate-input">
                        <h6>RFID</h6>
						<input class="input100" type="text" name="rfid" id="rfid" placeholder="Ex: 9876" pattern="[0-9]{4}" required>
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
              
              <button style = "margin-top: 25px ;" class="login100-form-btn" type = 'submit' name = "submit">
							Enroll
						</button>
					</div>
				</form>

           
        </tbody>
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