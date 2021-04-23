<?php 
error_reporting(0);
session_start();
include "../../koneksi.php";
if (isset($_POST['update'])) {//apabila tombol simpan dijalankan maka update data dijalankan 
$id_admin=$_POST['id_admin'];
$username_admin=$_POST['username_adm'];
$pass_admin = md5($_POST['pass_adm']);
$nama_admin = $_POST['nama_adm'];

$update="update admin set username_adm='$username_adm',pass_adm='$pass_adm', nama_adm='$nama_adm' where id_admin='$id_admin'";
}

$cek = mysql_query($update);

if($cek){
	
echo "<script> alert ('Perubahan berhasil disimpan!');
window.location = '../../file-kelola/kelola_admin.php'</script>";
}
else{
echo "<script> alert ('Data admin gagal di edit!');
window.location = '../../file-kelola/kelola_admin.php'</script>";
}
?>