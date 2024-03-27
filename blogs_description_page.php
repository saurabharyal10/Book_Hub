<?php
include_once('../book_store/connection/connection.php');
include_once('includes/header.php');
include_once('functions/function.php');
?>

<!-- blog section -->
<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;
// var_dump($id);
$query = "SELECT * FROM tbl_blogs WHERE id = $id";
$result = $conn->query($query);
while ($row = $result->fetch_assoc()) {
  $data = $row;
}
?>
<section class="blog_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        <?php echo $data['title']; ?>
      </h2>
    </div>
    <div class="row">
      <div class="col-md-12">

        <div class="box">
          <div class="img-box">
            <img src="system_panel/data_informations/blog_images/<?php echo $data['blog_image']; ?>" alt="">
          </div>
        </div>
        <div class="detail-box mt-5">
          <p>
            <?php
            $book_description = $data['description'];
            // $truncated_description = truncateDescription($book_description, 50);
            echo $book_description;
            ?>
          </p>
        </div>
        <h5 class="blog_date mt-5 text-left"> Posted On:
          <span>
            <?php
            $original_date_str = $data['added_date'];
            $original_date = new DateTime($original_date_str);
            $formatted_date_str = $original_date->format("d F Y");

            echo $formatted_date_str;
            ?>
          </span>
        </h5>
      </div>
    </div>
  </div>
</section>



<!-- end blog section -->
<?php
include_once('includes/footer.php');
?>