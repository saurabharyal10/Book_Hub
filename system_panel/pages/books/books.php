<!-- Header Starts -->
<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location: ../../login.php');
}



if (isset($_SESSION['book_message'])) { ?>
  <script>
    alert('<?php echo $_SESSION['book_message']; ?>');
  </script>
<?php
  unset($_SESSION['book_message']);
}

include_once('../../../connection/connection.php');

include_once('../includes/header.php');
?>
<!-- Header Ends -->

<!-- Main Table Starts -->
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-body">

        <button type="button" class="btn btn-success m-bot-1" onclick="Javascript: form_visibility('addnew')"><i class="fa fa-plus"></i> ADD</button>

        <div class="row" style="display: none;" id="addnew">
          <div class="col-lg-12 grid-margin stretch-card mt-3">
            <div class="col-12">
              <div class="card" style="border: 1px solid black; padding: 10px; ">
                <div class="card-body">

                  <form class="form-sample" method="post" name="add" id="add" action="books_process.php" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add">

                    <h3 class="card-title d-flex align-items-center justify-content-center">Book Adding Form</h3>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Book Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="book_name" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Book Description</label>
                          <div class="col-sm-9">
                            <textarea name="book_description" class="form-control" id="book_description" cols="70" rows="10"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Book Image</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control file-upload-info btn btn-secondary" id="book_image" name="book_image">
                            <!-- <span style="padding-left:10px; color:green; display:inline-block;">Size: 1920px X 680px</span> -->
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Author</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="author" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Category</label>
                          <div class="col-sm-9">

                            <select class="form-control" name="category">
                              <?php
                              $query = "SELECT * FROM tbl_book_categories";
                              $result = $conn->query($query);
                              while ($row = $result->fetch_assoc()) {
                                $infos[] = $row;
                              }
                              foreach ($infos as $info) {
                              ?>
                                <option value="<?php echo $info['category_name']; ?>" name="category1"><?php echo $info['category_name']; ?></option>
                              <?php
                              }
                              ?>
                            </select>
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

        <h3 class="card-title d-flex align-items-center justify-content-center">Book Table</h3>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>
                  S.No.
                </th>
                <th>
                  Book name
                </th>
                <th>
                  Description
                </th>
                <th>
                  Book Image
                </th>
                <th>
                  Author
                </th>
                <th>
                  Category
                </th>
                <th>
                  Added Date
                </th>
                <th>
                  Action
                </th>
              </tr>
            </thead>
            <tbody>

              <?php
              $query = "SELECT * FROM tbl_books WHERE `status` != 'sold' ";
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
                    <?php echo $data['book_name']; ?>
                  </td>
                  <td>
                    <?php echo $data['book_description']; ?>
                  </td>
                  <td class="py-1">
                    <img src="../../data_informations/books_images/<?php echo $data['book_image']; ?>" alt="image" />
                  </td>
                  <td>
                    <?php echo $data['author']; ?>
                  </td>
                  <td>
                    <?php echo $data['category_name']; ?>
                  </td>
                  <td>
                    <label class="badge badge-success"> <?php echo $data['added_date']; ?></label>
                  </td>
                  <td>
                    <form class="form-sample" method="post" name="delete" id="delete" action="books_process.php">
                      <input type="hidden" name="action" value="delete">
                      <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                      <button type="submit" class="btn-md btn-danger p-1" style="border-radius: 5px; color: black" onclick="Javascript: return confirm('Are you sure you want to delete?')">Delete</button>
                    </form>
                    <form class="form-sample" method="post" name="sold" id="sold" action="books_process.php">
                      <input type="hidden" name="action" value="sold">
                      <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                      <button type="submit" class="btn-md btn-warning mt-2 p-1" style="border-radius: 5px;" onclick="Javascript: return confirm('Are you sure you want to sold?')">Sold</button>
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