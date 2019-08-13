<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$mesajsor=$db->prepare("SELECT * FROM mesaj order by mesaj_id DESC");
$mesajsor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Mesaj Bilgileri Listeleme </h2>

            <div class="clearfix"></div>

          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Gönderici İsim</th>
                  <th>Mesaj Başlık</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC)) { $say++?>

                  <tr>
                   <td width="20"><?php echo $say ?></td>
                   <td><?php echo $mesajcek['mesaj_ad'] ?></td>
                   <td><?php echo $mesajcek['mesaj_baslik'] ?></td>
                   
                   <td><center><a href="mesaj-detay.php?mesaj_id=<?php echo $mesajcek['mesaj_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                   <td><center><a onclick="return confirm('Bu eğitimi silmek istediğinize eminmisiniz?')" href="../netting/islem.php?mesaj_id=<?php echo $mesajcek['mesaj_id']; ?>&mesajsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
