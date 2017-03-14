<?php
include "../koneksi.php";
$sql = "select * from anggaran where id_anggaran='$_GET[id_anggaran]'";
$edit = mysqli_query($konek,$sql) or die (mysqli_error());
$r = mysqli_fetch_array($edit);
$id = $r['id_anggaran'];
$nama= $r['nama_produk'];

$untung=$_POST['harga']-$_POST['modal'];
$sql1  ="update anggaran set id_anggaran='$id', nama_produk='$nama', modal='$_POST[modal]', harga='$_POST[harga]', untung='$untung'
		where id_anggaran='$_GET[id_anggaran]'";
$edit=mysqli_query($konek,$sql1)or die(mysqli_error());
header('Location:../home.php?page=anggaran');
?>