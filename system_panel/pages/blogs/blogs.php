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

                      <form class="form-sample" method="post" name="add" id="add" action="blogs_process.php" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add">

                        <h3 class="card-title d-flex align-items-center justify-content-center">Blog Adding Form</h3>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Blog Title</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="blog_title" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Blog Description</label>
                              <div class="col-sm-9">
                                <textarea name="blog_description" class="form-control" id="blog_description" cols="70" rows="10"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Blog Image</label>
                              <div class="col-sm-9">
                                <input type="file" class="form-control file-upload-info btn btn-secondary" id="blog_image" name="blog_image">
                                <span style="padding-left:10px; color:green; display:inline-block;">Size: 1920px X 680px</span>
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


            <h3 class="card-title d-flex align-items-center justify-content-center">Blogs Table</h3>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>
                      S.No.
                    </th>
                    <th>
                      Blog Title
                    </th>
                    <th>
                      Blog Description
                    </th>
                    <th>
                      Blog Image
                    </th>
                    <th>
                      Status
                    </th>
                    <th>
                      Blog Written Date
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM tbl_blogs";
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
                        <?php echo $data['title']; ?>
                      </td>
                      <td>
                        <?php echo $data['description']; ?>
                      </td>
                      <td class="py-1">
                        <img src="../../data_informations/blog_images/<?php echo $data['blog_image']; ?>" alt="image" />
                      </td>
                      <td>
                        <label class="badge badge-success"> <?php echo $data['status']; ?></label>
                      </td>
                      <td>
                        <?php echo $data['added_date']; ?>
                      </td>
                      <td>
                        <form class="form-sample" method="post" name="delete" id="delete" action="blogs_process.php">
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