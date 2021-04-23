<?php 
error_reporting(0);
session_start();
include "../../koneksi.php";
if (isset($_POST['update'])) {
$id_alur=$_POST['id_alur'];
$judul_alur=$_POST['judul_alur'];
$isi_alur = $_POST['isi_alur'];

$update="UPDATE alur_pemesanan set judul_alur='$judul_alur',isi_alur='$isi_alur' WHERE id_alur='$id_alur' ";
}

$cek = mysql_query($update);

if($cek){
	
echo "<script> alert ('Perubahan berhasil disimpan!');
window.location = '../../file-edit/edit_alur.php?id=$id_alur'</script>";
}
else{
echo "<script> alert ('Data gagal di edit!');
window.location = '../../file-edit/edit_alur.php?id=$id_alur'</script>";
}
?>