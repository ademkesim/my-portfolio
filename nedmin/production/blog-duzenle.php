<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$blogsor=$db->prepare("SELECT * FROM blog where blog_id=:id");
$blogsor->execute(array(
  'id' => $_GET['blog_id']
));

$blogcek=$blogsor->fetch(PDO::FETCH_ASSOC);

?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Blog Ayarları <small>,

              <?php 

              if ($_GET['durum']=="ok") {?>

                <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

                <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Başlık <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="baslik" value="<?php echo $blogcek['baslik'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              


              <!-- Ck Editör Başlangıç -->

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  <textarea  class="ckeditor" id="editor1" name="icerik"><?php echo $blogcek['icerik']; ?></textarea>
                </div>
              </div>

              <script type="text/javascript">

               CKEDITOR.replace( 'editor1' );

            </script>

            <!-- Ck Editör Bitiş -->


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yazılım Dili<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="dil" value="<?php echo $blogcek['dil'] ?>" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Blog Öne Çıkar<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
               <select id="heard" class="form-control" name="blog_onecikar" required>
                <option value="1" <?php echo $blogcek['blog_onecikar'] == '1' ? 'selected=""' : ''; ?>>Evet</option>
                <option value="0" <?php if ($blogcek['blog_onecikar']==0) { echo 'selected=""'; } ?>>Hayır</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Durum<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
             <select id="heard" class="form-control" name="blog_durum" required>
              <option value="1" <?php echo $blogcek['blog_durum'] ==1 ? 'selected=""' : ''; ?>>Aktif</option>
              <option value="0" <?php if ($blogcek['blog_durum']== '0' ) { echo 'selected=""'; } ?>>Pasif</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Seç<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-6">

            <?php  

            $blog_id=$blogcek['kategori_id']; 

            $kategorisor=$db->prepare("select * from kategori where kategori_sira");
            $kategorisor->execute();

            ?>
            <select class="select2_multiple form-control" required="" name="kategori_id" >


             <?php 

             while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {

               $kategori_id=$kategoricek['kategori_id'];

               ?>

               <option <?php if ($kategori_id==$blog_id) { echo "selected='select'"; } ?> value="<?php echo $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></option>

             <?php } ?>

           </select>
         </div>
       </div>
       <input type="hidden" name="blog_id" value="<?php echo $blogcek['blog_id'] ?>"> 
       <div class="ln_solid"></div>
       <div class="form-group">
        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" name="blogduzenle" class="btn btn-success">Güncelle</button>
        </div>
      </div>

    </form>



  </div>
</div>
</div>
</div>



<hr>
<hr>
<hr>



</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
