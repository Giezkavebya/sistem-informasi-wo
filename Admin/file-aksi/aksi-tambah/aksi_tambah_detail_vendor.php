<?php
include "../../koneksi.php";
session_start();

$id_layanan= $_POST['id_layanan'];
$id_vendor= $_POST['id_vendor'];
 $cekdata= mysql_query("SELECT * FROM detail_vendor WHERE id_layanan = '$id_layanan' AND id_vendor = '$id_vendor' ");

 if(mysql_num_rows($cekdata) > 0) {
     echo "<script> alert('Data telah dimasukan, coba lagi!');
	  window.location = 'kelola_layanan.php'</script> ";
   } else {

       $simpan = mysql_query("INSERT INTO detail_vendor(id_layanan, id_vendor) VALUES('$id_layanan','$id_vendor')");
       if($simpan) {
         echo "<script> alert('Data Baru berhasil disimpan!');
	     window.location = '../../file-kelola/kelola_vendor.php?id=$id_layanan'</script> ";
       } else {
         echo "<script> alert('Data gagal disimpan!');
	     window.location = '../../file-kelola/kelola_vendor.php?id=$id_layanan'</script> ";
       }
     }

?>