<html>
<head></head>
<body>
  <?php
  include "../koneksi.php";
  $sql = "select * from transaksi_penjualan order by no_penjualan DESC LIMIT 1";
  $edit = mysqli_query($konek, $sql);
  $r = mysqli_fetch_array($edit);
  $a = $r['no_penjualan'];
  $a++; ?>
  <form name="form7" method="POST" action="home.php?page=view_jual">
  <h1 align="center">Input Transaksi Penjualan</h1>
  <!-- no kirim -->
  <p><a href="home.php?page=data_jual">Lihat Data Penjualan</a></p>
  <hr>
  <table align="center">
  <tr>
    <td>No. Penjualan</td>
    <td> : <input type="text" style="background-color: silver;" readonly="true" value="<?php if (empty($r)) echo "TPB00000000".$a; else echo $a ; ?>" name="no_jual"></td>
  </tr>
  <tr>
    <td>No. Pengiriman</td>
    <td> : <input type="text" name="no_kirim"></td>
  </tr>
  </table>
  <hr>
	<center><input type="submit" name="cari" value="Submit"> <input type="button" value="Batal" onclick="self.history.back()"></center>
</form>
</body>
</html>
