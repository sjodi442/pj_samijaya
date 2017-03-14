<?php
include "../koneksi.php";
$sql="update produk set id_produk='$_POST[id_produk]',
	nama_produk='$_POST[nama_produk]',
	harga='$_POST[harga]',
	stok='$_POST[stok]'
	where
	id_produk='$_GET[id_produk]'";
$edit=mysqli_query($konek,$sql)or die(mysql_error());
header('Location:../home.php?page=produk');
?>