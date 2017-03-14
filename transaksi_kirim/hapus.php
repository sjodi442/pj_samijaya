<?php
include "../koneksi.php";
$id=$_GET['no_kirim'];
mysqli_query($konek,"DELETE FROM temp WHERE no_kirim='$id'");
header('Location:home.php?page=view_kirim');
?>