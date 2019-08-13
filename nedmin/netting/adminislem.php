<?php 
ob_start();
session_start();

include 'baglan.php';
include '../production/fonksiyon.php';


if (isset($_POST['adminduzenle'])) {

	$admin_id=$_POST['admin_id'];

	$adminguncelle=$db->prepare("UPDATE admin SET

		admin_ad=:admin_ad,
		admin_soyad=:admin_soyad,
		admin_durum=:admin_durum
		
		WHERE admin_id={$_POST['admin_id']}");

	$update=$adminguncelle->execute(array(

		'admin_ad' => htmlspecialchars($_POST['admin_ad']),
		'admin_soyad' => htmlspecialchars($_POST['admin_soyad']),
		'admin_durum' => htmlspecialchars($_POST['admin_durum'])
		
	));

	if ($update) {
		
		Header("Location:../production/admin-duzenle.php?durum=ok&admin_id=$admin_id");


	} else {

		Header("Location:../production/admin-duzenle.php?durum=no&admin_id=$admin_id");
	}
}

if (isset($_POST['kategoriduzenle'])) {

	$kategori_id=$_POST['kategori_id'];
	$kategori_seourl=seo($_POST['kategori_ad']);

	
	$kaydet=$db->prepare("UPDATE kategori SET
		kategori_ad=:ad,
		kategori_durum=:kategori_durum,	
		kategori_seourl=:seourl,
		kategori_sira=:sira
		WHERE kategori_id={$_POST['kategori_id']}");
	$update=$kaydet->execute(array(
		'ad' => htmlspecialchars($_POST['kategori_ad']),
		'kategori_durum' => htmlspecialchars($_POST['kategori_durum']),
		'seourl' => $kategori_seourl,
		'sira' => $_POST['kategori_sira']		
	));

	if ($update) {

		Header("Location:../production/kategori-duzenle.php?durum=ok&kategori_id=$kategori_id");

	} else {

		Header("Location:../production/kategori-duzenle.php?durum=no&kategori_id=$kategori_id");
	}

}

?>