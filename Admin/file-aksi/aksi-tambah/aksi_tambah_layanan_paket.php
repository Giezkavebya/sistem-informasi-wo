<?php
include "../../koneksi.php";
session_start();

$id_paket= $_POST['id_paket'];
$id_layanan= $_POST['id_layanan'];
$isi_detlayanan= $_POST['isi_detlayanan'];

 $cekdata= mysql_query("SELECT * FROM detail_layananpaket WHERE id_paket = '$id_paket' AND id_layanan = '$id_layanan' ");

 if(mysql_num_rows($cekdata) > 0) {
     echo "<script> alert('Data telah dimasukan, coba lagi!');
	  history.go()</script> ";
   } else {

       $simpan = mysql_query("INSERT INTO detail_layananpaket(id_paket, id_layanan,isi_detlayanan) VALUES('$id_paket','$id_layanan','$isi_detlayanan')");
       if($simpan) {
         echo "<script> alert('Data Baru berhasil disimpan!');
	  window.location = '../../file-kelola/kelola_layanan_paket.php?id=$id_paket'</script> ";
       } else {
         echo "<script> alert('Data gagal disimpan!');
	     window.location = '../../file-kelola/kelola_layanan_paket.php?id=$id_paket'</script> ";
       }
     }

?>