<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$egitimsor=$db->prepare("SELECT * FROM egitim where egitim_id=:id");
$egitimsor->execute(array(
  'id' => $_GET['egitim_id']
));

$egitimcek=$egitimsor->fetch(PDO::FETCH_ASSOC);

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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Okul İsmi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="okul_isim" value="<?php echo $egitimcek['okul_isim'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alan İsmi
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="alan_isim" value="<?php echo $egitimcek['alan_isim'] ?>"class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Eğitim Başlangıç Tarihi<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="egitim_baslangic" value="<?php echo $egitimcek['egitim_baslangic'] ?>" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Eğitim Bitiş Tarihi<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="egitim_bitis" value="<?php echo $egitimcek['egitim_bitis'] ?>" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

       <input type="hidden" name="egitim_id" value="<?php echo $egitimcek['egitim_id'] ?>"> 
       <div class="ln_solid"></div>
       <div class="form-group">
        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" name="egitimduzenle" class="btn btn-success">Güncelle</button>
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
