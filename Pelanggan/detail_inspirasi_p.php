<?php
include "../koneksi.php";
if(isset($_POST["id"]))
{
  $output = '';
  $query = "SELECT * FROM inspirasi WHERE id_inspirasi='".$_POST["id"]."'";
  $result = mysql_query($query);
  while($row = mysql_fetch_array($result))
  {
    $output = '
    <style>
    .popover{
      max-width: 50%; 
      } </style>
      <div class="detail" style="color:#080808;">
      <p><img src="../Admin/images/inspirasi/'.$row["foto_inspirasi"].'" class="img-responsive img-thumbnail" /></p>
      <p>'.$row['judul_inspirasi'].'</p>
      <p>'.$row['ket_inspirasi'].'</p>
      </div>
      ';
    }
    echo $output;
  }
  ?>