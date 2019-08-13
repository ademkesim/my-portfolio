<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$mesajsor=$db->prepare("SELECT * FROM mesaj where mesaj_id=:id");
$mesajsor->execute(array(
  'id' => $_GET['mesaj_id']
));

$mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC);

?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Mesaj Detayları </h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gönderici İsmi =
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p ><?php echo $mesajcek['mesaj_ad'] ?></p>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gönderici Mail =
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p ><?php echo $mesajcek['mesaj_mail'] ?></p>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mesaj Başlık =
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p ><?php echo $mesajcek['mesaj_baslik'] ?></p>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mesaj İçerik =
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p ><?php echo $mesajcek['mesaj_icerik'] ?></p>
                </div>
              </div>

              <input type="hidden" name="mesaj_id" value="<?php echo $mesajcek['mesaj_id'] ?>"> 
              <div class="ln_solid"></div>


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
