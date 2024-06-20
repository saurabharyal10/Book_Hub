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

            <button type="button" class="btn btn-success m-bot-1" onclick="Javascript: form_visibility('addnew')"><i class="fa fa-plus"></i> ADD</button>

            <div class="row" style="display: none;" id="addnew">
              <div class="col-lg-12 grid-margin stretch-card mt-3">
                <div class="col-12">
                  <div class="card" style="border: 1px solid black; padding: 10px; ">
                    <div class="card-body">

                      <form class="form-sample" method="post" name="add" id="add" action="categories_process.php">
                        <input type="hidden" name="action" value="add">

                        <h3 class="card-title d-flex align-items-center justify-content-center">Book Categories Form</h3>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Category Name</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="category_name" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light" onclick="Javascript: form_visibility('addnew')" type="button">Cancel</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <h3 class="card-title d-flex align-items-center justify-content-center">Book Categories Table</h3>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>
                      S.No.
                    </th>
                    <th>
                      Category name
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM tbl_book_categories";
                  $result = $conn->query($query);
                  while ($row = $result->fetch_assoc()) {
                    $datas[] = $row;
                  }
                  foreach ($datas as $data) {
                  ?>
                    <tr>
                      <td>
                        <?php echo $data['id']; ?>
                      </td>
                      <td>
                        <?php echo $data['category_name']; ?>
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
  <script>
    function form_visibility(id) {
      var e = document.getElementById(id);
      if (e.style.display == '') e.style.display = 'none';
      else e.style.display = '';
    }
  </script>
  <?php
  include_once('../includes/footer.php');
  ?>

  <!-- Footer Ends -->