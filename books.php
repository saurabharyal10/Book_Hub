<?php
include_once('../book_store/connection/connection.php');
include_once('includes/header.php');
include_once('functions/function.php');

?>

<!-- <div class="search-container">
  <div class="navbar">
    <input type="text" id="bookNameInput" placeholder="Search by book name...">
    <div class="filters">
      <label><input type="checkbox" name="category" value="romance"> Romance</label>
      <label><input type="checkbox" name="category" value="course"> Course</label>
      <label><input type="checkbox" name="category" value="fiction"> Fiction</label>
      <label><input type="checkbox" name="category" value="novels"> Novels</label>
      <label><input type="checkbox" name="category" value="motivational"> Motivational</label>
    </div>
    <button onclick="search()">Search</button>
  </div>
  <div id="searchResults"></div>
</div> -->

<section class="blog_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Searching For Book?
      </h2>
      <h4>
        Jump Into the Search Bar
      </h4>
    </div>

    <div class="book_category">
      <h4 class="blog_date m-2 mt-5">
        All Books
      </h4>
    </div>
    <div class="row">
      <?php
      // Single Query 
      //   $query = "SELECT * FROM tbl_books LIMIT 100";
      // $result = $conn->query($query);
      // while ($datas = $result->fetch_assoc()) {
      //   var_dump($datas);
      // }
      // foreach ($datas as $data) {}
      $query = "SELECT * FROM tbl_books";
      $result = $conn->query($query);
      while ($row = $result->fetch_assoc()) {
        $datas[] = $row;
      }
      foreach ($datas as $data) {
      ?>
        <div class="col-md-3 col-6">
          <div class="box">
            <div class="img-box">
              <img src="system_panel/data_informations/books_images/<?php echo $data['book_image']; ?>" alt="">
            </div>
            <div class="detail-box">
              <h5 style=" text-align: center; margin-top: -30px;">
                <?php
                echo $data['book_name'];
                ?>
              </h5>
              <p>
                <?php
                $book_description =  $data['book_description'];
                $truncated_description = truncateDescription($book_description, 45);
                echo $truncated_description;
                ?>
              </p>
            </div>
            <div class="read-more mb-3" style="text-align: center; margin-top: -35px;">
              <a href="">
                Read More...
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


<?php
include_once('includes/footer.php');
?>