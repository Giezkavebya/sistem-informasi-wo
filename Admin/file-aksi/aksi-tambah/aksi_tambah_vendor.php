<?php
include("../../koneksi.php");
session_start();
error_reporting(0);
$id_layanan=$_POST['id_layanan'];
$nama_vendor = $_POST['nama_vendor'];
$insta_vendor = $_POST['insta_vendor'];
$tentang_vendor =$_POST['tentang_vendor'];
$id_layanan		=$_POST['id_layanan'];
$lokasi_file = $_FILES['foto_vendor']['tmp_name'];
$nama_file = $_FILES['foto_vendor']['name']; 
$direktori1 = "../../images/vendor/$nama_file";

if(empty($lokasi_file)){
	mysql_set_charset('utf8');
	$query = "insert into vendor(nama_vendor, insta_vendor, tentang_vendor) values 
	('$nama_vendor', '$insta_vendor', '$tentang_vendor')";
} else {
	move_uploaded_file($lokasi_file,'../../images/vendor/'.$nama_file);
	$query = "insert into vendor(nama_vendor, insta_vendor, tentang_vendor, foto_vendor) values 
	('$nama_vendor', '$insta_vendor', '$tentang_vendor', '$nama_file')";
}

$hasil = mysql_query($query);

if($hasil) {
	$record_id = $data_row[0];
	$sql= "update detail_vendor set id_layanan='$id_layanan' WHERE id_layanan = '".$record_id."'";
	$hasil1 = mysql_query($sql);
	echo "<script> alert('Data Baru berhasil disimpan!');
	window.location = '../../file-kelola/kelola_vendor.php?id=$id_layanan'</script>";
} else {
	echo "<script> alert('Data gagal disimpan!');
	window.location = '../../file-kelola/kelola_vendor.php?id=$id_layanan'</script>";
}
?>