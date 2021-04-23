<?php
session_start();
require_once("../../koneksi.php");

$id_review= $_POST['id_review'];
$publikasi= $_POST['publikasi'];

$update="UPDATE review set publikasi='$publikasi' WHERE id_review='$id_review' ";

$cek = mysql_query($update);

if($cek) {
	echo "<script> alert ('Publikasi Berhasil!');
	window.location= '../../file-edit/detail_review.php?id=$id_review'</script>";
} else {
	echo "<script> alert ('Publikasi Gagal!');
	window.location = '../../file-edit/detail_review.php?id=$id_review'</script>";
}
?>