<?php
include "../koneksi.php";
$kd=$_GET['id_kebijakan'];
mysqli_query($konek,"DELETE FROM kebijakan WHERE id_kebijakan='$kd'");
header('Location:home.php?page=kebijakan');
?>