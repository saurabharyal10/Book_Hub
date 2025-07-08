<?php
include_once('../book_store/connection/connection.php');
include_once('includes/header.php');
include_once('functions/function.php');
?>


<!-- catagory section -->

<section class="blog_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Book We Have
      </h2>
    </div>
    <?php
    $query_categories = "SELECT * FROM tbl_book_categories";
    $result = $conn->query($query_categories);
    while ($row_info = $result->fetch_assoc()) {
      $categories_datas[] = $row_info;
    }
    foreach ($categories_datas as $categories_data) {
      $category_name = $categories_data['category_name'];
      $query_book = "SELECT * FROM tbl_books WHERE category_name = '$category_name' LIMIT 8";
      $result_books = $conn->query($query_book);

      $book_datas = array();
      // Check if there are books available for the current category
      if ($result_books->num_rows > 0) {
    ?>
        <div class="book_category">
          <h4 class="blog_date m-2 mt-3"><b>
              <?php echo $categories_data['category_name']; ?>
            </b>
          </h4>
        </div>
        <div class="row" style="margin-top: -5vh;">
          <?php
          while ($row_books = $result_books->fetch_assoc()) {
            $book_datas[] = $row_books;
          }
          foreach ($book_datas as $book_data) {
          ?>
            <div class="col-md-3">
              <div class="box">
                <div class="img-box">
                  <img src="system_panel/data_informations/books_images/<?php echo $book_data['book_image']; ?>" height="350" alt="">
                </div>
                <div class="detail-box">
                  <h5 style=" text-align: center; margin-top: -30px;">
                    <?php
                    echo $book_data['book_name'];
                    ?>
                  </h5>
                  <p>
                    <?php
                    $book_description =  $book_data['book_description'];
                    $truncated_description = truncateDescription($book_description, 45);
                    echo $truncated_description;
                    ?>
                  </p>
                </div>
                <div class="read-more mb-3" style="text-align: center; margin-top: -35px;">
                  <a href="books_description_page.php?id=<?php echo $book_data['id']; ?>">
                    Read More...
                  </a>
                </div>
              </div>
            </div>
          <?php
          }
          ?>

        </div>
    <?php
      }
    }
    ?>

  </div>
</section>

<!-- end catagory section -->

<?php
include_once('includes/footer.php');
?>