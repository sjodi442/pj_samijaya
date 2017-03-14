<?php
include '../koneksi.php';
$sql="update kebijakan set harga='$_POST[harga]' where id_customer='$_POST[nama_customer]' and id_produk='$_POST[nama_produk]' ";
mysqli_query($konek,$sql);
header ('Location:../home.php?page=kebijakan');
?>
