<?php include 'header.php';
$blogsor=$db->prepare("SELECT * FROM blog where blog_id=:blog_id");
$blogsor->execute(array(
  'blog_id' => $_GET['blog_id']
));
$blogcek=$blogsor->fetch(PDO::FETCH_ASSOC);

$sonrakiblogsor=$db->prepare("SELECT * FROM blog where blog_id=:blog_id");
$sonrakiblogsor->execute(array(
   'blog_id' => $_GET['blog_id']+1
));
$sonrakiblogcek=$sonrakiblogsor->fetch(PDO::FETCH_ASSOC);

$oncekiblogsor=$db->prepare("SELECT * FROM blog where blog_id=:blog_id");
$oncekiblogsor->execute(array(
  'blog_id' => $_GET['blog_id']-1
));
$oncekiblogcek=$oncekiblogsor->fetch(PDO::FETCH_ASSOC);

?>
<!--================Home Banner Area =================-->
<section class="home_banner_area blog_banner">
    <div class="banner_inner d-flex align-items-center">
     <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
     <div class="container">
         <div class="blog_b_text text-center">
          <h2>Dude You’re Getting <br /> a Telescope</h2>
          <p>There is a moment in the life of any aspiring astronomer that it is time to buy that first</p>
      </div>
  </div>
</div>
</section>
<!--================End Home Banner Area =================-->

<!--================Blog Area =================-->
<section class="blog_area single-post-area p_120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <img class="img-fluid" src="img/blog/feature-img1.jpg" alt="">
                        </div>									
                    </div>
                    <div class="col-lg-12  col-md-12">
                        <div class="blog_info text-right">
                            <ul class="blog_meta list">
                                <br>
                                <li><a><?php echo date("d-m-Y",strtotime($blogcek['tarih'])); ?><i class="lnr lnr-calendar-full"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 blog_details">
                        <h2><?php echo $blogcek['baslik'] ?></h2>
                        <p class="excert">
                            <?php echo $blogcek['icerik'] ?>
                        </p>
                    </div>
                </div>
                <?php 
                $sorguIlk = $db->query("select blog_id from blog order by blog_id asc limit 1");
                $sonucIlk = $sorguIlk->fetch(PDO::FETCH_ASSOC);
                $ilkId = $sonucIlk["blog_id"];
                $sorguSon = $db->query("select blog_id from blog order by blog_id desc limit 1");
                $sonucSon = $sorguSon->fetch(PDO::FETCH_ASSOC);
                $sonId = $sonucSon["blog_id"];?>
                <div class="navigation-area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                            <div class="arrow">
                                <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
                            </div>
                            <div class="detials">
                                <?php if ($ilkId==$blogcek['blog_id']){
                                    echo "";}
                                    else {?>
                                        <p>Geri</p>
                                        <a href="single-blog.php?blog_id=<?php echo $blogcek['blog_id']-1; ?>"><h4><?php echo $oncekiblogcek['baslik'] ?></h4></a> 
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                <div class="detials">  
                                    <?php if ($sonId==$blogcek['blog_id']){
                                        echo "";}
                                        else {?>
                                            <p>İleri</p>
                                            <a href="single-blog.php?blog_id=<?php echo $blogcek['blog_id']+1; ?>"><h4><?php echo $sonrakiblogcek['baslik'] ?></h4></a> 
                                        <?php }?>                            
                                    </div>
                                    <div class="arrow">
                                        <a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
                                    </div>									
                                </div>									
                            </div>
                        </div>
                         <!-- YORUM ALANI
                        <div class="comments-area">
                            <h4>Comments</h4>
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="desc">
                                            <h5><a href="#">Emilly Blunt</a></h5>
                                            <p class="date">December 4, 2017 at 3:12 pm </p>
                                            <p class="comment">
                                                Never say goodbye till the end comes!
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>	
                            <hr>                                       				
                        </div>
                        <div class="comment-form">
                            <h4>Leave a Reply</h4>
                            <form>
                                <div class="form-group form-inline">
                                  <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="text" class="form-control" blog_id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="email" class="form-control" blog_id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                                </div>										
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" blog_id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                            </div>
                            <a href="#" class="primary-btn submit_btn">Post Comment</a>	
                        </form>
                    </div>
                -->
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Posts">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                </span>
                            </div><!-- /input-group -->
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Popular Posts</h3>
                            <?php 

                            $say=0;

                            while($blogoncek=$blogonsor->fetch(PDO::FETCH_ASSOC)) { $say++?>
                                <div class="media post_item">
                                    <img src="img/blog/popular-post/post1.jpg" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html"><h3><?php echo $blogoncek['baslik'] ?></h3></a>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="br"></div>
                        </aside>
                        <!-- REKLAM ALANI
                        <aside class="single_sidebar_widget ads_widget">
                            <a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
                            <div class="br"></div>
                        </aside>-->
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Categories</h4>
                            <ul class="list cat-list">
                                <?php 

                                $say=0;

                                while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { $say++?>
                                    <li>
                                        <a href="kategori.php?kategori_id=<?php echo $kategoricek['kategori_id']?>" class="d-flex justify-content-between">
                                            <p><?php echo $kategoricek['kategori_ad'] ?></p>
                                        </a>
                                    </li>   
                                <?php } ?>
                            </ul>
                            <div class="br"></div>
                        </aside>
                        <form action="nedmin/netting/islem-veri.php" method="POST">
                            <aside class="single-sidebar-widget newsletter_widget" >
                                <h4 class="widget_title">Newsletter</h4>
                                <p>
                                    Don't you want to be the first to be informed about current blogs?
                                </p>
                                <div class="form-group d-flex flex-row">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                        </div>
                                        <input type="text" class="form-control" blog_id="inlineFormInputGroup" name="mail_mail" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                                    </div>
                                    <button class="bbtns" type="submit" name="mailekle">Subcribe</button>
                                </div>  
                                <p class="text-bottom">You can unsubscribe at any time</p>  
                                <div class="br"></div>                          
                            </aside>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
    <?php include 'footer.php'; ?>