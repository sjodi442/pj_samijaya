<?php
include "../koneksi.php";
?><table border="2" align="center">
  <thead>
  <tr>
  <th>No. Penjualan</th><th>Tanggal</th><th>Nama Customer</th><th>Nama Produk</th><th>Harga</th><th>Jumlah</th><th>Total</th>
  </tr>
  </thead><?php
if (isset($_POST['tgl'])){
  $sql1 = $_POST['tgl1'];
  $sql2 = $_POST['tgl2'];
  $query = "select * from transaksi_penjualan where tgl_trans_jual BETWEEN '$sql1' and '$sql2'";
  $as = mysqli_query($konek, $query);
  $tot_harga=0;
  while ($data = mysqli_fetch_array($as)){
    $query1 = "select nama_customer from customer where id_customer='$data[id_customer]'";
    $as1 = mysqli_query($konek, $query1);
    $data1 = mysqli_fetch_array($as1);
    $query2 = "select nama_produk from produk where id_produk='$data[id_produk]'";
    $as2 = mysqli_query($konek, $query2);
    $data2 = mysqli_fetch_array($as2);
echo "
<tr>
  <td>$data[no_penjualan]</td>
  <td>$data[tgl_trans_jual]</td>
  <td>$data1[nama_customer]</td>
  <td>$data2[nama_produk]</td>";
?>
  <td>Rp. <?php if(!empty($data[harga])){ echo number_format($data[harga],0,'.',','); } ?></td>
  <td align="center"><?php echo " $data[jumlah]"; ?></td>
  <td>Rp. <?php if(!empty($data[total])){ echo number_format($data[total],0,'.',','); } ?></td>
<?php
  $tot_harga+=$data['total'];
?>
</tr>
<?php
}
?>
<tr>
  <td colspan="6" align="center"><b>Total Penjualan</b></td>
  <td>Rp. <?php if(!empty($tot_harga)){ echo number_format($tot_harga,0,'.',','); } ?></td>
</tr>
</table>
<?php
}
?>
<!-- no_jual -->
<?php
if (isset($_POST['no'])){
  $sqljual = $_POST['no_kirim'];
  $query = "select * from transaksi_penjualan where no_penjualan='$sqljual'";
  $as = mysqli_query($konek, $query);
  $tot_harga=0;
  while ($data = mysqli_fetch_array($as)){
    $query1 = "select nama_customer from customer where id_customer='$data[id_customer]'";
    $as1 = mysqli_query($konek, $query1);
    $data1 = mysqli_fetch_array($as1);
    $query2 = "select nama_produk from produk where id_produk='$data[id_produk]'";
    $as2 = mysqli_query($konek, $query2);
    $data2 = mysqli_fetch_array($as2);
echo "
<tr>
  <td>$data[no_penjualan]</td>
  <td>$data[tgl_trans_jual]</td>
  <td>$data1[nama_customer]</td>
  <td>$data2[nama_produk]</td>";
?>
  <td>Rp. <?php if(!empty($data[harga])){ echo number_format($data[harga],0,'.',','); } ?></td>
  <td align="center"><?php echo " $data[jumlah]"; ?></td>
  <td>Rp. <?php if(!empty($data[total])){ echo number_format($data[total],0,'.',','); } ?></td>
<?php
  $tot_harga+=$data['total'];
?>
</tr>
<?php
}
?>
<tr>
  <td colspan="6" align="center"><b>Total Penjualan</b></td>
  <td>Rp. <?php if(!empty($tot_harga)){ echo number_format($tot_harga,0,'.',','); } ?></td>
</tr>
</table>
<?php
}
?>
<p><center><a href="home.php?page=data_jual">Kembali</a></center></p>
