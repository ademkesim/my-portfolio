<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$yetkinliksor=$db->prepare("SELECT * FROM yetkinlik where yetkinlik_id=:id");
$yetkinliksor->execute(array(
  'id' => $_GET['yetkinlik_id']
));

$yetkinlikcek=$yetkinliksor->fetch(PDO::FETCH_ASSOC);

?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Yetkinlik Bilgisi Ayarları <small>,

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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yetkinlik İsmi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="isim" value="<?php echo $yetkinlikcek['isim'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yetkinlik Derecesi<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="derece" value="<?php echo $yetkinlikcek['derece'] ?>" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

       <input type="hidden" name="yetkinlik_id" value="<?php echo $yetkinlikcek['yetkinlik_id'] ?>"> 
       <div class="ln_solid"></div>
       <div class="form-group">
        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" name="yetkinlikduzenle" class="btn btn-success">Güncelle</button>
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
