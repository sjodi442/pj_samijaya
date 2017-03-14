<?php
include "../koneksi.php";
?> <table border="2" align="center">
  <thead>
  <tr>
  <th>No. Pengiriman</th><th>Tanggal</th><th>Nama Customer</th><th>Nama Produk</th><th>Jumlah</th><th colspan="2">Action</th>
  </tr>
  </thead>
<?php
if (isset($_POST['tgl'])){
$sql1 = $_POST['tgl1'];
$sql2 = $_POST['tgl2'];
$query5 = "select * from transaksi_kirim order by no_kirim DESC LIMIT 1";
  $xxx = mysqli_query($konek, $query5);
  $xxes = mysqli_fetch_array($xxx);
  $query = "select * from transaksi_kirim where tgl_kirim BETWEEN '$sql1' and '$sql2'";
  $as = mysqli_query($konek, $query);
  while ($data = mysqli_fetch_array($as)){
    $query1 = "select nama_customer from customer where id_customer='$data[id_customer]'";
    $as1 = mysqli_query($konek, $query1);
    $data1 = mysqli_fetch_array($as1);
    $query2 = "select nama_produk from produk where id_produk='$data[id_produk]'";
    $as2 = mysqli_query($konek, $query2);
    $data2 = mysqli_fetch_array($as2);
echo "
<tr>
  <td>$data[no_kirim]</td>
  <td>$data[tgl_kirim]</td>
  <td>$data1[nama_customer]</td>
  <td>$data2[nama_produk]</td>
  <td>$data[jumlah]</td>
";
?>
  <td><a href=edit.php?id=<?php echo $data['id'] ?> > Edit </a></td>
  <td><a href=delete.php?id=<?php echo $data['id'] ?> onClick="return confirm('Apakah Anda Yakin Hapus Data?')" > Hapus </a></td>
</tr>
<?php
}
?>
</table>
<?php } ?>
<!-- no_kirim -->
<?php
 if (isset($_POST['no'])){
  $sqlkirim = $_POST['no_kirim'];
   $query5 = "select * from transaksi_kirim order by no_kirim DESC LIMIT 1";
     $xxx = mysqli_query($konek, $query5);
     $xxes = mysqli_fetch_array($xxx);
     $query = "select * from transaksi_kirim where no_kirim = '$sqlkirim'";
     $as = mysqli_query($konek, $query);
     while ($data = mysqli_fetch_array($as)){
       $query1 = "select nama_customer from customer where id_customer='$data[id_customer]'";
       $as1 = mysqli_query($konek, $query1);
       $data1 = mysqli_fetch_array($as1);
       $query2 = "select nama_produk from produk where id_produk='$data[id_produk]'";
       $as2 = mysqli_query($konek, $query2);
       $data2 = mysqli_fetch_array($as2);
   echo "
   <tr>
     <td>$data[no_kirim]</td>
     <td>$data[tgl_kirim]</td>
     <td>$data1[nama_customer]</td>
     <td>$data2[nama_produk]</td>
     <td>$data[jumlah]</td>
   ";
   ?>
     <td><a href=edit.php?id=<?php echo $data['id'] ?> > Edit </a></td>
     <td><a href=delete.php?id=<?php echo $data['id'] ?> onClick="return confirm('Apakah Anda Yakin Hapus Data?')" > Hapus </a></td>
   </tr>
   <?php
   }
   ?>
   </table>
   <?php
  } ?>
  <p><center><a href="home.php?page=tampil_kirim">Kembali</a></center></p>
