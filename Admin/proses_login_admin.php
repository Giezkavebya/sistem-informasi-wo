<?php 
include "koneksi.php";
 $username_adm	= $_POST['username_adm']; 
 $pass_adm = $_POST['pass_adm']; 

$login = mysql_query("SELECT * FROM admin WHERE username_adm = '$username_adm' AND pass_adm='$pass_adm'"); 
$row=mysql_fetch_array($login); 
if ($row['username_adm'] == $username_adm AND $row['pass_adm'] == $pass_adm) 
{ 
  session_start(); 
  $_SESSION['username_adm'] = $row['username_adm']; 
  $_SESSION['pass_adm'] = $row['pass_adm']; 


  echo "<script>alert('Selamat datang $username_adm'); window.location='dashboard.php'; </script>";
   } 
else 
{ 
  echo "<script>alert('Username atau Password Salah, Mohon periksa kembali'); window.location='index.php'; </script>";

 } 
?> 