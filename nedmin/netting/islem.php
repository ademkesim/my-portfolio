
<?php
ob_start();
session_start();

include 'baglan.php';
include '../production/fonksiyon.php';


if (isset($_POST['admingiris'])) {

	$admin_mail=$_POST['admin_mail'];
	$admin_password=$_POST['admin_password'];

	$adminsor=$db->prepare("SELECT * FROM admin where admin_mail=:mail and admin_password=:password and admin_durum=:durum");
	$adminsor->execute(array(
		'mail' => $admin_mail,
		'password' => $admin_password,
		'durum' => 1
	));

	echo $say=$adminsor->rowCount();

	if ($say==1) {

		$_SESSION['admin_mail']=$admin_mail;
		header("Location:../production/index.php");
		exit;



	} else {

		header("Location:../production/login.php?durum=no");
		exit;
	}
	

}

if (isset($_POST['genelayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_title' => $_POST['ayar_title'],
		'ayar_description' => $_POST['ayar_description'],
		'ayar_keywords' => $_POST['ayar_keywords'],
		'ayar_author' => $_POST['ayar_author']
	));


	if ($update) {

		header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		header("Location:../production/genel-ayar.php?durum=no");
	}
	
}



if (isset($_POST['iletisimayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_mail=:ayar_mail,
		ayar_ilce=:ayar_ilce,
		ayar_il=:ayar_il,
		ayar_dogum=:ayar_dogum
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_mail' => $_POST['ayar_mail'],
		'ayar_ilce' => $_POST['ayar_ilce'],
		'ayar_il' => $_POST['ayar_il'],
		'ayar_dogum' => $_POST['ayar_dogum']
	));


	if ($update) {

		header("Location:../production/iletisim-ayarlar.php?durum=ok");

	} else {

		header("Location:../production/iletisim-ayarlar.php?durum=no");
	}
	
}
if (isset($_POST['sosyalayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_facebook=:ayar_facebook,
		ayar_twitter=:ayar_twitter,
		ayar_youtube=:ayar_youtube,
		ayar_instagram=:ayar_instagram,
		ayar_linkedin=:ayar_linkedin
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_facebook' => $_POST['ayar_facebook'],
		'ayar_twitter' => $_POST['ayar_twitter'],
		'ayar_youtube' => $_POST['ayar_youtube'],
		'ayar_instagram' => $_POST['ayar_instagram'],
		'ayar_linkedin' => $_POST['ayar_linkedin']
	));

	if ($update) {

		header("Location:../production/sosyal-ayar.php?durum=ok");

	} else {

		header("Location:../production/sosyal-ayar.php?durum=no");
	}
	
}


if (isset($_POST['apiayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		
		ayar_analystic=:ayar_analystic,
		ayar_maps=:ayar_maps,
		ayar_zopim=:ayar_zopim
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(

		'ayar_analystic' => $_POST['ayar_analystic'],
		'ayar_maps' => $_POST['ayar_maps'],
		'ayar_zopim' => $_POST['ayar_zopim']
	));


	if ($update) {

		header("Location:../production/api-ayarlar.php?durum=ok");

	} else {

		header("Location:../production/api-ayarlar.php?durum=no");
	}
	
}

if (isset($_POST['mailayarkaydet'])) {
	
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_smtphost=:smtphost,
		ayar_smtpuser=:smtpuser,
		ayar_smtppassword=:smtppassword,
		ayar_smtpport=:smtpport
		WHERE ayar_id=0");
	$update=$ayarkaydet->execute(array(
		'smtphost' => $_POST['ayar_smtphost'],
		'smtpuser' => $_POST['ayar_smtpuser'],
		'smtppassword' => $_POST['ayar_smtppassword'],
		'smtpport' => $_POST['ayar_smtpport']
	));

	if ($update) {

		Header("Location:../production/mail-ayar.php?durum=ok");

	} else {

		Header("Location:../production/mail-ayar.php?durum=no");
	}

}



if (isset($_POST['kategoriekle'])) {

	$kategori_seourl=seo($_POST['kategori_ad']);

	$kaydet=$db->prepare("INSERT INTO kategori SET
		kategori_ad=:ad,
		kategori_durum=:kategori_durum,	
		kategori_seourl=:seourl,
		kategori_sira=:sira
		");
	$insert=$kaydet->execute(array(
		'ad' => $_POST['kategori_ad'],
		'kategori_durum' => $_POST['kategori_durum'],
		'seourl' => $kategori_seourl,
		'sira' => $_POST['kategori_sira']		
	));

	if ($insert) {

		Header("Location:../production/kategori.php?durum=ok");

	} else {

		Header("Location:../production/kategori.php?durum=no");
	}

}



if ($_GET['kategorisil']=="ok") {
	
	$sil=$db->prepare("DELETE from kategori where kategori_id=:kategori_id");
	$kontrol=$sil->execute(array(
		'kategori_id' => $_GET['kategori_id']
	));

	if ($kontrol) {

		Header("Location:../production/kategori.php?durum=ok");

	} else {

		Header("Location:../production/kategori.php?durum=no");
	}

}

if ($_GET['blogsil']=="ok") {
	
	$sil=$db->prepare("DELETE from blog where blog_id=:blog_id");
	$kontrol=$sil->execute(array(
		'blog_id' => $_GET['blog_id']
	));

	if ($kontrol) {

		Header("Location:../production/blog.php?durum=ok");

	} else {

		Header("Location:../production/blog.php?durum=no");
	}

}



if (isset($_POST['blogekle'])) {

	$blog_seourl=seo($_POST['baslik']);

	$kaydet=$db->prepare("INSERT INTO blog SET
		kategori_id=:kategori_id,
		baslik=:baslik,
		icerik=:icerik,
		dil=:dil,
		blog_onecikar=:blog_onecikar,
		blog_durum=:blog_durum,
		blog_seourl=:seourl		
		");
	$insert=$kaydet->execute(array(
		'kategori_id' => $_POST['kategori_id'],
		'baslik' => $_POST['baslik'],
		'icerik' => $_POST['icerik'],
		'dil' => $_POST['dil'],
		'blog_onecikar' => $_POST['blog_onecikar'],
		'blog_durum' => $_POST['blog_durum'],
		'seourl' => $blog_seourl

	));

	if ($insert) {

		Header("Location:../production/blog.php?durum=ok");

	} else {

		Header("Location:../production/blog.php?durum=no");
	}

}

if (isset($_POST['blogduzenle'])) {

	$blog_id=$_POST['blog_id'];
	$blog_seourl=seo($_POST['baslik']);

	$kaydet=$db->prepare("UPDATE blog SET
		kategori_id=:kategori_id,
		baslik=:baslik,
		icerik=:icerik,
		dil=:dil,
		blog_onecikar=:blog_onecikar,
		blog_durum=:blog_durum,
		blog_seourl=:seourl		
		WHERE blog_id={$_POST['blog_id']}");
	$update=$kaydet->execute(array(
		'kategori_id' => $_POST['kategori_id'],
		'baslik' => $_POST['baslik'],
		'icerik' => $_POST['icerik'],
		'dil' => $_POST['dil'],
		'blog_onecikar' => $_POST['blog_onecikar'],
		'blog_durum' => $_POST['blog_durum'],
		'seourl' => $blog_seourl

	));

	if ($update) {

		Header("Location:../production/blog-duzenle.php?durum=ok&blog_id=$blog_id");

	} else {

		Header("Location:../production/blog-duzenle.php?durum=no&blog_id=$blog_id");
	}

}


if ($_GET['blog_onecikar']=="ok") {

	

	
	$duzenle=$db->prepare("UPDATE blog SET
		
		blog_onecikar=:blog_onecikar
		
		WHERE blog_id={$_GET['blog_id']}");
	
	$update=$duzenle->execute(array(


		'blog_onecikar' => $_GET['blog_one']
	));



	if ($update) {

		

		Header("Location:../production/blog.php?durum=ok");

	} else {

		Header("Location:../production/blog.php?durum=no");
	}

}


if ($_GET['egitimsil']=="ok") {
	
	$sil=$db->prepare("DELETE from egitim where egitim_id=:egitim_id");
	$kontrol=$sil->execute(array(
		'egitim_id' => $_GET['egitim_id']
	));

	if ($kontrol) {

		Header("Location:../production/egitim.php?durum=ok");

	} else {

		Header("Location:../production/egitim.php?durum=no");
	}

}



if (isset($_POST['egitimekle'])) {

	$egitim_seourl=seo($_POST['baslik']);

	$kaydet=$db->prepare("INSERT INTO egitim SET
		egitim_baslangic=:egitim_baslangic,
		egitim_bitis=:egitim_bitis,
		okul_isim=:okul_isim,
		alan_isim=:alan_isim			
		");
	$insert=$kaydet->execute(array(
		'egitim_baslangic' => $_POST['egitim_baslangic'],
		'egitim_bitis' => $_POST['egitim_bitis'],
		'okul_isim' => $_POST['okul_isim'],
		'alan_isim' => $_POST['alan_isim']

	));

	if ($insert) {

		Header("Location:../production/egitim.php?durum=ok");

	} else {

		Header("Location:../production/egitim.php?durum=no");
	}

}

if (isset($_POST['egitimduzenle'])) {

	$egitim_id=$_POST['egitim_id'];

	$kaydet=$db->prepare("UPDATE egitim SET
		egitim_baslangic=:egitim_baslangic,
		egitim_bitis=:egitim_bitis,
		okul_isim=:okul_isim,
		alan_isim=:alan_isim		
		WHERE egitim_id={$_POST['egitim_id']}");
	$update=$kaydet->execute(array(
		'egitim_baslangic' => $_POST['egitim_baslangic'],
		'egitim_bitis' => $_POST['egitim_bitis'],
		'okul_isim' => $_POST['okul_isim'],
		'alan_isim' => $_POST['alan_isim']

	));

	if ($update) {

		Header("Location:../production/egitim-duzenle.php?durum=ok&egitim_id=$egitim_id");

	} else {

		Header("Location:../production/egitim-duzenle.php?durum=no&egitim_id=$egitim_id");
	}
}
if ($_GET['tecrubesil']=="ok") {
	
	$sil=$db->prepare("DELETE from tecrube where tecrube_id=:tecrube_id");
	$kontrol=$sil->execute(array(
		'tecrube_id' => $_GET['tecrube_id']
	));

	if ($kontrol) {

		Header("Location:../production/tecrube.php?durum=ok");

	} else {

		Header("Location:../production/tecrube.php?durum=no");
	}

}



if (isset($_POST['tecrubeekle'])) {

	$tecrube_seourl=seo($_POST['baslik']);

	$kaydet=$db->prepare("INSERT INTO tecrube SET
		tecrube_baslangic=:tecrube_baslangic,
		tecrube_bitis=:tecrube_bitis,
		firma_isim=:firma_isim,
		firma_gorev=:firma_gorev			
		");
	$insert=$kaydet->execute(array(
		'tecrube_baslangic' => $_POST['tecrube_baslangic'],
		'tecrube_bitis' => $_POST['tecrube_bitis'],
		'firma_isim' => $_POST['firma_isim'],
		'firma_gorev' => $_POST['firma_gorev']

	));

	if ($insert) {

		Header("Location:../production/tecrube.php?durum=ok");

	} else {

		Header("Location:../production/tecrube.php?durum=no");
	}

}

if (isset($_POST['tecrubeduzenle'])) {

	$tecrube_id=$_POST['tecrube_id'];

	$kaydet=$db->prepare("UPDATE tecrube SET
		tecrube_baslangic=:tecrube_baslangic,
		tecrube_bitis=:tecrube_bitis,
		firma_isim=:firma_isim,
		firma_gorev=:firma_gorev		
		WHERE tecrube_id={$_POST['tecrube_id']}");
	$update=$kaydet->execute(array(
		'tecrube_baslangic' => $_POST['tecrube_baslangic'],
		'tecrube_bitis' => $_POST['tecrube_bitis'],
		'firma_isim' => $_POST['firma_isim'],
		'firma_gorev' => $_POST['firma_gorev']

	));

	if ($update) {

		Header("Location:../production/tecrube-duzenle.php?durum=ok&tecrube_id=$tecrube_id");

	} else {

		Header("Location:../production/tecrube-duzenle.php?durum=no&tecrube_id=$tecrube_id");
	}
}
if ($_GET['yetkinliksil']=="ok") {
	
	$sil=$db->prepare("DELETE from yetkinlik where yetkinlik_id=:yetkinlik_id");
	$kontrol=$sil->execute(array(
		'yetkinlik_id' => $_GET['yetkinlik_id']
	));

	if ($kontrol) {

		Header("Location:../production/yetkinlik.php?durum=ok");

	} else {

		Header("Location:../production/yetkinlik.php?durum=no");
	}

}



if (isset($_POST['yetkinlikekle'])) {

	$kaydet=$db->prepare("INSERT INTO yetkinlik SET
		isim=:isim,
		derece=:derece			
		");
	$insert=$kaydet->execute(array(
		'isim' => $_POST['isim'],
		'derece' => $_POST['derece']

	));

	if ($insert) {

		Header("Location:../production/yetkinlik.php?durum=ok");

	} else {

		Header("Location:../production/yetkinlik.php?durum=no");
	}

}

if (isset($_POST['yetkinlikduzenle'])) {

	$yetkinlik_id=$_POST['yetkinlik_id'];

	$kaydet=$db->prepare("UPDATE yetkinlik SET
		isim=:isim,
		derece=:derece		
		WHERE yetkinlik_id={$_POST['yetkinlik_id']}");
	$update=$kaydet->execute(array(
		'isim' => $_POST['isim'],
		'derece' => $_POST['derece']

	));

	if ($update) {

		Header("Location:../production/yetkinlik-duzenle.php?durum=ok&yetkinlik_id=$yetkinlik_id");

	} else {

		Header("Location:../production/yetkinlik-duzenle.php?durum=no&yetkinlik_id=$yetkinlik_id");
	}
}


if (isset($_POST['featureduzenle'])) {

	$feature_id=$_POST['feature_id'];

	$kaydet=$db->prepare("UPDATE feature SET
		isim=:isim,
		icerik=:icerik		
		WHERE feature_id={$_POST['feature_id']}");
	$update=$kaydet->execute(array(
		'isim' => $_POST['isim'],
		'icerik' => $_POST['icerik']

	));

	if ($update) {

		Header("Location:../production/feature-duzenle.php?durum=ok&feature_id=$feature_id");

	} else {

		Header("Location:../production/feature-duzenle.php?durum=no&feature_id=$feature_id");
	}
}

if (isset($_POST['kartduzenle'])) {

	$kaydet=$db->prepare("UPDATE kart SET
		isim=:isim,
		meslek=:meslek,
		tanitim=:tanitim		
		WHERE kart_id=0");
	$update=$kaydet->execute(array(
		'isim' => $_POST['isim'],
		'meslek' => $_POST['meslek'],
		'tanitim' => $_POST['tanitim']

	));

	if ($update) {

		Header("Location:../production/kart.php?durum=ok");

	} else {

		Header("Location:../production/kart.php?durum=no");
	}
}

if (isset($_POST['tanitimduzenle'])) {

	$kaydet=$db->prepare("UPDATE tanitim SET
		yazi=:yazi,
		proje=:proje		
		WHERE tanitim_id=1");
	$update=$kaydet->execute(array(
		'yazi' => $_POST['yazi'],
		'proje' => $_POST['proje']

	));

	if ($update) {

		Header("Location:../production/tanitim.php?durum=ok");

	} else {

		Header("Location:../production/tanitim.php?durum=no");
	}
}

if ($_GET['mailsil']=="ok") {
	
	$sil=$db->prepare("DELETE from mail where mail_id=:mail_id");
	$kontrol=$sil->execute(array(
		'mail_id' => $_GET['mail_id']
	));

	if ($kontrol) {

		Header("Location:../production/mail.php?durum=ok");

	} else {

		Header("Location:../production/mail.php?durum=no");
	}

}

if ($_GET['mesajsil']=="ok") {
	
	$sil=$db->prepare("DELETE from mesaj where mesaj_id=:mesaj_id");
	$kontrol=$sil->execute(array(
		'mesaj_id' => $_GET['mesaj_id']
	));

	if ($kontrol) {

		Header("Location:../production/mesaj.php?durum=ok");

	} else {

		Header("Location:../production/mesaj.php?durum=no");
	}

}

?>