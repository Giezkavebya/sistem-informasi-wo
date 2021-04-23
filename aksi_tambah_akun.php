<?php
include"koneksi.php";
session_start();
error_reporting(0);

$id_pelanggan= $_POST['id_pelanggan'];
$username= $_POST['username'];
$nama_pelanggan= $_POST['nama_pelanggan'];
$pass = $_POST['pass'];
 $cekuser = mysql_query("SELECT * FROM pelanggan WHERE username = '$username'");

 if(mysql_num_rows($cekuser) > 0) {
     echo "<script> alert('Username telah terdaftar, coba lagi!');
	  window.location = 'register.php'</script> ";
   } else {

       $simpan = mysql_query("INSERT INTO pelanggan(username, nama_pelanggan, pass) VALUES('$username','$nama_pelanggan','$pass')");
       if($simpan) {
         echo "<script> alert('Akun berhasil dibuat! Silahkan login');
	     window.location = 'login.php'</script> ";
       } else {
         echo "<script> alert('Akun gagal dibuat!');
	     window.location = 'register.php'</script> ";
       }
     }

?>