<!-- Header Starts -->
<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location: ../../login.php');
}
include_once('../../../connection/connection.php');

include_once('../includes/header.php');
include_once('../../../functions/function.php');

?>
<script src="https://cdn.tiny.cloud/1/x6l5kwja0iiwrcm0vxrw5vwkw5lobnq3hksht6uyt1n637tu/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<style>
  /* Style for the larger image container */
  #largeImageView {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    text-align: center;
    z-index: 9999;
  }

  /* Style for the larger image */
  #largeImage {
    max-width: 70%;
    max-height: 100%;
    margin: auto;
    margin-top: 100px;
    /* Adjust as needed */
  }

  /* Style for the pointer cursor when hovering over the image area */
  .py-1 img {
    cursor: pointer;
  }
</style>
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
                    $id = $data['id'];
                  ?>
                    <tr>
                      <td>
                        <?php echo $i++; ?>
                      </td>
                      <td>
                        <?php echo $data['title']; ?>
                      </td>
                      <td>
                        <?php
                        $blog_description = $data['description'];
                        $truncated_description = truncateDescription($blog_description, 5);
                        echo $truncated_description;
                        ?>
                      </td>
                      <td class="py-1" id="imageCell1">
                        <img class="smallImage" src="../../data_informations/blog_images/<?php echo $data['blog_image']; ?>" alt="image" />
                      </td>
                      <td>
                        <form class="form-sample" method="post" name="status_change" id="status_change" action="blogs_process.php">
                          <input type="hidden" name="action" value="status_change">
                          <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                          <input type="hidden" name="status_change" value="<?php echo ($data['status'] == 'Unpublish') ? 'Publish' : 'Unpublish'; ?>">

                          <button type="submit" style="border-color: white;" onclick="Javascript: return confirm('Are you sure you want to change status?')">
                            <label style="cursor: pointer;" class="badge badge-<?php echo ($data['status'] == 'Unpublish') ? 'danger' : 'success'; ?>">
                              <?php echo $data['status']; ?>
                            </label>
                          </button>
                        </form>
                      </td>

                      <td>
                        <?php echo $data['added_date']; ?>
                      </td>
                      <td>
                        <a href="javascript: void(0)" class="btn-md btn-secondary p-1" style="border-radius: 5px; text-decoration: none;" onclick="Javascript: form_visibility('<?php echo $data['id'] ?>')"><i class="fa fa-edit"></i>
                          Edit</a>
                        <form class="form-sample" method="post" name="delete" id="delete" action="blogs_process.php">
                          <input type="hidden" name="action" value="delete">
                          <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                          <button type="submit" class="btn-md btn-danger mt-2 p-1" style="border-radius: 5px; color: black" onclick="Javascript: return confirm('Are you sure you want to delete?')">Delete</button>
                        </form>
                      </td>
                    </tr>
                    <tr class="bg-dark">
                      <td colspan="8" style="padding: 0px">


                        <div class="row" id="<?php echo $data['id'] ?>" style="display: none; margin: 15px 0px 0px 10px">
                          <div class="col-md-11">


                            <div class="card border-primary mt-3 mb-3">
                              <div class="card-header p-3 mb-2 tx-medium text-white bg-primary">Update Blog Information</div>
                              <div class="card-body">

                                <form class="form-horizontal" method="post" name="update" id="update" action="blogs_process.php" enctype="multipart/form-data">
                                  <input type="hidden" name="action" value="edit">
                                  <input type="hidden" name="id" value="<?php echo $data['id'] ?>">

                                  <div class="form-group row">
                                    <label for="title" class="col-sm-2 control-label">Blog Title</label>
                                    <div class="col-sm-10">
                                      <input type="text" required class="form-control" id="title" name="title" value="<?php echo $data['title']; ?>">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="description" class="col-sm-2 control-label">Blog Description<sup>*</sup></label>
                                    <div class="col-sm-10">
                                      <textarea rows="10" required class="form-control texteditor" name="description"><?php echo $data['description'] ?></textarea>
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <label for="blog_image" class="col-sm-2 control-label">Blog Image</label>
                                    <div class="col-sm-10">
                                      <input class="form-control" id="blog_image" name="blog_image" type="file"><?php echo $data['blog_image']; ?>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10 pull-right">
                                      <button type="submit" class="btn btn-success">Save
                                      </button>

                                      <button type="button" class="btn btn-secondary" onclick="Javascript: toggle_visibility('<?php echo $data['id'] ?>')">Cancel
                                      </button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>


                          </div>
                        </div>


                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
              <!-- Larger Image View Container -->
              <div id="largeImageView">
                <img id="largeImage" src="" alt="Large Image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Table ends -->

  <!-- Footer Starts -->
  <script>
    // Get all elements with the class "smallImage"
    var smallImages = document.getElementsByClassName('smallImage');

    // Get the larger image view container and the image element
    var largeImageView = document.getElementById('largeImageView');
    var largeImage = document.getElementById('largeImage');

    // Loop through each small image and attach the click event listener
    for (var i = 0; i < smallImages.length; i++) {
      smallImages[i].addEventListener('click', function() {
        // Get the source of the clicked image
        var imageSource = this.src;

        // Set the source of the larger image
        largeImage.src = imageSource;

        // Display the larger image view
        largeImageView.style.display = 'block';
      });
    }

    // Close the larger image view when clicked outside of the image
    largeImageView.addEventListener('click', function(e) {
      if (e.target === this) {
        this.style.display = 'none';
      }
    });
  </script>
  <script>
    function form_visibility(id) {
      var e = document.getElementById(id);
      if (e.style.display == '') e.style.display = 'none';
      else e.style.display = '';
    }
  </script>

  <!-- Initialize TinyMCE -->
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: [
        'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
        'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
      ],
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [{
          value: 'First.Name',
          title: 'First Name'
        },
        {
          value: 'Email',
          title: 'Email'
        },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    });
  </script>
  <?php
  include_once('../includes/footer.php');
  ?>

  <!-- Footer Ends -->