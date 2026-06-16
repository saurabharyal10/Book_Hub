<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location: login.php');
}
include_once('../connection/connection.php');

?>

<!-- Header Starts -->
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="images/logo.svg" class="mr-2" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face28.jpg" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <!-- <button type="Submit" class="submit_btn"> -->
              <a class="dropdown-item" href="logout_process.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
              <!-- </button> -->
              <!-- <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a> -->
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>

      <!-- Header Ends -->


      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">

          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="pages/about_us/about_us.php">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">About Us</span>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="pages/categories/categories.php">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Categories</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/books/books.php">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Books</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/books/books.php">Books</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/books//books_sold.php">Books Sold</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/blogs/blogs.php">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Blogs</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/contact_us/contact_us.php">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Contact Us</span>
            </a>
          </li>

        </ul>
      </nav>
      <!-- partial -->

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-12 mb-4 mb-xl-0">
                  <marquee behavior="" direction="">
                    <h3 class="font-weight-bold"><i>Welcome Admin - This is Your Universe.</i></h3>
                  </marquee>
                  <h6 class="font-weight-normal mb-0">A world where you are the creater, maintainer and destroyer !</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin transparent">
              <?php
              // For Book 
              $book_data = "SELECT COUNT(id) AS total_books FROM tbl_books";
              $result = $conn->query($book_data);
              while ($row_book = $result->fetch_assoc()) {
                $infos = $row_book;
                // var_dump($infos);
              }
              // For Book Category 
              $category_data = "SELECT COUNT(id) AS total_categories FROM tbl_book_categories";
              $result = $conn->query($category_data);
              while ($row_categories = $result->fetch_assoc()) {
                $datas = $row_categories;
              }
              // For Blogs 
              $blog_data = "SELECT COUNT(id) AS total_blogs FROM tbl_blogs";
              $result = $conn->query($blog_data);
              while ($row_blogs = $result->fetch_assoc()) {
                $blogs = $row_blogs;
              }
              // For Contact Us 
              $contact_data = "SELECT COUNT(id) AS total_queries FROM tbl_contactus";
              $result = $conn->query($contact_data);
              while ($row_contactus = $result->fetch_assoc()) {
                $queries = $row_contactus;
              }
              ?>
              <div class="row">
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body text-center">
                      <p class="mb-3">Total Books</p>
                      <p class="fs-30 mb-2"><?php echo $infos['total_books']; ?></p>
                      <p>(Recently Updated)</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body text-center">
                      <p class="mb-3">Categories of Books</p>
                      <p class="fs-30 mb-2"><?php echo $datas['total_categories']; ?></p>
                      <p>(Recently Updated)</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body text-center">
                      <p class="mb-3">Number of Blogs</p>
                      <p class="fs-30 mb-2"><?php echo $blogs['total_blogs']; ?></p>
                      <p>(Recently Updated)</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body text-center">
                      <p class="mb-3">Contact Us Queries</p>
                      <p class="fs-30 mb-2"><?php echo $queries['total_queries']; ?></p>
                      <p>(Recently Updated)</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="row">
                          <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                            <div class="ml-xl-4 mt-3">
                              <p class="card-title">Detailed Reports</p>
                              <h1 class="text-primary"><?php echo $infos['total_books']; ?></h1>
                              <!-- <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3> -->
                              <p class="mb-2 mb-xl-0">The above integer is the total number of books, the library of aananda medidatation center consists of.
                              </p>
                            </div>
                          </div>
                          <div class="col-md-12 col-xl-9">
                            <div class="row">
                              <div class="col-md-6 border-right">
                                <div class="table-responsive mb-3 mb-md-0 mt-3">
                                  <table class="table table-borderless report-table">
                                    <?php

                                    $colors = array('bg-primary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-secondary', 'bg-dark');
                                    $color_index = 0; // Initialize color index

                                    $query_info = "SELECT * FROM tbl_book_categories";
                                    $result = $conn->query($query_info);
                                    while ($row_info = $result->fetch_assoc()) {
                                      $categories_datas[] = $row_info;
                                    }
                                    foreach ($categories_datas as $categories_data) {
                                      $category_name = $categories_data['category_name'];
                                      $query_books_count = "SELECT COUNT(*) AS book_count FROM tbl_books WHERE category_name = '$category_name'";
                                      $result_books_count = $conn->query($query_books_count);
                                      $row_books_count = $result_books_count->fetch_assoc();
                                      $book_count = $row_books_count['book_count'];

                                      $color = $colors[$color_index];
                                      // Increment color index and reset if it exceeds the number of colors available
                                      $color_index++;
                                      if ($color_index >= count($colors)) {
                                        $color_index = 0;
                                      }

                                      // For Progress Bar 
                                      $categoryBooks = $book_count; // Example value
                                      $totalBooks = $infos['total_books']; // Example value
                                      $ratio = ($categoryBooks / $totalBooks) * 100;

                                      // Set the width of the progress bar
                                      $progressWidth = $ratio . '%';
                                    ?>
                                      <tr>
                                        <td class="text-muted"> <?php echo $categories_data['category_name']; ?></td>
                                        <td class="w-100 px-0">
                                          <div class="progress progress-md mx-4">
                                            <div class="progress-bar <?php echo $color; ?>" role="progressbar" style="width: <?php echo $progressWidth; ?>" aria-valuenow="<?php echo $categoryBooks; ?>" aria-valuemin="0" aria-valuemax="<?php echo $totalBooks; ?>"></div>
                                          </div>
                                        </td>
                                        <td>
                                          <h5 class="font-weight-bold mb-0"><?php echo $book_count; ?></h5>
                                        </td>
                                      </tr>
                                    <?php
                                    }
                                    ?>

                                  </table>
                                </div>
                              </div>
                              <!-- <div class="col-md-6 mt-3">
                                <canvas id="north-america-chart"></canvas>
                                <div id="north-america-legend"></div>
                              </div> -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- content-wrapper ends -->


        <!-- Footer Starts -->

        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-flex align-items-center justify-content-center">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023. All rights reserved to <a href="https://www.saurabh-aryal.com.np/" target="_blank"> Saurabh Aryal</a>.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
<!-- Footer Ends -->