<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$tecrubesor=$db->prepare("SELECT * FROM tecrube order by tecrube_id DESC");
$tecrubesor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Tecrübe Bilgileri Listeleme <small>,

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
              <a href="tecrube-ekle.php"><button class="btn btn-success btn-xs"> Yeni Ekle</button></a>

            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Okul İsim</th>
                  <th>Okul Alan</th>
                  <th>Başlangıç T.</th>
                  <th>Bitiş T.</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($tecrubecek=$tecrubesor->fetch(PDO::FETCH_ASSOC)) { $say++?>

                  <tr>
                   <td width="20"><?php echo $say ?></td>
                   <td><?php echo $tecrubecek['firma_isim'] ?></td>
                   <td><?php echo $tecrubecek['firma_gorev'] ?></td>
                   <td><?php echo $tecrubecek['tecrube_baslangic'] ?></td>
                   <td><?php echo $tecrubecek['tecrube_bitis'] ?></td>

                   

                   <td><center><a href="tecrube-duzenle.php?tecrube_id=<?php echo $tecrubecek['tecrube_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                   <td><center><a onclick="return confirm('Bu tecrübenizi silmek istediğinize eminmisiniz?')" href="../netting/islem.php?tecrube_id=<?php echo $tecrubecek['tecrube_id']; ?>&tecrubesil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
