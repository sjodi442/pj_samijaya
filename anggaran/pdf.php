<?php
include"../koneksi.php";
$sql=mysqli_query($konek,"SELECT * FROM anggaran ORDER BY id_anggaran");
$data = array();
while ($row = mysqli_fetch_assoc($sql)) {
    array_push($data, $row);
}
 
$judul = "Laporan Data Anggaran";
echo"<center>";
$header = array(
array("label"=>"ID Anggaran", "length"=>30, "align"=>"L"),
array("label"=>"Nama Produk", "length"=>50, "align"=>"L"),
array("label"=>"Modal", "length"=>30, "align"=>"L"),
array("label"=>"Harga", "length"=>30, "align"=>"L"),
array("label"=>"Untung", "length"=>30, "align"=>"L"),
);
require_once ("../fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,20, $judul, '0', 1, 'C');

$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(139, 69, 19);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(222, 184, 135);
foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();

$pdf->SetFillColor(245, 222, 179);
$pdf->SetTextColor(0);
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
$pdf->Output("Laporan_Anggaran.pdf","I");
echo"</center>";
?>