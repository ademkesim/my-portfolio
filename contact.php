<?php include 'header.php'; ?>
<!--================Header Menu Area =================-->

<!--================Home Banner Area =================-->
<section class="home_banner_area contact_banner">
    <div class="banner_inner d-flex align-items-center">
       <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
       <div class="container">
           <div class="blog_b_text text-center">
              <h2>Contact Me</h2>
          </div>
      </div>
  </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Contact Area =================-->
<section class="contact_area p_120">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="contact_info">
                    <br><br><br>
                    <div class="info_item">
                        <i class="lnr lnr-home"></i>
                        <h6>Çekmeköy, İstanbul</h6>
                        <br>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-envelope"></i>
                        <h6><a href="#">info@ademkesim.dev</a></h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                
                <h2 class="text-center">REACH ME</h2><br>
                <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================Contact Area =================-->
<?php include 'footer.php'; ?>