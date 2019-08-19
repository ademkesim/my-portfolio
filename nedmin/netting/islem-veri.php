<?php 
include 'baglan.php';

$tanitimsor=$db->prepare("SELECT * FROM tanitim where tanitim_id=:id");
$tanitimsor->execute(array(
	'id' => 1
));
$tanitimcek=$tanitimsor->fetch(PDO::FETCH_ASSOC);

$kartsor=$db->prepare("SELECT * FROM kart where kart_id=:id");
$kartsor->execute(array(
	'id' => 1
));
$kartcek=$kartsor->fetch(PDO::FETCH_ASSOC);

$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
	'id' => 0
));

$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

$yetkinliksor=$db->prepare("SELECT * FROM yetkinlik order by yetkinlik_id DESC");
$yetkinliksor->execute();

$egitimsor=$db->prepare("SELECT * FROM egitim order by egitim_id DESC");
$egitimsor->execute();

$tecrubesor=$db->prepare("SELECT * FROM tecrube order by tecrube_id DESC");
$tecrubesor->execute();

$featuresor=$db->prepare("SELECT * FROM feature order by feature_id DESC");
$featuresor->execute();


$kategorisor=$db->prepare("SELECT * FROM kategori order by kategori_id DESC");
$kategorisor->execute();

$blogonsor=$db->prepare("SELECT * FROM blog where blog_onecikar=:onecikar");
$blogonsor->execute(array(
	'onecikar' => 1
));

$blogoncek=$blogonsor->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['mesajekle'])) {

	$kaydet=$db->prepare("INSERT INTO mesaj SET
		mesaj_ad=:mesaj_ad,
		mesaj_mail=:mesaj_mail,
		mesaj_baslik=:mesaj_baslik,	
		mesaj_icerik=:mesaj_icerik			
		");
	$insert=$kaydet->execute(array(
		'mesaj_ad' => $_POST['mesaj_ad'],
		'mesaj_mail' => $_POST['mesaj_mail'],
		'mesaj_baslik' => $_POST['mesaj_baslik'],
		'mesaj_icerik' => $_POST['mesaj_icerik']

	));

	if ($insert) {

		Header("Location:../../contact.php?durum=ok");

	} else {

		Header("Location:../../contact.php?durum=no");
	}

}

if (isset($_POST['mailekle'])) {

	$kaydet=$db->prepare("INSERT INTO mail SET
		mail_mail=:mail_mail			
		");
	$insert=$kaydet->execute(array(
		'mail_mail' => $_POST['mail_mail']
	));
	if ($insert) {

		Header("Location:../../blog.php?durum=ok");

	} else {

		Header("Location:../../blog.php?durum=no");
	}

}
?>