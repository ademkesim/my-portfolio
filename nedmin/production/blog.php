<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$blogsor=$db->prepare("SELECT * FROM blog order by blog_id DESC");
$blogsor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Blog Listeleme <small>,

              <?php 

              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>

            <div class="clearfix"></div>

            <div align="right">
              <a href="blog-ekle.php"><button class="btn btn-success btn-xs"> Yeni Ekle</button></a>

            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Blog Başlık</th>
                  <th>Blog Dil</th>
                  <th>Öne Çıkar</th>
                  <th>Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($blogcek=$blogsor->fetch(PDO::FETCH_ASSOC)) { $say++?>

                  <tr>
                   <td width="20"><?php echo $say ?></td>
                   <td><?php echo $blogcek['baslik'] ?></td>
                   <td><?php echo $blogcek['dil'] ?></td>
                   
                   <td><center><?php 

                   if ($blogcek['blog_onecikar']==0) {?>

                   <a href="../netting/islem.php?blog_id=<?php echo $blogcek['blog_id'] ?>&blog_one=1&blog_onecikar=ok"><button class="btn btn-success btn-xs">Ön Çıkar</button></a>
                     

                   <?php } elseif ($blogcek['blog_onecikar']==1) {?>


                   <a href="../netting/islem.php?blog_id=<?php echo $blogcek['blog_id'] ?>&blog_one=0&blog_onecikar=ok"><button class="btn btn-warning btn-xs">Kaldır</button></a>

                     <?php } ?>
                       
                     </center></td>
                 
                   <td><center><?php 

                    if ($blogcek['blog_durum']==1) {?>

                    <button class="btn btn-success btn-xs">Aktif</button>

                  <?php } else {?>

                  <button class="btn btn-danger btn-xs">Pasif</button>

                  <?php } ?>
                </center>

              </td>

              <td><center><a href="blog-duzenle.php?blog_id=<?php echo $blogcek['blog_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
              <td><center><a onclick="return confirm('Bu bloğu silmek istediğinize eminmisiniz?')" href="../netting/islem.php?blog_id=<?php echo $blogcek['blog_id']; ?>&blogsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
            </tr>



          <?php  }

          ?>


        </tbody>
      </table>

      <!-- Div İçerik Bitişi -->


    </div>
  </div>
</div>
</div>




</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
