<?php
session_start();
require_once("../../koneksi.php");

$id_detlayananpaket = $_GET['id'];
$id_layanan= $_POST['id_layanan'];
$id_paket= $_POST['id_paket'];
$isi_detlayanan=$_POST['isi_detlayanan'];


$update="update detail_layananpaket set id_layanan='$id_layanan', isi_detlayanan='$isi_detlayanan' where id_detlayananpaket='$id_detlayananpaket'";

$cek = mysql_query($update);

if($cek) {
	echo "<script> alert ('Perubahan berhasil disimpan!');
	window.location= '../../file-kelola/kelola_layanan_paket.php?id=$id_paket'</script>";
} else {
	echo "<script> alert ('Perubahan gagal disimpan!');
	window.location = '../../file-kelola/kelola_layanan_paket.php?id=$id_paket'</script>";
}
?>