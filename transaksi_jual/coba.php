<?php include "../koneksi.php";
$ss = "select transaksi_kirim.id_customer, transaksi_kirim.id_produk, produk.harga, transaksi_kirim.jumlah from transaksi_kirim inner join customer on transaksi_kirim.id_customer=customer.id_customer inner join produk on transaksi_kirim.id_produk=produk.id_produk where transaksi_kirim.no_kirim='TKB000001'";
$aa = mysqli_query($konek, $ss);
while ($dd = mysqli_fetch_array($aa)){
  $select1="select nama_customer from customer where id_customer='$dd[id_customer]'";
  $query1=mysqli_query($konek, $select1);
  $tampil1 = mysqli_fetch_array($query1);
  $select2="select nama_produk from produk where id_produk='$dd[id_produk]'";
  $query2=mysqli_query($konek, $select2);
  $tampil2 = mysqli_fetch_array($query2);
  $a = $dd['harga'] ; $b = $dd['jumlah'];
  $total = $a*$b;
echo " <table>
  <tr>
    <td>$tampil1[nama_customer]</td>
    <td>$tampil2[nama_produk]</td>
    <td>$dd[harga]</td>
    <td>$dd[jumlah]</td>
    <td>$total</td> </table>";
  } ?>
