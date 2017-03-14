<?php
include '../koneksi.php';
echo $_POST['id_customer'];
$www = "SELECT * FROM `transaksi_kirim` WHERE id_customer='$_POST[id_customer]' ORDER BY no_kirim DESC LIMIT 1";
$ss = mysqli_query($konek, $www);
$val = mysqli_fetch_array($ss);
echo $val['status'];
if($val['status'] == 'Lunas' || empty($val['status'])){
if (empty($r)) $isi= "TKB00000000".$a; else $isi=$a;
$sl="update produk set stok=stok - '$_POST[jumlah]'
	where
	id_produk= '$_POST[id_produk]' ";
$edit=mysqli_query($konek,$sl)or die(mysqli_error());
mysqli_query($konek,"INSERT into temp (
	no_kirim,
	id_customer,
	id_produk,
	jumlah,tanggal_kirim,tempo,status)
	VALUES (
	'$_POST[no_kirim]',
	'$_POST[id_customer]',
	'$_POST[id_produk]',
	'$_POST[jumlah]',NOW(),'$_POST[tempo]','hutang')");
header("Location:../home.php?page=view_kirim");
}
else{
header("location:../home.php?page=val_kirim");
}
?>
