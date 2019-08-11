<?php include 'header.php'; ?>
<!--================Header Menu Area =================-->

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="box_1620">
        <div class="banner_inner d-flex align-items-center">
           <div class="container">
              <div class="banner_content text-center">
                 <h2>Contact Us</h2>
                 <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="contact.html">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!--================End Home Banner Area =================-->

<!--================Contact Area =================-->
<section class="contact_area p_120">
    <div class="container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3009.2102077867967!2d29.18297635116133!3d41.04253197919569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cace8766c64f77%3A0x5bc458c2609b9f76!2zTWVya2V6LCBaw7xtcmUgU2suLCAzNDc4MiDDh2VrbWVrw7Z5L8Swc3RhbmJ1bA!5e0!3m2!1str!2str!4v1565438519068!5m2!1str!2str" width="1140" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        <div class="row">
            <div class="col-lg-3">
                <div class="contact_info">
                    <br>
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
                <br>
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