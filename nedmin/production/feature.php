<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$featuresor=$db->prepare("SELECT * FROM feature order by feature_id DESC");
$featuresor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Feature Bilgileri Düzenle <small>,

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


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Başlık</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($featurecek=$featuresor->fetch(PDO::FETCH_ASSOC)) { $say++?>

                  <tr>
                   <td width="20"><?php echo $say ?></td>
                   <td><?php echo $featurecek['isim'] ?></td>
                   
                   <td><center><a href="feature-duzenle.php?feature_id=<?php echo $featurecek['feature_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
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
