<html>
<head>
  <title></title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css" media="print">
    @page
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
</style>
<style>
#wrapper{
  width : 500px;
  margin: 0 auto;
  overflow: hidden;
}
</style>

</head>
<body>
  <div id="wrapper">
    <div class="row" style="background-color:#ff403b;color:#ffffff;padding:20px;font-family:verdana">
  <h1 align="center"> Nota Penjualan </h1>
</div>
<div class="row" style="padding:20px;font-family:verdana">
  <?php include "../koneksi.php";
  $query = "select * from transaksi_penjualan order by no_penjualan DESC LIMIT 1";
  $as = mysqli_query($konek, $query);
  $data = mysqli_fetch_array($as);
  $query1 = "select nama_customer from customer where id_customer='$data[id_customer]'";
  $as1 = mysqli_query($konek, $query1);
  $data1 = mysqli_fetch_array($as1);
  $query2 = "select nama_produk from produk where id_produk='$data[id_produk]'";
  $as2 = mysqli_query($konek, $query2);
  $data2 = mysqli_fetch_array($as2);
  ?>
  <table width="100%">
  <tr><td> Nomor Penjualan: <input class="form-control" style="max-width:200px" type="text" value="<?php echo $data['no_penjualan'] ?>" readonly></td>
  <td align="right">Tanggal : <?php echo $data['tgl_trans_jual'] ?></td>
  <tr><td>Nama Customer: <input class="form-control" style="max-width:200px" type="text" value="<?php echo $data1['nama_customer'] ?>" readonly><br>
  </td></tr></table >
  <table class="table table-striped" border="1" align="center">
    <tr>
      <th>Nama Produk</th><th>Harga</th><th>Jumlah</th><th>Total</th>
    </tr>

      <?php
      $query5 = "select * from transaksi_penjualan order by no_penjualan DESC LIMIT 1";
      $xxx = mysqli_query($konek, $query5);
      $xxes = mysqli_fetch_array($xxx);
      $query = "select * from transaksi_penjualan where no_penjualan = '$xxes[no_penjualan]'";
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
        <td align='center' width='180'>$data2[nama_produk]</td>
        <td align='center' width='130'>Rp. $data[harga]</td>
        <td align='center'>$data[jumlah] </td>
        <td>Rp. $data[total]</td>
      </tr>";
        $tot_harga+=$data['total'];
      }
      ?>
    <tr>
      <td colspan="3" align="center"><b>Total Harga<b></td>
      <td width="130">Rp. <?php if(!empty($tot_harga)){ echo number_format($tot_harga,0,'.',','); } ?></td>
    </tr>
  </table>
  <hr>
  <script>
  window.print();
  </script>
</div>
</body>
</html>
