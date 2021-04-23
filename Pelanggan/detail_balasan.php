<?php
include "../koneksi.php";
if(isset($_POST["id"]))
{
  $output = '';
  $query = "SELECT pelanggan.id_pelanggan, pesan_pelanggan.id_pesanpelanggan, pesan_pelanggan.id_pelanggan, pesan_pelanggan.isi_pesan, pesan_pelanggan.tanggal_kirim AS tanggal_pesan, balas_pesan.tanggal_kirim AS tanggal_balas, balas_pesan.isi_balasan, balas_pesan.id_balaspesan FROM pesan_pelanggan JOIN pelanggan ON pesan_pelanggan.id_pelanggan=pelanggan.id_pelanggan LEFT JOIN balas_pesan ON pesan_pelanggan.id_pesanpelanggan=balas_pesan.id_pesanpelanggan WHERE balas_pesan.id_balaspesan='".$_POST["id"]."'";
  $result = mysql_query($query);
  while($row = mysql_fetch_array($result))
  {
    $output = '
    <style>
    .popover{
      max-width: 100%; 
      } </style>
      <div class="detail" style="color:#080808;">
      <p><div class="card mb-1">
      <div class="card-body">
      <p class="card-title">Saya</p>
      <p class="card-text">'.$row["isi_pesan"].'</p>
      <p class="card-text"><small class="text-muted">'.$row["tanggal_pesan"].'</small></p>
      </div></p>
      </div>
      <div class="detail" style="color:#080808;">
      <p><div class="card border-dark mb-1">
      <div class="card-body">
      <p class="card-title">Admin</p>
      <p class="card-text">'.$row["isi_balasan"].'</p>
      <p class="card-text"><small class="text-muted">'.$row["tanggal_balas"].'</small></p>
      </div></p> 
      </div>
      ';
    }
    echo $output;
  }
  ?>