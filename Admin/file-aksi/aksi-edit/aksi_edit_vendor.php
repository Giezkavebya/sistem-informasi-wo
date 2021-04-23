<?php 
session_start();
include "../../koneksi.php";
 
$id_vendor = $_POST['id_vendor'];
$nama_vendor = $_POST['nama_vendor'];
$insta_vendor = $_POST['insta_vendor'];
$tentang_vendor = $_POST['tentang_vendor'];
$lokasi_file = $_FILES['foto_vendor']['tmp_name'];
$nama_file = $_FILES['foto_vendor']['name']; 

if(empty($lokasi_file)){
$update="update vendor set nama_vendor='$nama_vendor',insta_vendor='$insta_vendor', tentang_vendor='$tentang_vendor' where id_vendor='$id_vendor'";
}else{
	move_uploaded_file($lokasi_file,'../../images/vendor/'.$nama_file);

	$update="update vendor set foto_vendor ='$nama_file', nama_vendor='$nama_vendor', insta_vendor='$insta_vendor', tentang_vendor='$tentang_vendor' where id_vendor='$id_vendor'";
}
$cek = mysql_query($update);

if($cek){

echo "<script> alert ('Perubahan berhasil disimpan!');
window.location = '../../file-edit/edit_vendor.php?id=$id_vendor'</script>";
}
else{
echo "<script> alert ('Data gagal di edit!');
window.location = '../../file-edit/edit_vendor.php?id=$id_vendor'</script>";
}
?>