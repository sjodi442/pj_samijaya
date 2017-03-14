<?php
include "../koneksi.php";
$id=$_GET[id_produk];
mysqli_query($konek, "DELETE FROM kebijakan where id_produk='$id'");
mysqli_query($konek,"DELETE FROM produk WHERE id_produk='$id'");
header('Location:home.php?page=produk');
?>
