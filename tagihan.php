<?php
include "koneksi.php";
$sql = "SELECT DISTINCT transaksi_kirim.no_kirim, customer.nama_customer, transaksi_kirim.status, transaksi_kirim.tempo FROM transaksi_kirim INNER JOIN customer on transaksi_kirim.id_customer=customer.id_customer WHERE status='hutang' ORDER BY transaksi_kirim.no_kirim";
$query = mysqli_query($konek, $sql);
?>
<h1 align="center">Daftar Tagihan</h1>
<table border=2 align='center'>
  <thead>
  <tr>
    <th>no_Pengiriman</th><th>nama customer</th><th>tempo</th><th>status</th>
  </tr>
  </thead>
  <?php
  while ($f = mysqli_fetch_array($query)) {
    echo "
    <tr>
    <td>$f[no_kirim]</td>
    <td>$f[nama_customer]</td>
    <td>$f[tempo]</td>
    <td>$f[status]</td>
    </tr>
    ";
  }
   ?>
</table>
