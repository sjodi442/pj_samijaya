<?php
include "../koneksi.php";
$sql=mysqli_query($konek,"SELECT transaksi_kirim.no_kirim,transaksi_kirim.tgl_kirim,customer.nama_customer,produk.nama_produk,transaksi_kirim.jumlah FROM transaksi_kirim inner join produk on transaksi_kirim.id_produk=produk.id_produk inner join customer on transaksi_kirim.id_customer=customer.id_customer");
$data = array();
while ($row = mysqli_fetch_assoc($sql)) {
    array_push($data, $row);
}
 
//mengisi judul dan header tabel
$judul = "Daftar Data Pengiriman";
$a = "tanggal : ";
$header = array(
array("label"=>"No. Pengiriman", "length"=>30, "align"=>"L"),
array("label"=>"Tanggal Pengiriman", "length"=>35, "align"=>"L"),
array("label"=>"Nama Customer", "length"=>50, "align"=>"L"),
array("label"=>"Nama Produk", "length"=>50, "align"=>"L"),
array("label"=>"Jumlah", "length"=>20, "align"=>"L"),
);
//memanggil fpdf
ob_start();
require("../fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();
 
//tampilan Judul Laporan
$pdf->SetFont('Arial','B','16'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(0,20, $judul, '0', 1, 'C');
 
//Header Table
$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(139, 69, 19); //warna dalam kolom header
$pdf->SetTextColor(255); //warna tulisan putih
$pdf->SetDrawColor(222, 184, 135); //warna border
foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();
 
//menampilkan data table
$pdf->SetFillColor(245, 222, 179); //warna dalam kolom data
$pdf->SetTextColor(0); //warna tulisan hitam
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
$i = 0;
foreach ($baris as $cell) {
$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
$i++;
}
$fill = !$fill;
$pdf->Ln();
}
 
//output file pdf
ob_end_clean();
$pdf->Output("Laporan_Pengiriman.pdf","I");
ob_end_flush();
?>