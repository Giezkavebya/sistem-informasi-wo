<?php
session_start();
require_once("../../koneksi.php");

$id_gedung = $_GET['id'];
$nama_gedung= $_POST['nama_gedung'];
$harga_gedung= $_POST['harga_tambahgedung'];
$harga_tambahgedung= $_POST['harga_gedung'];


$update="update gedung set nama_gedung='$nama_gedung', harga_gedung='$harga_gedung', harga_tambahgedung='$harga_tambahgedung' where id_gedung='$id_gedung'";

$cek = mysql_query($update);

if($cek) {
	echo "<script> alert ('Perubahan berhasil disimpan!');
	window.location= 'kelola_paket.php'</script>";
} else {
	echo "<script> alert ('Perubahan gagal disimpan!');
	window.location = 'kelola_paket.php'</script>";
}
?>