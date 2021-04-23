<?php
include '../koneksi.php';
session_start();
require('../assets/pdf/fpdf.php');
require('WriteHTML.php');

{
date_default_timezone_set('Asia/Jakarta');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
}

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf=new PDF_HTML();
$pdf->SetMargins(20,20,20,20);
$pdf->AddPage();

//Image( file name , x position , y position , width [optional] , height [optional] )
$pdf->Image('logocari.png',20,21,20,18);
//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',12);
//Cell(width , height , text , border , end line , [align] )
$pdf->SetFont('Arial','B',15);
$pdf->MultiCell(170 ,14,'CARICACAN AND TEAM WEDDING ORGANIZER',0,'C');

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(170 ,0.5,'Alamat : Jl. Agung No. 13/327B Bukit Hindu, Palangka Raya',0,'C');
$pdf->SetFont('Arial','I',10);
$pdf->MultiCell(170 ,7,'email : caricacanandteam@gmail.com',0,'C');

//make a dummy empty cell as a vertical spacer
$pdf->Cell(150 ,8,'',0,5);//end of line
$pdf->SetFont('Times','B',12);
$pdf->MultiCell(170 ,5,'SURAT PERJANJIAN KONTRAK KERJASAMA',0,'C');

$pdf->Cell(150 ,10,'',0,1);//end of line
$pdf->SetLineWidth(1);
$pdf->Line(20, 46, 190, 46);
$pdf->SetLineWidth(0.5);
$pdf->Line(20, 47, 190, 47);

$sql=mysql_query("SELECT pelanggan.nama_pelanggan,pelanggan.alamat FROM pemesanan JOIN pelanggan ON pemesanan.id_pelanggan=pemesanan.id_pelanggan where pelanggan.id_pelanggan='$_GET[id]' AND pemesanan.id_pemesanan='$_GET[id1]'");
while ($rows=mysql_fetch_array($sql)) {

	$pdf->SetFont('Arial','',10);

	$pdf->Cell(45 ,5,'Yang bertanda tangan dibawah ini :',0,1);

	$pdf->Cell(45 ,5,'Nama',0,0);
	$pdf->Cell(6 ,5,':',0,0);
	$pdf->Cell(70 ,5,  $rows['nama_pelanggan'],0,1);

	$pdf->Cell(45 ,5,'Alamat',0,0);
	$pdf->Cell(6 ,5,':',0,0);
	$pdf->Cell(70 ,5,  $rows['alamat'],0,1);

	$pdf->Cell(45 ,5,'',0,1);

}

$pdf->Cell(45 ,5,'',0,1);
$pdf->WriteHTML('<p align="justify">   Berdasarkan perjanjian kerjasama yang telah disepakati kedua belah pihak yaitu dalam hal jasa wedding organizer. Untuk selanjutnya pihak Caricacan and Team memberikan fasilitas (terlampir) kepada pihak pelanggan. Adapun fasilitas yang diberikan pihak Caricacan and Team sesuai harga yang telah disepakati. Demikian surat perjanjian ini dibuat. Apabila dalam hal ini terjadi kesalah pahaman yang tidak sesuai dengan kesepakatan kerjasama, maka kedua belah pihak dapat menyelesaikannya secara musyawarah dengan cara kekeluargaan profesional dan dengan penuh itikad baik.
	</p>');

$pdf->Cell(100 ,10,'',0,1);
$sql=mysql_query("SELECT pelanggan.nama_pelanggan,pelanggan.alamat FROM pemesanan JOIN pelanggan ON pemesanan.id_pelanggan=pemesanan.id_pelanggan where pelanggan.id_pelanggan='$_GET[id]' AND pemesanan.id_pemesanan='$_GET[id1]'");
while ($rows=mysql_fetch_array($sql)) {
//end of line
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->SetFont('Arial','B',10);
$pdf->Cell(166,4,"Palangka Raya, ".date("d - m - Y"),0,1,'R');


$pdf->SetFont('Arial','B',10);

$pdf->Cell(130 ,4,'Caricacan and Team',0,0);
$pdf->Cell(70 ,5,'Pelanggan',0,1);//end of line
$pdf->Cell(150 ,10,'',0,1);//end of line

$pdf->Cell(130 ,10,'...................................',0,0);
$pdf->Cell(59 ,11, "( " .$rows['nama_pelanggan']." )",0,1);//end of line
}

$pdf->SetMargins(20,20,20,20);
$pdf->AddPage();

//Image( file name , x position , y position , width [optional] , height [optional] )
$pdf->Image('logocari.png',20,21,20,18);
//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',12);
//Cell(width , height , text , border , end line , [align] )
$pdf->SetFont('Arial','B',15);
$pdf->MultiCell(170 ,14,'CARICACAN AND TEAM WEDDING ORGANIZER',0,'C');

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(170 ,0.5,'Alamat : Jl. Agung No. 13/327B Bukit Hindu, Palangka Raya',0,'C');
$pdf->SetFont('Arial','I',10);
$pdf->MultiCell(170 ,7,'email : caricacanandteam@gmail.com',0,'C');

//make a dummy empty cell as a vertical spacer
$pdf->Cell(150 ,8,'',0,5);//end of line
$pdf->SetFont('Times','B',12);
$pdf->MultiCell(170 ,5,'DETAIL DATA PEMESANAN',0,'C');

$pdf->Cell(150 ,10,'',0,1);//end of line
$pdf->SetLineWidth(1);
$pdf->Line(20, 46, 190, 46);
$pdf->SetLineWidth(0.5);
$pdf->Line(20, 47, 190, 47);

$sql=mysql_query("SELECT * FROM pemesanan JOIN gedung ON pemesanan.id_gedung=gedung.id_gedung where pemesanan.id_pemesanan= '$_GET[id1]'");
while ($rows=mysql_fetch_array($sql)) {

	$pdf->SetFont('Arial','',10);

	$pdf->Cell(45 ,5,'Tanggal Pemesanan',0,0);
	$pdf->Cell(6 ,5,':',0,0);
	$pdf->Cell(70 ,5,  date ('d - m - Y', strtotime($rows['tanggal_pesan'])),0,1);

	$pdf->Cell(45 ,5,'Gedung / Tempat Acara',0,0);
	$pdf->Cell(6 ,5,':',0,0);
	$pdf->Cell(70 ,5,  $rows['nama_gedung'],0,1);

	$pdf->Cell(45 ,5,'',0,1);

}
$pdf->SetLeftMargin(35);
$pdf->Cell(45 ,5,'',0,1);
$pdf->SetFont('Arial','B',12);

$pdf->Cell(45 ,8,'Jadwal Acara',0,1);


$pdf->SetFont('Arial','B',10);

$pdf->Cell(10,6,'No',1,0,'C');
$pdf->Cell(60,6,'Nama Acara',1,0,'C');
$pdf->Cell(40,6,'Tanggal',1,0,'C');
$pdf->Cell(30,6,'Waktu',1,1,'C');
$no=1;
$sql=mysql_query("SELECT * FROM jadwal_acara JOIN pemesanan ON jadwal_acara.id_pemesanan=pemesanan.id_pemesanan WHERE pemesanan.id_pemesanan='$_GET[id1]'");
while ($row=mysql_fetch_array($sql)) {

	$pdf->Cell(10,6,$no,1,0,'C');
	$pdf->Cell(60,6,$row['nama_acara'],1,0,'C');
	$pdf->Cell(40,6,date ('d - m - Y', strtotime($row['tanggal_acara'])),1,0,'C');
	$pdf->Cell(30,6,$row['waktu_acara'],1,0,'C');
	$no++;
	$pdf->Cell(45 ,5,'',0,1);
}

$pdf->Cell(45 ,5,'',0,1);
$pdf->SetFont('Arial','B',12);

$pdf->Cell(45 ,8,'Data Paket',0,1);


$pdf->SetFont('Arial','B',10);
$pdf->SetLeftMargin(35);

$sql=mysql_query("SELECT * FROM pemesanan JOIN paket ON pemesanan.id_paket=paket.id_paket where pemesanan.id_pemesanan='$_GET[id1]'");
while ($row=mysql_fetch_array($sql)) {

	$pdf->Cell(60,6,'Nama Paket',1,0,'');
	$pdf->Cell(80,6,$row['nama_paket'],1,1,'C');
	
	$pdf->Cell(60,6,'Jumlah Hari',1,0,'');
	$pdf->Cell(80,6,$row['jumlah_hari'],1,1,'C');

	$pdf->Cell(60,6,'Jumlah Acara',1,0,'');
	$pdf->Cell(80,6,$row['jumlah_acara'],1,1,'C');
	
	$pdf->Cell(60,6,'Jumlah Tamu',1,0,'');
	$pdf->Cell(80,6,$row['jumlah_tamu'],1,1,'C');

	$pdf->Cell(60,6,'Jumlah Team',1,0,'');
	$pdf->Cell(80,6,$row['jumlah_team'],1,1,'C');

	$pdf->Cell(60,6,'Harga Paket',1,0,'');
	$pdf->Cell(80,6,"Rp. ". number_format($row['harga_paket'], 0, ".", "."),1,1,'C');

}

$pdf->SetLeftMargin(35);

$pdf->SetFont('Arial','B',12);

$pdf->Cell(45 ,8,'Layanan Paket',0,1);


$pdf->SetFont('Arial','B',10);

$pdf->Cell(10,6,'No',1,0,'C');
$pdf->Cell(60,6,'Nama Layanan',1,0,'C');
$pdf->Cell(70,6,'Keterangan',1,1,'C');
$no=1;
$sql=mysql_query("SELECT * FROM paket JOIN detail_layananpaket ON paket.id_paket=detail_layananpaket.id_paket JOIN layanan ON detail_layananpaket.id_layanan=layanan.id_layanan 
	JOIN pemesanan ON paket.id_paket=pemesanan.id_paket WHERE pemesanan.id_pemesanan='$_GET[id1]'");
while ($row=mysql_fetch_array($sql)) {

	$pdf->Cell(10,6,$no,1,0,'C');
	$pdf->Cell(60,6,$row['nama_layanan'],1,0,'C');
	$pdf->Cell(70,6,$row['isi_detlayanan'],1,0,'C');
	$no++;
	$pdf->Cell(45 ,5,'',0,1);
}

$pdf->SetLeftMargin(35);

$pdf->SetFont('Arial','B',12);

$pdf->Cell(45 ,8,'Perlengkapan Paket',0,1);


$pdf->SetFont('Arial','B',10);

$pdf->Cell(10,5,'No',1,0,'C');
$pdf->Cell(70,5,'Nama Perlengkapan',1,0,'C');
$pdf->Cell(30,5,'Jumlah',1,0,'C');
$pdf->Cell(30,5,'Satuan',1,1,'C');
$no=1;
$sql=mysql_query("SELECT * FROM paket JOIN perlengkapan_paket ON paket.id_paket=perlengkapan_paket.id_paket JOIN perlengkapan ON perlengkapan_paket.id_perlengkapan=perlengkapan.id_perlengkapan 
	JOIN pemesanan ON paket.id_paket=pemesanan.id_paket WHERE pemesanan.id_pemesanan='$_GET[id1]'");
while ($row=mysql_fetch_array($sql)) {

	$pdf->Cell(10,5,$no,1,0,'C');
	$pdf->Cell(70,5,$row['nama_perlengkapan'],1,0,'C');
	$pdf->Cell(30,5,$row['jumlah'],1,0,'C');
	$pdf->Cell(30,5,$row['satuan'],1,0,'C');
	$no++;
	$pdf->Cell(45 ,5,'',0,1);
}

$pdf->SetLeftMargin(20);
$pdf->Cell(45 ,5,'',0,1);
$pdf->SetFont('Arial','B',12);

$pdf->Cell(45 ,8,'Perlengkapan Tambahan',0,1);


$pdf->SetFont('Arial','B',10);

$pdf->Cell(10,6,'No',1,0,'C');
$pdf->Cell(60,6,'Nama Perlengkapan',1,0,'C');
$pdf->Cell(20,6,'Jumlah',1,0,'C');
$pdf->Cell(30,6,'Satuan',1,0,'C');
$pdf->Cell(50,6,'Harga',1,1,'C');
$no=1;
$sql=mysql_query("SELECT perlengkapan.nama_perlengkapan, perlengkapan.satuan,tambahan_perlengkapan.jumlah_tambahan, tambahan_perlengkapan.id_tambahan, perlengkapan.harga_perlengkapan*tambahan_perlengkapan.jumlah_tambahan AS harga_total FROM tambahan_perlengkapan JOIN perlengkapan ON tambahan_perlengkapan.id_perlengkapan=perlengkapan.id_perlengkapan JOIN pemesanan ON tambahan_perlengkapan.id_pemesanan=pemesanan.id_pemesanan WHERE tambahan_perlengkapan.id_pemesanan='$_GET[id1]'");
while ($row=mysql_fetch_array($sql)) {

	$pdf->Cell(10,6,$no,1,0,'C');
	$pdf->Cell(60,6,$row['nama_perlengkapan'],1,0,'C');
	$pdf->Cell(20,6,$row['jumlah_tambahan'],1,0,'C');
	$pdf->Cell(30,6,$row['satuan'],1,0,'C');
	$pdf->Cell(50,6,"Rp. ". number_format($row['harga_total'], 0, ".", "."),1,0,'C');
	$no++;
	$pdf->Cell(45 ,5,'',0,1);
}
$pdf->SetLeftMargin(90);
$pdf->Cell(45 ,8,'',0,1);
$sql=mysql_query("SELECT * FROM pemesanan where id_pemesanan= '$_GET[id1]'");
while ($rows=mysql_fetch_array($sql)) {

	$pdf->SetFont('Arial','B',12);

	$pdf->Cell(45 ,5,'Total Harga Pemesanan',0,0);
	$pdf->Cell(6 ,5,':',0,0);
	$pdf->Cell(70 ,5,"Rp. ". number_format($rows['harga_total'], 0, ".", "."),0,1);

	$pdf->Cell(45 ,5,'',0,1);

}

$pdf->Output("Kontrak.pdf","I");
?>