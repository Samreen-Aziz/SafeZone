<?php
$servername = "localhost";
$username = "id21075946_safezone";
$password = "Safezone1+";
$dbname = "id21075946_safezone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$con=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM route";
$result = mysqli_query($conn, $query);

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
						Driver's Information
					</span>

					<div class="wrap-input100 validate-input">
                        <h6>Name</h6>
						<input class="input100" type="text" name="name" id="name" placeholder="Name" required>
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input">
                        <h6>Mobile Number</h6>
						<input class="input100" type="tel" name="number" id="number" placeholder="Ex: 03221234567" pattern="[0-9]{11}">
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input">
                        <h6>Email</h6>
						<input class="input100" type="email" name="email" id="email" placeholder="Email" required>
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input">
                        <h6>Address</h6>
						<input class="input100" type="text" name="address" id="address" placeholder="Address" required>
						<span class="focus-input100"></span>
					</div>
					
                    <div class="wrap-input100 validate-input">
                        <h6>Vehicle Number</h6>
						<input class="input100" type="text" name="vno" id="vno" placeholder="Ex: AAA123" required pattern="[A-Z]{3}[0-9]{3}">
						<span class="focus-input100"></span>
					</div>


      <h6 >Route
    <select name="route" class="input10" id="route" required>
    <option value="" disabled selected>Select Route</option>
   <?php
   while ($row = mysqli_fetch_assoc($result)) {

    $id = $row['route_id'];
     echo "<option value=\"$id\">$id</option>"; }?>
      
    </select></h6>

    <h6>Van Type
    <select name="vt" id="vt" required class="input10">
    <option value="" disabled selected >Select Van Type</option>
      <option value="Hi Roof">Hiroof</option>
      <option value="Coaster">Coaster</option>
    </select></h6>
						
					
					<div class="container-login100-form-btn">
              
              <button style = "margin-top: 25px ;" class="login100-form-btn" type = 'submit' name = 'submit'>
							Add
						</button>
					</div>
				</form>

           
        </tbody>
      </table>
    </div>


    <?php
if (isset($_POST['submit'])) {
  try {
      // Create a new PDO instance
      $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
      // Set the error mode to exception
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt2 = $pdo->prepare("INSERT INTO van (vehicle_number, route_id, capacity, type) VALUES (:vehicle, :route, :cap, :type)");
      // Prepare the SQL statements
      $stmt1 = $pdo->prepare("INSERT INTO driver (d_id, d_prefix, password, name, phone, email, address, vehicle_number) 
      VALUES (NULL, 'AHD', :name, :name, :phone, :email, :address, :vehicle)");
      // Bind the parameters for statement 1
      $stmt1->bindParam(':name', $name);
      $stmt1->bindParam(':phone', $phone);
      $stmt1->bindParam(':email', $email);
      $stmt1->bindParam(':address', $address);
      $stmt1->bindParam(':vehicle', $vno);
      // Bind the parameters for statement 2
      $stmt2->bindParam(':vehicle', $vno);
      $stmt2->bindParam(':route', $route);
      $stmt2->bindParam(':cap', $vc);
      $stmt2->bindParam(':type', $vt);
      // Set the values
      $name = $_POST['name'];
      $phone = $_POST['number'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $vno = $_POST['vno'];
      $route = $_POST['route'];
      $vt = $_POST['vt'];
      if ($_POST['vt'] == 'Hi Roof'){
        $vc = 15;
      }
      else
      $vc = 29;

      $stmt2->execute();
      $stmt1->execute();
?>

<script type="text/javascript">
    window.location = "driverdetails.php";
    alert("Driver Added.");
</script>

<?php
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
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