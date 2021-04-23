<?php
include('../../koneksi.php');
session_start();
$id_pelanggan = $_POST['id_pelanggan'];
$isi_review = $_POST['isi_review'];
$kepuasan_layanan= $_POST['kepuasan_layanan'];
$query = "insert into review(id_pelanggan, isi_review, kepuasan_layanan ) values 
('$id_pelanggan', '$isi_review', '$kepuasan_layanan')";
$hasil = mysql_query($query);

if($hasil) {
  echo "<script> alert('Review berhasil disimpan!');
  window.location = '../profil_pelanggan.php'</script> ";
} else {
  echo "<script> alert('Review gagal disimpan!');
  window.location = '../profil_pelanggan.php'</script> ";
}

?>