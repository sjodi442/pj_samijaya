<?php include"../koneksi.php";
$sql = "select * from anggaran order by id_anggaran DESC LIMIT 1";
$q = mysqli_query($konek, $sql);

$r = mysqli_fetch_array($q);
$a = $r['id_anggaran'];
$a++;
if (empty($r)) $isi="A000".$a; else $isi= $a;
$untung=$_POST['harga']-$_POST['modal'];
mysqli_query($konek, "INSERT INTO anggaran (id_anggaran, nama_produk, modal, harga, untung) values ('$isi', '$_POST[nama_produk]', '$_POST[modal]', '$_POST[harga]', '$untung')");
header('location:../home.php?page=anggaran');
?>