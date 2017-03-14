<?php
include "../koneksi.php";
mysqli_query($konek,"DELETE FROM anggaran WHERE id_anggaran='$_GET[id_anggaran]'");
header('Location:home.php?page=anggaran');
?>