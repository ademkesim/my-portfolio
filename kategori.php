<?php include 'header.php';
$blogsor=$db->prepare("SELECT * FROM blog order by blog_id DESC");
$blogsor->execute();

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

<!--================Blog Categorie Area İlerde Eklenicek =================-->
        <!--
        <section class="blog_categorie_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="img/blog/cat-post/cat-post-3.jpg" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="blog-details.html"><h5>Social Life</h5></a>
                                    <div class="border_line"></div>
                                    <p>Enjoy your social life together</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="img/blog/cat-post/cat-post-2.jpg" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="blog-details.html"><h5>Politics</h5></a>
                                    <div class="border_line"></div>
                                    <p>Be a part of politics</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="img/blog/cat-post/cat-post-1.jpg" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="blog-details.html"><h5>Food</h5></a>
                                    <div class="border_line"></div>
                                    <p>Let the food be finished</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </section>-->
          <!--================Blog Categorie Area =================-->

          <!--================Blog Area =================-->
          <br><br>
          <section class="blog_area">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="blog_left_sidebar">
                    <?php 

                    if (isset($_GET['kategori_id'])) {

                                        $sayfada = 5; // sayfada gösterilecek içerik miktarını belirtiyoruz.

                                        $sorgu=$db->prepare("select * from blog where kategori_id=:kategori_id");
                                        $sorgu->execute(array(
                                          'kategori_id' => $_GET['kategori_id']
                                        ));
                                        $toplam_icerik=$sorgu->rowCount();
                                        $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                                     // eğer sayfa girilmemişse 1 varsayalım.
                                        $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
                                    // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                                        if($sayfa < 1) $sayfa = 1; 
                                   // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                                        if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
                                        $limit = ($sayfa - 1) * $sayfada;

                                        //tüm tablo sütunlarının çekilmesi
                                        $blogsor=$db->prepare("SELECT blog.*,kategori.* FROM blog INNER JOIN kategori ON blog.kategori_id=kategori.kategori_id WHERE blog_durum=:blog_durum and kategori.kategori_id=:kategori_id order by tarih DESC limit $limit,$sayfada");
                                        $blogsor->execute(array(
                                          'blog_durum' => 1,
                                          'kategori_id' => $_GET['kategori_id']
                                        ));

                                        $say=$sorgu->rowCount();



                                        if ($say==0) {
                                          echo "Bu kategoride ürün Bulunamadı";
                                        }


                                      } else {

                                        $sayfada = 5; // sayfada gösterilecek içerik miktarını belirtiyoruz.
                                        $sorgu=$db->prepare("select * from blog");
                                        $sorgu->execute();
                                        $toplam_icerik=$sorgu->rowCount();
                                        $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                                     // eğer sayfa girilmemişse 1 varsayalım.
                                        $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
                                    // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                                        if($sayfa < 1) $sayfa = 1; 
                                   // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                                        if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
                                        $limit = ($sayfa - 1) * $sayfada;


                                        $blogsor=$db->prepare("SELECT blog.baslik,blog.blog_id,blog.dil,blog.icerik,blog.kategori_id,blog.blog_durum,blog.tarih,kategori.kategori_ad FROM blog INNER JOIN kategori ON blog.kategori_id=kategori.kategori_id WHERE blog_durum=:blog_durum order by tarih DESC limit $limit,$sayfada");
                                        $blogsor->execute(array(
                                          'blog_durum' => 1
                                        ));

                                        $say=$sorgu->rowCount();

                                        if ($say==0) {
                                          echo "Bu kategoride ürün Bulunamadı";
                                        }



                                      }



                                      while($blogcek=$blogsor->fetch(PDO::FETCH_ASSOC)) {                     


                                        ?>
                                        <article class="row blog_item">
                                         <div class="col-md-3">
                                           <div class="blog_info text-right">
                                            <ul class="blog_meta list">
                                              <li><a ><?php echo date("d-m-Y",strtotime($blogcek['tarih'])); ?><i class="lnr lnr-calendar-full"></i></a></li>
                                              <li><a ><?php echo $blogcek['dil'] ?><i class="lnr lnr-code"></i></a></li>
                                            </ul>
                                          </div>
                                        </div>

                                        <div class="col-md-9">
                                          <div class="blog_post">
                                            <a href="single-blog.php?blog_id=<? echo $blogcek['blog_id'] ?>">
                                              <img  src="img/blog/main-blog/m-blog-1.jpg" alt="<?php echo $blogcek['blog_seourl'] ?>"></a>
                                              <div class="blog_details">
                                                <a href="single-blog.php?blog_id=<? echo $blogcek['blog_id'] ?>"><h2><?php echo $blogcek['baslik'] ?></h2></a>
                                                <p>                              
                                                  <?php 
                                                  $yazi = $blogcek['icerik'];
                                                  $kelime = explode(" ",$yazi);
                                                  $say = count($kelime);
                                                  $sinir = 40;
                                                  if($say <= $sinir) { $kes = $say*50/100; }
                                                  else { $kes = $sinir; }
                                                  for($i = 0; $i <= $kes; $i++)
                                                    { echo $kelime[$i].' ' ; } ?>...</p>
                                                  <a href="single-blog.php?blog_id=<? echo $blogcek['blog_id'] ?>" class="white_bg_btn">View More</a>
                                                </div>
                                              </div>
                                            </article>
                                          <?php  } ?>

                                          <nav class="blog-pagination justify-content-center d-flex">
                                            <ul class="pagination">
                                              <li class="page-item">
                                                <a href="#" class="page-link" aria-label="Previous">
                                                  <span aria-hidden="true">
                                                    <span class="lnr lnr-chevron-left"></span>
                                                  </span>
                                                </a>
                                                <?php

                                                $s=0;

                                                while ($s < $toplam_sayfa) {

                                                  $s++; ?>

                                                  <?php

                                                  if (!empty($_GET['kategori_id'])) { 

                                                    if ($s==$sayfa) {?>


                                                      <li class="page-item active"><a href="kategori.php?kategori_id=<?php echo $_GET['kategori_id'] ?>&sayfa=<?php echo $s; ?>" class="page-link"><?php echo $s; ?></a></li>
                                                    <?php } else {?>
                                                      <li class="page-item"><a href="kategori.php?kategori_id=<?php echo $_GET['kategori_id'] ?>&sayfa=<?php echo $s; ?>" class="page-link"><?php echo $s; ?></a></li>
                                                    <?php   }

                                                  } else {


                                                    if ($s==$sayfa) {?>



                                                      <li><a style="background-color: #C84C3C; color:white;" href="kategoriler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a></li>


                                                    <?php } else {?>

                                                      <li><a href="kategoriler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a></li>




                                                    <?php   }


                                                  }

                                                }

                                                ?>
                                                <li class="page-item">
                                                  <a href="#" class="page-link" aria-label="Next">
                                                    <span aria-hidden="true">
                                                      <span class="lnr lnr-chevron-right"></span>
                                                    </span>
                                                  </a>
                                                </li>
                                              </ul>
                                            </nav>
                                          </div>
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
                            <h4 class="widget_title">Post Catgories</h4>
                            <ul class="list cat-list">
                              <?php 

                              $say=0;

                              while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { $say++?>
                                <li>
                                  <a href="#" class="d-flex justify-content-between">
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
                                  <input type="text" class="form-control" id="inlineFormInputGroup" name="mail_mail" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
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