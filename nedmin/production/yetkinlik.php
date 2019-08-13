<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$yetkinliksor=$db->prepare("SELECT * FROM yetkinlik order by yetkinlik_id DESC");
$yetkinliksor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Yetkinlik Bilgileri Listeleme <small>,

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
              <a href="yetkinlik-ekle.php"><button class="btn btn-success btn-xs"> Yeni Ekle</button></a>

            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Yetkinlik İsim</th>
                  <th>Yetkinlik Derece</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($yetkinlikcek=$yetkinliksor->fetch(PDO::FETCH_ASSOC)) { $say++?>

                  <tr>
                   <td width="20"><?php echo $say ?></td>
                   <td><?php echo $yetkinlikcek['isim'] ?></td>
                   <td><?php echo $yetkinlikcek['derece'] ?></td>
                   
                   <td><center><a href="yetkinlik-duzenle.php?yetkinlik_id=<?php echo $yetkinlikcek['yetkinlik_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                   <td><center><a onclick="return confirm('Bu yetkinliğinizi silmek istediğinize eminmisiniz?')" href="../netting/islem.php?yetkinlik_id=<?php echo $yetkinlikcek['yetkinlik_id']; ?>&yetkinliksil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
