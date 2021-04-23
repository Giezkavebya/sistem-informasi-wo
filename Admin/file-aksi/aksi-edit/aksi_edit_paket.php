<?php
session_start();
ini_set('upload_max_filesize', '10M');
require_once("../../koneksi.php");

$id_paket = $_POST['id_paket'];
$nama_paket = $_POST['nama_paket'];
$harga_paket = $_POST['harga_paket'];
$jumlah_hari = $_POST['jumlah_hari'];
$jumlah_acara = $_POST['jumlah_acara'];
$jumlah_tamu = $_POST['jumlah_tamu'];
$jumlah_team= $_POST['jumlah_team'];
$catatan_tambahan=$_POST['catatan_tambahan'];
$lokasi_file	 = $_FILES['foto_paket']['tmp_name'];
$nama_file	     = $_FILES['foto_paket']['name'];

if(empty($lokasi_file)){
	$update="update paket set nama_paket='$nama_paket', harga_paket='$harga_paket', jumlah_hari='$jumlah_hari', jumlah_acara='$jumlah_acara', jumlah_tamu='$jumlah_tamu', jumlah_team='$jumlah_team',catatan_tambahan = '$catatan_tambahan' where id_paket='$id_paket'";
}else{

	move_uploaded_file($lokasi_file,'../../images/fotopaket/'.$nama_file);

	$update="update paket set foto_paket='$nama_file',nama_paket='$nama_paket', harga_paket='$harga_paket', jumlah_hari='$jumlah_hari', jumlah_acara='$jumlah_acara', jumlah_tamu='$jumlah_tamu', jumlah_team='$jumlah_team',catatan_tambahan = '$catatan_tambahan' where id_paket='$id_paket'";
}
$cek = mysql_query($update);

if($cek) {
	echo "<script> alert ('Perubahan berhasil disimpan!');
	window.location = '../../file-edit/edit_paket.php?id=$id_paket'</script>";
} else {
	echo "<script> alert ('Data gagal di edit!');
	window.location = '../../file-edit/edit_paket.php?id=$id_paket'</script>";
}
?>