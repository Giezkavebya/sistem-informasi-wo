<?php
include("../../koneksi.php");
session_start();
date_default_timezone_set("ASIA/JAKARTA");

$id_pemesanan= $_POST['id_pemesanan'];
$jumlah_pembayaran= $_POST['jumlah_pembayaran'];
$tanggal_pembayaran =  date("Y-m-d");
$lokasi_file = $_FILES['bukti_pembayaran']['tmp_name'];
$nama_file = $_FILES['bukti_pembayaran']['name'];
$direktori1 = "../../Admin/images/buktipembayaran/$nama_file";

if(empty($lokasi_file)){
	mysql_set_charset('utf8');
		$query = "insert into pembayaran(id_pemesanan, jumlah_pembayaran, tanggal_pembayaran) values 
				 ( '$id_pemesanan', '$jumlah_pembayaran', '$tanggal_pembayaran')";
	} else {
			move_uploaded_file($lokasi_file,'../../Admin/images/buktipembayaran/'.$nama_file);
			$query =  "insert into pembayaran(id_pemesanan, jumlah_pembayaran, tanggal_pembayaran, bukti_pembayaran) values 
				 ('$id_pemesanan', '$jumlah_pembayaran', '$tanggal_pembayaran', '$nama_file')";
	}
			
	$hasil = mysql_query($query);
	
if($hasil) {
	
	echo "<script> alert('Bukti pembayaran berhasil disimpan!');
	window.location = '../pemesanan_saya.php'</script> ";
} else {
	echo "<script> alert('Bukti pembayaran gagal disimpan!');
	window.location = '../pemesanan_saya.php'</script> ";
	}
?>