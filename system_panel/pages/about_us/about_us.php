<!-- Header Starts -->
<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location: ../../login.php');
}

include_once('../includes/header.php');
?>
<!-- Header Ends -->

<!-- Main Table Starts -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title d-flex align-items-center justify-content-center">About Us Table</h3>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>
                      S.No.
                    </th>
                    <th>
                      Title
                    </th>
                    <th>
                      Description
                    </th>
                    <th>
                      About Image
                    </th>
                    <th>
                      Status
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      1.
                    </td>
                    <td>
                      Who We Are?
                    </td>
                    <td>
                      This is a Book Store.
                    </td>
                    <td class="py-1">
                      <img src="../../images/faces/face1.jpg" alt="image" />
                    </td>
                    <td>
                      <label class="badge badge-success">Publish</label>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Table ends -->


  <!-- Footer Starts -->

  <?php
  include_once('../includes/footer.php');
  ?>

  <!-- Footer Ends -->