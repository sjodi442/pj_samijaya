<?php
include "../koneksi.php";
$id=$_GET['no_kirim'];
mysqli_query($konek,"DELETE FROM transaksi_kirim WHERE no_kirim='$id'");
header('Location:view.php');
?>