<?php 
session_start();
include "../../koneksi.php";
 
$id_inspirasi    = $_POST['id_inspirasi'];
$judul_inspirasi = $_POST['judul_inspirasi'];
$ket_inspirasi   = $_POST['ket_inspirasi'];
$lokasi_file     = $_FILES['foto_inspirasi']['tmp_name'];
$nama_file       = $_FILES['foto_inspirasi']['name'];

if(empty($lokasi_file)){
$update="update inspirasi set judul_inspirasi='$judul_inspirasi',ket_inspirasi='$ket_inspirasi' where id_inspirasi='$id_inspirasi'";
}else{
	move_uploaded_file($lokasi_file,'../../images/inspirasi/'.$nama_file);

	$update="update inspirasi set foto_inspirasi ='$nama_file', judul_inspirasi='$judul_inspirasi', ket_inspirasi='$ket_inspirasi' where id_inspirasi='$id_inspirasi'";
}
$cek = mysql_query($update);

if($cek){

echo "<script> alert ('Perubahan berhasil disimpan!');
window.location = '../../file-kelola/edit_inspirasi.php?id=$id_inspirasi'</script>";
}
else{
echo "<script> alert ('Data gagal di edit!');
window.location = '../../file-kelola/edit_inspirasi.php?id=$id_inspirasi'</script>";
}
?>