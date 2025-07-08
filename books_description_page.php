<?php
include_once('../book_store/connection/connection.php');
include_once('includes/header.php');
include_once('functions/function.php');
?>

<!-- blog section -->
<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;
// var_dump($id);
$query = "SELECT * FROM tbl_books WHERE id = $id";
$result = $conn->query($query);
while ($row = $result->fetch_assoc()) {
  $data = $row;
}
?>

<style>
  .book_section .box .img-box img {
    width: 95%;
    height: 78vh;
  }
</style>
<section class="book_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        <?php echo $data['book_name']; ?>
      </h2>
    </div>
    <div class="row mt-5">
      <!-- <div class="col-md-12"> -->
      <div class="col-md-6">
        <div class="box">
          <div class="img-box">
            <img src="system_panel/data_informations/books_images/<?php echo $data['book_image']; ?>" alt="img.jpg">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <p style="text-align: justify;">
            <?php
            $book_description = $data['book_description'];
            echo $book_description;
            ?>
          </p>
        </div>
        <h5 class="blog_date mt-4 text-left"> Author: &nbsp;<?php echo $data['author']; ?></h5>
        <h5 class="blog_date mt-1 text-left"> Book Category: &nbsp;<?php echo $data['category_name']; ?></h5>
        <!-- </div> -->
        <!-- <h5 class="blog_date mt-3 text-left"> Added On: -->
        <span>
          <?php
          // $original_date_str = $data['added_date'];
          // $original_date = new DateTime($original_date_str);
          // $formatted_date_str = $original_date->format("d F Y");

          // echo $formatted_date_str;
          ?>
        </span>
        <!-- </h5> -->
      </div>
    </div>
  </div>
</section>



<!-- end blog section -->
<?php
include_once('includes/footer.php');
?>