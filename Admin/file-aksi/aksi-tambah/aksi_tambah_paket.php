<?php
include("../../koneksi.php");
session_start();
error_reporting(0);

$id_paket = $_POST['id_paket'];
$nama_paket = $_POST['nama_paket'];
$harga_paket = preg_replace("/[^0-9]/", "", $_POST['harga_paket']);
$jumlah_hari = $_POST['jumlah_hari'];
$jumlah_acara = $_POST['jumlah_acara'];
$jumlah_tamu = $_POST['jumlah_tamu'];
$jumlah_team= $_POST['jumlah_team'];
$lokasi_file = $_FILES['foto_paket']['tmp_name'];
$nama_file = $_FILES['foto_paket']['name'];

if(empty($lokasi_file)){
	mysql_set_charset('utf8');
		$query = "insert into paket(nama_paket, harga_paket, jumlah_hari, jumlah_acara, jumlah_tamu, jumlah_team) values 
				 ( '$nama_paket', '$harga_paket','$jumlah_hari', '$jumlah_acara', '$jumlah_tamu','$jumlah_team')";
	} else {
			move_uploaded_file($lokasi_file,'../../images/fotopaket/'.$nama_file);
			$query = "insert into paket(nama_paket, harga_paket, jumlah_hari, jumlah_acara, jumlah_tamu, jumlah_team, foto_paket) values 
				 ( '$nama_paket', '$harga_paket','$jumlah_hari', '$jumlah_acara', '$jumlah_tamu','$jumlah_team', '$nama_file')";
	}
			
	$hasil = mysql_query($query);
	
if($hasil) {
	
	echo "<script> alert('Data Baru berhasil disimpan!');
	window.location = '../../file-kelola/kelola_paket.php'</script> ";
} else {
	echo "<script> alert('Data gagal disimpan!');
	window.location = '../../file-kelola/kelola_paket.php'</script> ";
	}
?>