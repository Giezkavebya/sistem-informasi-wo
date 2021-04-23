<?php
include("../../koneksi.php");
session_start();
error_reporting(0);

$id_inspirasi= $_POST['id_inspirasi'];
$judul_inspirasi = $_POST['judul_inspirasi'];
$ket_inspirasi = $_POST['ket_inspirasi'];
$lokasi_file = $_FILES['foto_inspirasi']['tmp_name'];
$nama_file = $_FILES['foto_inspirasi']['name'];
$direktori1 = "../../images/inspirasi/$nama_file";

if(empty($lokasi_file)){
	mysql_set_charset('utf8');
		$query = "insert into inspirasi(judul_inspirasi, ket_inspirasi) values 
				 ( '$judul_inspirasi', $ket_inspirasi')";
	} else {
			move_uploaded_file($lokasi_file,'../../images/inspirasi/'.$nama_file);
			$query = "insert into inspirasi(judul_inspirasi, foto_inspirasi, ket_inspirasi) values 
				 ('$judul_inspirasi', '$nama_file', '$ket_inspirasi')";
	}
			
	$hasil = mysql_query($query);
	
if($hasil) {
	
	echo "<script> alert('Data berhasil disimpan!');
	window.location = '../../file-kelola/kelola_inspirasi.php'</script> ";
} else {
	echo "<script> alert('Data gagal disimpan!');
	window.location = '../../file-kelola/kelola_inspirasi.php'</script> ";
	}
?>