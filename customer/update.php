<?php
include "../koneksi.php";
$sql="update customer set id_customer='$_POST[id_customer]',
	nama_customer='$_POST[nama_customer]',
	alamat='$_POST[alamat]',
	telp='$_POST[telp]'
	where
	id_customer='$_GET[id_customer]'";
$edit=mysqli_query($konek,$sql)or die(mysqli_error());
header('Location:../home.php?page=customer');
?>