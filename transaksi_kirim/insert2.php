<?php
include "../koneksi.php";
$a="select * from temp";
$b=mysqli_query($konek,$a);
while($c=mysqli_fetch_array($b)) {
	mysqli_query($konek,"INSERT into transaksi_kirim value (default, '$c[no_kirim]','$c[id_customer]','$c[id_produk]','$c[jumlah]','$c[tanggal_kirim]','$c[tempo]','hutang')");
}
mysqli_query($konek,"DELETE FROM temp");

header("Location:view2.php");
?>
