<?php
include "../koneksi.php";

$sql="update produk set stok='$_POST[stok]' + stok where

 nama_produk= '$_POST[nama_produk]' ";
 
 $edit=mysqli_query($konek,$sql) or die (mysqli_error());

header ('Location:../home.php?page=produk');		
?>


