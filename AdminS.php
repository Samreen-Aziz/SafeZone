<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
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
    <div class="body-wrapper">
      <div class="container-login100">
        <div class="row">
        <div class="col-sm-6 col-xl-3"><a href="schoolstudents.php">
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <img src="assets/images/products/s5.jpg" class="card-img-top rounded-0" alt="...">
                </div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4">Student's List</h6></a>
                <div class="d-flex align-items-center justify-content-between">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3"><a href="parents.php">
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <img src="assets/images/products/s5.jpg" class="card-img-top rounded-0" alt="...">
                </div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4">Parent's List</h6></a>
                <div class="d-flex align-items-center justify-content-between">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3"><a href="enroll.php">
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <img src="assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..."></div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4">Enroll New Students</h6></a>
                <div class="d-flex align-items-center justify-content-between">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3"><a href="unenroll.php">
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <img src="assets/images/products/s5.jpg" class="card-img-top rounded-0" alt="...">
                </div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4">Unenroll Student</h6></a>
                <div class="d-flex align-items-center justify-content-between">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3"><a href="reports.php">
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <img src="assets/images/products/s7.jpg" class="card-img-top rounded-0" alt="..."></div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4">Check Reports</h6></a>
                <div class="d-flex align-items-center justify-content-between">
                  </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3"><a href="leaves.php">
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <img src="assets/images/products/s11.jpg" class="card-img-top rounded-0" alt="...">
               </div>
                <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4">Check Leaves</h6></a>
                <div class="d-flex align-items-center justify-content-between">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3"><a href="attendance.php">
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <img src="assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..."></a>
                </div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4">Check Attendance</h6></a>
                <div class="d-flex align-items-center justify-content-between">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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