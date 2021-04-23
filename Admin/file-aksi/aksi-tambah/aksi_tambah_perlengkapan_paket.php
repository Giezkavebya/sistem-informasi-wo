<?php
include "../../koneksi.php";
session_start();

$id_paket= $_POST['id_paket'];
$id_perlengkapan= $_POST['id_perlengkapan'];
$jumlah= $_POST['jumlah'];

 $cekdata= mysql_query("SELECT * FROM perlengkapan_paket WHERE id_paket = '$id_paket' AND id_perlengkapan = '$id_perlengkapan'");

 if(mysql_num_rows($cekdata) > 0) {
     echo "<script> alert('Data telah dimasukan, coba lagi!');
	  window.location = '../../file-kelola/kelola_perlengkapan_paket.php?id=$id_paket'</script> ";
   } else {
       $simpan = mysql_query("INSERT INTO perlengkapan_paket(id_paket,id_perlengkapan,jumlah) VALUES('$id_paket','$id_perlengkapan','$jumlah')");
       if($simpan) {
         echo "<script> alert('Data Baru berhasil disimpan!');
	  window.location = '../../file-kelola/kelola_perlengkapan_paket.php?id=$id_paket'</script> ";
       } else {
         echo "<script> alert('Data gagal disimpan!');
	     window.location = '../../file-kelola/kelola_perlengkapan_paket.php?id=$id_paket'</script> ";
       }
     }

?>