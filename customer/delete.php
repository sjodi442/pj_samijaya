<?php
include "../koneksi.php";
$nm=$_GET[id_customer];
mysqli_query($konek, "DELETE FROM kebijakan where id_customer='$nm'");
mysqli_query($konek,"DELETE FROM customer WHERE id_customer='$nm'");
header('Location:home.php?page=customer');
?>
