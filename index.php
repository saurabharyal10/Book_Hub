<?php
include_once('../book_store/connection/connection.php');
include_once('includes/header.php');
include_once('functions/function.php');
?>

<!-- slider section -->
<section class="slider_section ">
  <div id="customCarousel1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container ">
          <div class="row">
            <div class="col-md-6">
              <div class="detail-box">
                <h5>
                  Book Hub
                </h5>
                <h1>
                  Strengthen Knowledge <br>
                  Conquer The World
                </h1>
                <p>
                  Open a Book, Open Your Mind.
                </p>
                <a href="about.php">
                  Read More
                </a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="img-box">
                <img src="images/slider-img.png" height="450vh" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container ">
          <div class="row">
            <div class="col-md-6">
              <div class="detail-box">
                <h5>
                  Book Hub
                </h5>
                <h1>
                  For All Your <br>
                  Reading Needs
                </h1>
                <p>
                  Reading: A Journey of a Thousand Words
                </p>
                <a href="about.php">
                  Read More
                </a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="img-box">
                <img src="images/about-img.png" height="450vh" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container ">
          <div class="row">
            <div class="col-md-6">
              <div class="detail-box">
                <h5>
                  Book Hub
                </h5>
                <h1>
                  A New Weapon <br>
                  Books
                </h1>
                <p>
                  Reading: Where Dreams Take Flight
                </p>
                <a href="about.php">
                  Read More
                </a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="img-box">
                <img src="images/slider-img.png" height="450vh" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel_btn_box ">
      <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</section>
<!-- end slider section -->


<!-- catagory section -->

<section class="catagory_section layout_padding">
  <div class="catagory_container">
    <div class="container ">
      <div class="heading_container heading_center">
        <h2>
          Books Categories
        </h2>
        <p>
          Here we provide many more diversties in books collections like motivational, romantic, religious, banking sectors and many more others.
        </p>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4 ">
          <div class="box ">
            <div class="img-box">
              <img src="images/cat1.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Textbooks
              </h5>
              <p>
                Discover our range of textbooks, essential resources designed to equip students with the knowledge they need for academic success.
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 ">
          <div class="box ">
            <div class="img-box">
              <img src="images/cat2.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Science
              </h5>
              <p>
                Explore our collection of science textbooks, expertly curated to provide students with essential knowledge and insights for their academic journey.
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 ">
          <div class="box ">
            <div class="img-box">
              <img src="images/cat3.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                History
              </h5>
              <p>
                Delve into our selection of history textbooks, thoughtfully crafted to immerse students in key events and perspectives that shape our understanding of the past.
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 ">
          <div class="box ">
            <div class="img-box">
              <img src="images/cat4.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Biography
              </h5>
              <p>
                Browse our range of biography textbooks, showcasing compelling life stories that inspire students and enrich their understanding of influential figures throughout history.
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 ">
          <div class="box ">
            <div class="img-box">
              <img src="images/cat5.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Adventure
              </h5>
              <p>
                Discover our collection of adventure textbooks, filled with thrilling narratives that ignite students' imaginations and encourage exploration of new ideas and experiences.
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 ">
          <div class="box ">
            <div class="img-box">
              <img src="images/cat6.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Fantasy
              </h5>
              <p>
                Explore our selection of fantasy textbooks, featuring imaginative worlds and captivating tales that inspire creativity and transport students to realms of wonder.
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 ">
          <div class="box ">
            <div class="img-box">
              <img src="images/cat4.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Motivational
              </h5>
              <p>
                Discover our range of motivational textbooks, designed to inspire students with powerful insights and strategies for personal growth and success in their endeavors.
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 ">
          <div class="box ">
            <div class="img-box">
              <img src="images/cat5.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Religious
              </h5>
              <p>
                Explore our collection of religious textbooks, offering deep insights and teachings that foster understanding and reflection on various spiritual traditions and beliefs.
              </p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 ">
          <div class="box ">
            <div class="img-box">
              <img src="images/cat6.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Novels
              </h5>
              <p>
                Browse our selection of novels, featuring diverse stories that captivate readers and spark their imagination, perfect for students seeking to enhance their literary experience.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end catagory section -->

<!-- about section -->

<section class="about_section layout_padding">
  <div class="container ">
    <div class="row">
      <div class="col-md-6">
        <div class="img-box">
          <img src="images/about-img.png" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              About Our Bookstore
            </h2>
          </div>
          <p style="text-align: justify;">
            Welcome to our bookstore, your destination for a diverse range of literature that inspires and educates. We offer an extensive collection across various genres, ensuring there’s something for everyone.

            Explore categories including textbooks for academic success, captivating novels, and insightful biographies. Our selection features adventure and fantasy titles that transport readers to new worlds, as well as motivational books that inspire personal growth.

            For those seeking spiritual enlightenment, our religious books provide profound insights into various faiths. Each section is carefully curated to enrich your reading experience and support your learning journey.

            At our bookstore, we believe in the power of words to transform lives. We are committed to providing high-quality literature and fostering a love for reading in our community. Whether you are a student, an avid reader, or simply exploring new ideas, you will find the perfect book with us.

            Join us in celebrating the written word and discover the endless possibilities within the pages of our books!
          </p>
          <a href="about.php">
            Read More
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end about section -->

<!-- book category section -->

<section class="blog_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Book We Have
      </h2>
    </div>
    <?php
    $query_categories = "SELECT * FROM tbl_book_categories LIMIT 5";
    $result = $conn->query($query_categories);
    while ($row_info = $result->fetch_assoc()) {
      $categories_datas[] = $row_info;
    }
    foreach ($categories_datas as $categories_data) {
      $category_name = $categories_data['category_name'];
      $query_book = "SELECT * FROM tbl_books WHERE category_name = '$category_name' LIMIT 4";
      $result_books = $conn->query($query_book);

      $book_datas = array();
      // Check if there are books available for the current category
      if ($result_books->num_rows > 0) {
    ?>
        <div class="book_category">
          <h4 class="blog_date m-2 mt-3">
            <b>
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
                  <img src="system_panel/data_informations/books_images/<?php echo $book_data['book_image']; ?>" alt="">
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
    <?php
      }
    }
    ?>
    <div class="viewmore_head mt-4 text-md-right ml-1">
      <a href="categories.php" target="_blank">View More...</a>
    </div>
  </div>
</section>

<!-- book catagory section -->



<!-- client section -->

<section class="client_section layout_padding">
  <div class="container ">
    <div class="heading_container heading_center">
      <h2>
        What Says Customers
      </h2>
      <hr>
    </div>
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="client_container ">
          <div class="detail-box">
            <p>
              I found everything I needed for my coursework here. The wide range of textbooks and materials made it a breeze to get prepared for the semester. Plus, their prices are much more affordable compared to other stores!
            </p>
            <span>
              <i class="fa fa-quote-left" aria-hidden="true"></i>
            </span>
          </div>
          <div class="client_id">
            <div class="img-box">
              <img src="images/c1.jpg" alt="">
            </div>
            <div class="client_name">
              <h5>
                Jone Mark
              </h5>
              <h6>
                Student
              </h6>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 mx-auto">
        <div class="client_container ">
          <div class="detail-box">
            <p>
              The store is a lifesaver! I was able to download digital versions of my textbooks instantly. The website is easy to navigate, and their customer support is top-notch!
            </p>
            <span>
              <i class="fa fa-quote-left" aria-hidden="true"></i>
            </span>
          </div>
          <div class="client_id">
            <div class="img-box">
              <img src="images/c2.jpg" alt="">
            </div>
            <div class="client_name">
              <h5>
                Anna Crowe
              </h5>
              <h6>
                Student
              </h6>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mx-auto">
        <div class="client_container ">
          <div class="detail-box">
            <p>
              This is my go-to place for academic resources. I particularly appreciate the used book section, which has helped me save a lot. The delivery is quick and the condition of the books is always excellent.
            </p>
            <span>
              <i class="fa fa-quote-left" aria-hidden="true"></i>
            </span>
          </div>
          <div class="client_id">
            <div class="img-box">
              <img src="images/c3.jpg" alt="">
            </div>
            <div class="client_name">
              <h5>
                Hilley James
              </h5>
              <h6>
                Student
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end client section -->

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
      $query = "SELECT * FROM tbl_blogs LIMIT 4";
      $result = $conn->query($query);
      while ($row = $result->fetch_assoc()) {
        $datas[] = $row;
      }
      foreach ($datas as $data) {
      ?>
        <div class="col-md-6">
          <div class="box">
            <div class="img-box">
              <img src="system_panel/data_informations/blog_images/<?php echo $data['blog_image']; ?>" height="400vh" alt="">
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
    <div class="viewmore_head mt-4 text-md-right ml-1">
      <a href="blogs.php" target="_blank">View More...</a>
    </div>
  </div>
</section>

<!-- end blog section -->

<!-- contact section -->

<section class="contact_section layout_padding">
  <div class="container">
    <div class="row">
      <div class="col-md-6 ">
        <div class="heading_container ">
          <h2 class="">
            Contact Us
          </h2>
        </div>
        <form action="contact_process.php" name="add" id="add" method="post">
          <input type="hidden" name="action" value="add">
          <div>
            <input type="text" placeholder="Name" name="name" />
          </div>
          <div>
            <input type="email" placeholder="Email" name="email" />
          </div>
          <div>
            <input type="text" placeholder="Phone Number" name="phone_number" />
          </div>
          <div>
            <input type="text" class="message-box" placeholder="Message" name="message_info" />
          </div>
          <div class="btn-box">
            <button onclick="Javascript: return confirm('Are you sure you want to send Contact Message?')">
              SEND
            </button>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <div class="img-box">
          <img src="images/contact-img.png" alt="">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end contact section -->


<?php
include_once('includes/footer.php');
?>