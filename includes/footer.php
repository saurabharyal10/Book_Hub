  <!-- info section -->

  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">

        <div class="col-md-4 info-col">
          <div class="info_detail">
            <h4>
              About Us
            </h4>
            <p style="text-align: justify;">
              At Book Hub, we provide a wide range of textbooks, study materials, and digital resources at affordable prices. Our mission is to support students and lifelong learners with easy access to the tools they need to succeed.</p>
            <div class="info_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 info-col">
          <div class="info_contact">
            <h4>
              Address
            </h4>
            <div class="contact_link_box">
              <i class="fa fa-map-marker" aria-hidden="true">
                <span style="font-family: 'Mulish', sans-serif;">
                  &nbsp; YampaPhant-05, Bandipur, Tanahun, Nepal
                </span>
              </i><br>

              <i class="fa fa-phone" aria-hidden="true">
                <span style="font-family: 'Mulish', sans-serif;">
                  &nbsp; +977 9851124309
                </span>
              </i><br>

              <i class="fa fa-envelope" aria-hidden="true">
                <span style="font-family: 'Mulish', sans-serif;">
                  &nbsp; sasalalu@gmail.com
                </span>
              </i><br>
            </div>
          </div>
        </div>
        <div class="col-md-4 info-col">
          <div class="mapouter">
            <div class="gmap_canvas"><iframe width="310" height="210" id="gmap_canvas" src="https://maps.google.com/maps?q=27.942095785100925,%2084.45045756739727&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
              <style>
                .mapouter {
                  position: relative;
                  text-align: right;
                  height: 210px;
                  width: 310px;
                }
              </style>
              <style>
                .gmap_canvas {
                  overflow: hidden;
                  background: none !important;
                  height: 210px;
                  width: 310px;
                }
              </style>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="http://saurabh-aryal.com.np/">Saurabh Aryal</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->


  <script>
    function search() {
      var bookNameInput = document.getElementById('bookNameInput').value;
      var selectedCategories = [];
      var checkboxes = document.querySelectorAll('input[name="category"]:checked');
      checkboxes.forEach(function(checkbox) {
        selectedCategories.push(checkbox.value);
      });
      // Perform search with bookNameInput and selectedCategories
      // For now, just display the search criteria
      var searchResultsDiv = document.getElementById('searchResults');
      searchResultsDiv.innerHTML = 'Book Name: ' + bookNameInput + '<br>';
      searchResultsDiv.innerHTML += 'Selected Categories: ' + selectedCategories.join(', ');
    }
  </script>
  <!-- <script>
    function displayCurrentYear() {
      const year = new Date().getFullYear();
      document.getElementById("displayYear").textContent = year;
    }

    window.onload = displayCurrentYear;
  </script> -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.google.com/maps?q=27.942095785100925,%2084.45045756739727&t=&z=15&ie=UTF8&iwloc=&output=embed">
  </script>
  <!-- End Google Map -->

  </body>

  </html>