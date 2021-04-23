<?php
include("../../koneksi.php");
session_start();
date_default_timezone_set("ASIA/JAKARTA");

$id_pemesanan= $_POST['id_pemesanan'];
$sisa_pembayaran= $_POST['sisa_pembayaran'];
$jumlah_pembayaran= preg_replace("/[^0-9]/", "", $_POST['jumlah_pembayaran']);
$tanggal_pembayaran =  date("Y-m-d");

$harga_bayar= mysql_query("SELECT * FROM pemesanan WHERE id_pemesanan= '$id_pemesanan' AND sisa_pembayaran IS NOT NULL");
$data=mysql_fetch_array($harga_bayar);
$harga_total=$data['harga_total'];
$harga_dp= (20/100) * $harga_total;

$lokasi_file = $_FILES['bukti_pembayaran']['tmp_name'];
$nama_file = $_FILES['bukti_pembayaran']['name'];
$direktori1 = "../../Admin/images/buktipembayaran/$nama_file";

if($jumlah_pembayaran < $harga_dp) {
	echo "<script> alert('Jumlah pembayaran kurang!');
	window.location = '../pemesanan_saya.php'</script> ";
}else {
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
}

?>