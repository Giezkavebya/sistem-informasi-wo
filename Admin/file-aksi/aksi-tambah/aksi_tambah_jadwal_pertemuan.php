<?php
include "../../koneksi.php";
session_start();

$id_pemesanan= $_POST['id_pemesanan'];
$urutan_pertemuan= $_POST['urutan_pertemuan'];
$date = mysql_real_escape_string($_POST['tanggal_pertemuan']);
$new_date = date('Y-m-d',strtotime($date));

 $cekdata= mysql_query("SELECT COUNT(*) AS hitung FROM jadwal_pertemuan WHERE tanggal_pertemuan= '$new_date'");
 $num = mysql_fetch_array($cekdata);
$count = $num['hitung'];
if($count > 3) {
     echo "<script> alert('Tanggal tidak tersedia, coba lagi!');
   window.location = '../pemesanan_paket.php?id=$id_paket'</script>";
   } else {
       $query = "INSERT INTO jadwal_pertemuan(id_pemesanan,urutan_pertemuan,tanggal_pertemuan) VALUES('$id_pemesanan','$urutan_pertemuan','$new_date')";
       $simpan = mysql_query($query);
       if($simpan) {
         echo "<script> alert('Tanggal Pertemuan berhasil disimpan!');
    window.location = '../detail_pemesanan.php?id=$id_pemesanan'</script> ";
       } else {
         echo "<script> alert('Tanggal Pertemuan gagal disimpan!');
       window.location = '../detail_pemesanan.php?id=$id_pemesanan'</script> ";
       }
     }

?>
