
<?php
$servername = "localhost";
$username = "id21075946_safezone";
$password = "Safezone1+";
$dbname = "id21075946_safezone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$con=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

// Fetch driver data for the provided ID
$id = $_GET["id"];
$sql = "SELECT * FROM student WHERE s_id = $id";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

$sql2 = "SELECT `name` FROM parents WHERE id = {$row['p_id']}";
$result2 = $conn->query($sql2);

$row2 = $result2->fetch_assoc();

$sql3 = "SELECT `name` FROM driver WHERE d_id = {$row['d_id']}";
$result3 = $conn->query($sql3);

$row3 = $result3->fetch_assoc();

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update</title>
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
        </div>]
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
				
				<form class="login100-form validate-form" action = '' method = 'POST'>
                <span class="login100-form-title">
						Student's Information
					</span>

                    <div class="wrap-input100 validate-input">
                        <h6>ID</h6>
						<input class="input100" type="text" name="id" id="id" placeholder="ID" value=<?php echo $row['s_id'] ?> disabled>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input">
                        <h6>Name</h6>
						<input class="input100" type="text" name="name" id="name" placeholder="Name" value=<?php echo $row['name'] ?> disabled>
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input">
                        <h6>Parent's Name</h6>
						<input class="input100" type="text" name="pn" id="pn" disabled value=<?php echo $row2['name'] ?>>
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input">
                        <h6>Driver Name</h6>
						<input class="input100" type="text" name="dn" id="dn" required placeholder="Write 'None' if leaving" value=<?php echo $row3['name'] ?>>
						<span class="focus-input100"></span>
					</div>

					
					<div class="container-login100-form-btn">
              
              <button style = "margin-top: 25px ;" class="login100-form-btn" type = 'submit' name = 'submit'>
							Update
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

      // Prepare the SQL statements
      $stmt1 = $pdo->prepare("UPDATE student SET d_id = :d_id WHERE s_id = :s_id");

      // Set the values
      $s_id = $id;

      // Fetch the driver's name from the "driver" table
      $driverName = $_POST['dn'];

      // Prepare and execute the SQL query to fetch the "id" from the "driver" table using the driver's name
      $stmt2 = $pdo->prepare("SELECT d_id FROM driver WHERE name = :driverName");
      $stmt2->bindParam(':driverName', $driverName, PDO::PARAM_STR);
      $stmt2->execute();

      // Fetch the result
      $driverRow = $stmt2->fetch(PDO::FETCH_ASSOC);

      // Get the "id" from the "driver" table
      $d_id = $driverRow['d_id'];

      // Bind the parameters for statement 1
      $stmt1->bindParam(':d_id', $d_id, PDO::PARAM_INT);
      $stmt1->bindParam(':s_id', $s_id, PDO::PARAM_INT);

      // Execute statement 1
      $stmt1->execute();

?>


<script type="text/javascript">
    window.location = "students.php";
    alert("Details Updated");
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