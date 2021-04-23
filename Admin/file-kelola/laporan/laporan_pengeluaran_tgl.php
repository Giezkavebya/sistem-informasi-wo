<?php
include '../../koneksi.php';
require('../../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('logocari.png',1.5,0.7,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'CARICACAN AND TEAM WEDDING ORGANIZER',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 0811528737',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Alamat : Jl. Agung No. 13/327B, Bukit Hindu Palangka Raya',0,'L');
$pdf->SetX(4);
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',24);
$pdf->Cell(0,0.7,"Laporan Data Pengeluaran",0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(27,0.7,"Di cetak pada 	: ".date("D, d F Y"),0,0,'C');
$pdf->ln(1);
$pdf->Cell(8,0.7,"Dari : ".date('d F Y' , strtotime(@$_GET['tanggal_awal'])) ."  s/d  ".date('d F Y', strtotime(@$_GET['tanggal_akhir'])),0,0,'C');
$pdf->ln(1);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'ID Pengeluaran', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Tanggal',1,0, 'C');
$pdf->Cell(9, 0.8, 'Keterangan Pengeluaran', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Harga Satuan', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Total', 1, 1, 'C');



$no=1;
$tanggal_pengeluaran=@$_GET['tanggal_pengeluaran'];
$tanggal_awal=@$_GET['tanggal_awal'];
$tanggal_akhir=@$_GET['tanggal_akhir'];
// $pdf->Cell(1, 0.8, date($tanggal_awal), 1, 0, 'C');

$query=mysql_query("select * from pengeluaran where tanggal_pengeluaran between '$tanggal_awal' and '$tanggal_akhir' order by tanggal_pengeluaran asc");
if ($query===FALSE){
	die (mysql_error()); }
while($lihat=mysql_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['id_pengeluaran'],1, 0, 'C');
	$pdf->Cell(4, 0.8, date ('d F Y', strtotime($lihat['tanggal_pengeluaran'])),1,0, 'C');
	$pdf->Cell(9, 0.8, $lihat['ket_pengeluaran'],1, 0, 'C');
	$pdf->Cell(5, 0.8, "Rp. ".number_format($lihat['harga'])." ,-", 1, 0,'C');
	$pdf->Cell(5, 0.8, "Rp. ".number_format($lihat['total'])." ,-",1, 1, 'C');
	$no++;
}
$q=mysql_query("select sum(total) as total from pengeluaran where tanggal_pengeluaran between '$tanggal_awal' and '$tanggal_akhir' ");
if ($q===FALSE){
	die (mysql_error()); }
while($total=mysql_fetch_array($q)){
	$pdf->Cell(22, 0.8, "Total Pengeluaran", 1, 0,'C');		
	$pdf->Cell(5, 0.8, "Rp. ".number_format($total['total'])." ,-", 1, 1,'C');	
}

$pdf->Output("laporan_pengeluaran.pdf","I");

?>

