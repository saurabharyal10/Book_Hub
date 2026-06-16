<!-- Header Starts -->
<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location: ../../login.php');
}
include_once('../../../connection/connection.php');

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
            <h3 class="card-title d-flex align-items-center justify-content-center">Contact Us Table</h3>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>
                      S.No.
                    </th>
                    <th>
                      Name
                    </th>
                    <th>
                      Email
                    </th>
                    <th>
                      Phone Number
                    </th>
                    <th>
                      Message
                    </th>
                    <th>
                      Query Date
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM tbl_contactus";
                  $result = $conn->query($query);
                  while ($row = $result->fetch_assoc()) {
                    $datas[] = $row;
                  }
                  $i = 1;
                  foreach ($datas as $data) {
                  ?>
                    <tr>
                      <td>
                        <?php echo $i++; ?>
                      </td>
                      <td>
                        <?php echo $data['name']; ?>
                      </td>
                      <td>
                        <?php echo $data['email']; ?>
                      </td>
                      <td class="py-1">
                        <?php echo $data['phone_number']; ?>
                      </td>
                      <td>
                        <?php echo $data['message']; ?>
                      </td>
                      <td>
                        <?php echo $data['query_date']; ?>
                      </td>
                      <td>
                        <form class="form-sample" method="post" name="delete" id="delete" action="contactus_process.php">
                          <input type="hidden" name="action" value="delete">
                          <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                          <button type="submit" class="btn-md btn-danger p-1" style="border-radius: 5px; color: black" onclick="Javascript: return confirm('Are you sure you want to delete?')">Delete</button>
                        </form>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
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