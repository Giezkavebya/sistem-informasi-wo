<?php 
session_start();
include "../../koneksi.php";
 
$id_tentang  = $_POST['id_tentang'];
$intro       = $_POST['intro'];
$profil      = $_POST['profil'];
$alamat      = $_POST['alamat'];
$no_telp     = $_POST['no_telp'];
$email       = $_POST['email'];
$lokasi_file = $_FILES['gambar_tentang']['tmp_name'];
$nama_file   = $_FILES['gambar_tentang']['name'];

if(empty($lokasi_file)){
$update="update tentang set intro='$intro',profil='$profil', alamat='$alamat',no_telp='$no_telp',email='$email' where id_tentang='$id_tentang'";
}else{
	move_uploaded_file($lokasi_file,'../../images/tentang/'.$nama_file);

	$update="update tentang set gambar_tentang ='$nama_file', intro='$intro',profil='$profil', alamat='$alamat',no_telp='$no_telp',email='$email' where id_tentang='$id_tentang'";
}
$cek = mysql_query($update);

if($cek){
	
echo "<script> alert ('Perubahan berhasil disimpan!');
window.location = '../../file-kelola/kelola_tentang.php'</script>";
}
else{
echo "<script> alert ('Data tentang gagal di edit!');
window.location = '../../file-kelola/kelola_tentang.php'</script>";
}
?>