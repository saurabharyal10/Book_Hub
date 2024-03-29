<?php
include_once('includes/header.php');
?>

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