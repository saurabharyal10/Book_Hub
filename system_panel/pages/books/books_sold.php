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

        <h3 class="card-title d-flex align-items-center justify-content-center">Book Sold Table</h3>

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
                  Sold Date
                </th>
              </tr>
            </thead>
            <tbody>

              <?php
              $query = "SELECT * FROM tbl_books WHERE `status` = 'sold' ";
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