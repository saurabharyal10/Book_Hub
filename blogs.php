<?php
include_once('../book_store/connection/connection.php');
include_once('includes/header.php');
include_once('functions/function.php');
?>
<style>
  .blog_section .box .img-box img {
    /* width: 100%; */
    height: 35vh;
  }
</style>
<!-- blog section -->

<section class="blog_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        From Our Blog
      </h2>
    </div>
    <div class="row">
      <?php
      $query = "SELECT * FROM tbl_blogs WHERE `status` = 'Publish' LIMIT 50";
      $result = $conn->query($query);
      while ($row = $result->fetch_assoc()) {
        $datas[] = $row;
      }
      foreach ($datas as $data) {
        // $id = $data['id'];
      ?>
        <div class="col-md-6">
          <div class="box">
            <div class="img-box">
              <img src="system_panel/data_informations/blog_images/<?php echo $data['blog_image']; ?>" alt="">
              <h4 class="blog_date">
                <span>
                  <?php
                  $original_date_str = $data['added_date'];
                  $original_date = new DateTime($original_date_str);
                  $formatted_date_str = $original_date->format("d F Y");

                  echo $formatted_date_str;
                  ?>
                </span>
              </h4>
            </div>
            <div class="detail-box">
              <h5>
                <?php echo $data['title']; ?>
              </h5>
              <p>
                <?php
                $book_description = $data['description'];
                $truncated_description = truncateDescription($book_description, 50);
                echo $truncated_description;
                ?>
              </p>
              <a href="blogs_description_page.php?id=<?php echo $data['id']; ?>">
                Read More
              </a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</section>

<!-- end blog section -->
<?php
include_once('includes/footer.php');
?>