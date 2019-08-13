<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$featuresor=$db->prepare("SELECT * FROM feature where feature_id=:id");
$featuresor->execute(array(
  'id' => $_GET['feature_id']
));

$featurecek=$featuresor->fetch(PDO::FETCH_ASSOC);

?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Eğitim Bilgisi Ayarları <small>,

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
                  <input type="text" id="first-name" name="isim" value="<?php echo $featurecek['isim'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <!-- Ck Editör Başlangıç -->

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  <textarea  class="ckeditor" id="editor1" name="icerik"><?php echo $featurecek['icerik']; ?></textarea>
                </div>
              </div>

              <script type="text/javascript">

               CKEDITOR.replace( 'editor1' );

            </script>

            <!-- Ck Editör Bitiş -->

       <input type="hidden" name="feature_id" value="<?php echo $featurecek['feature_id'] ?>"> 
       <div class="ln_solid"></div>
       <div class="form-group">
        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" name="featureduzenle" class="btn btn-success">Güncelle</button>
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
