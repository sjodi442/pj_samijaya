<?php
include "../koneksi.php";
$sql="update kebijakan set id_kebijakan='$_POST[id_kebijakan]',
id_customer='$_POST[nama_customer]',
id_produk='$_POST[nama_produk]',
harga='$_POST[harga]'
	where
	id_kebijakan='$_GET[id_kebijakan]'";
$edit=mysqli_query($konek,$sql) or die (mysql_error());
header ('Location:../home.php?page=kebijakan');
?>