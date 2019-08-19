<?php
ob_start();
session_start();
date_default_timezone_set('Turkey');
include '../netting/baglan.php';
include 'fonksiyon.php';

//Belirli veriyi seçme işlemi
$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
  'id' => 0
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);


$adminsor=$db->prepare("SELECT * FROM admin where admin_mail=:mail");
$adminsor->execute(array(
  'mail' => $_SESSION['admin_mail']
));
$say=$adminsor->rowCount();
$admincek=$adminsor->fetch(PDO::FETCH_ASSOC);

if ($say==0) {

  Header("Location:login.php?durum=izinsiz");
  exit;

}



//1.Yöntem
/*
if (!isset($_SESSION['kullanici_mail'])) {


}
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Adem Kesim Yönetim Paneli</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../vendors/font/css/all.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


  <!-- Dropzone.js -->

  <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">



  <!-- Dropzone.js -->

  <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>
  <!-- Ck Editör -->
  <!--<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>-->
  <script src="ckeditor/ckeditor.js"></script>


  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><i class="fa fa-umbrella"></i> <span>AdemKesim</span></a>
          </div>

          <div class="clearfix"></div>


          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Seçenekler</h3>
              <ul class="nav side-menu">

                <li><a href="index.php"><i class="fas fa-home fa-2x"></i> Anasayfa </a></li>

                <li><a><i class="fas fa-tools fa-2x"></i> Site Ayarları</a>
                  <ul class="nav child_menu">
                    <li><a href="genel-ayar.php">Genel Ayarlar</a></li>
                    <li><a href="iletisim-ayarlar.php">İletişim Ayarlar</a></li>
                    <li><a href="api-ayarlar.php">Api Ayarlar</a></li>
                    <li><a href="sosyal-ayar.php">Sosyal Ayarlar</a></li>
                    <li><a href="mail-ayar.php">Mail Ayarlar</a></li>

               </ul>

             </li>

             <li><a href="kategori.php"><i class="fas fa-list-alt fa-2x"></i> Kategoriler </a></li>

             <li><a href="blog.php"><i class="fab fa-blogger-b fa-2x"></i>  Bloglar </a></li>

             <li><a href="egitim.php"><i class="fas fa-graduation-cap fa-2x"></i> Eğitim Bilgileri</a></li>

             <li><a href="tecrube.php"><i class="fas fa-code-branch fa-2x"></i> Tecrübe Bilgileri </a></li>

             <li><a href="yetkinlik.php"><i class="fas fa-code fa-2x"></i> Yetkinlikler </a></li>

             <li><a href="feature.php"><i class="fas fa-user fa-2x"></i> Feature </a></li>

             <li><a href="kart.php"><i class="fas fa-address-card fa-2x"></i> Kart Ayarları </a></li>

             <li><a href="tanitim.php"><i class="far fa-id-card fa-2x"></i> Tanıtım Ayarları </a></li>

             <li><a href="mail.php"><i class="fas fa-at fa-2x"></i> Mail Listesi </a></li>

             <li><a href="mesaj.php"><i class="fas fa-envelope-square fa-2x"></i> Mesajlarım </a></li>
             
             
             
           </ul>
         </div>



       </div>
       <!-- /sidebar menu -->

       <!-- /menu footer buttons -->
       <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
      </div>
      <!-- /menu footer buttons -->
    </div>
  </div>

  <!-- top navigation -->
  <div class="top_nav">
    <div class="nav_menu">
      <nav>
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
          <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="images/img.jpg" alt=""><?php echo $kullanicicek['kullanici_adsoyad'] ?>
              <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-right">
              <li><a href="javascript:;"> Profil Bilgilerim</a></li>

              
              <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Güvenli Çıkış</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>
        <!-- /top navigation -->