<?php include "../koneksi.php" ?>
<?php
  //fetch data dari form
  $sqlidp = mysqli_real_escape_string($konek, $_POST['no_kirim']);
  $sqladp = mysqli_real_escape_string($konek, $_POST['no_jual']);
  //autentifikasi
  $aaa = "select * from transaksi_kirim where no_kirim='$sqlidp'";
  $bbb = mysqli_query($konek, $aaa);
  $ccc = mysqli_fetch_array($bbb);
  if ($ccc['status'] == 'Lunas'){
    header("location:home.php?page=val_jual");
  }
  else{

  }
  //fetch data inner 1
	$select="select transaksi_kirim.id_customer, transaksi_kirim.id_produk, kebijakan.harga, transaksi_kirim.jumlah from transaksi_kirim inner join kebijakan on transaksi_kirim.id_customer=kebijakan.id_customer and transaksi_kirim.id_produk=kebijakan.id_produk where transaksi_kirim.no_kirim='$sqlidp'";
  $query=mysqli_query($konek, $select);
  $tampil = mysqli_fetch_array ($query);
  //if kosong
  $select0="select transaksi_kirim.id_customer, transaksi_kirim.id_produk, produk.harga, transaksi_kirim.jumlah  from transaksi_kirim inner join customer on transaksi_kirim.id_customer=customer.id_customer inner join produk on transaksi_kirim.id_produk=produk.id_produk where transaksi_kirim.no_kirim='$sqlidp'";
  $query0=mysqli_query($konek, $select0);
  $tampil0=mysqli_fetch_array($query0);
  //fetch data nama_customer
  if (!empty($tampil['harga'])){
  $select1="select nama_customer from customer where id_customer='$tampil[id_customer]'";
  $query1=mysqli_query($konek, $select1);
  $tampil1 = mysqli_fetch_array($query1); }
  else {
    $select1="select nama_customer from customer where id_customer='$tampil0[id_customer]'";
    $query1=mysqli_query($konek, $select1);
    $tampil1 = mysqli_fetch_array($query1);
  }
  //fetch data nama_produk
  if (!empty($tampil['harga'])){
  $select2="select nama_produk from produk where id_produk='$tampil[id_produk]'";
  $query2=mysqli_query($konek, $select2);
  $tampil2 = mysqli_fetch_array($query2); }
  else {
    $select2="select nama_produk from produk where id_produk='$tampil0[id_produk]'";
    $query2=mysqli_query($konek, $select2);
    $tampil2 = mysqli_fetch_array($query2);
  }
  //Total
  if (!empty($tampil['harga'])){
  $a = $tampil['harga'] ; $b = $tampil['jumlah'];
  $total = $a*$b;}
  else {
    $a = $tampil0['harga'] ; $b = $tampil0['jumlah'];
    $total = $a*$b;
  }
?>
<!-- tabel -->
<h1 align="center">Transaksi Penjualan</h1>
<hr>
<form method="post" action="home.php?page=insert_jual">
<table align="center">
<tr>
  <td>No Penjualan</td>
  <td>: <input style="background-color: silver;" name="no_jual" readonly="true" type="text" value="<?php echo $sqladp ?>"></td>
<tr>
  <td>No Pengiriman</td>
  <td>: <input style="background-color: silver;" name="no_kirim" readonly="true" type="text" value="<?php echo $sqlidp ?>"></td>
</tr>
</tr>
</table>
<hr>
<table border="1" align='center'>
	<center>
		<thead>
			<tr>
				<th>Nama Customer</th><th>Nama Produk</th><th>Harga</th><th>Jumlah</th><th>Total</th>
			</tr>
		</thead>
	</center>
<?php
if(!empty($tampil['harga'])){
  $select="select transaksi_kirim.id_customer, transaksi_kirim.id_produk, kebijakan.harga, transaksi_kirim.jumlah from transaksi_kirim inner join kebijakan on transaksi_kirim.id_customer=kebijakan.id_customer and transaksi_kirim.id_produk=kebijakan.id_produk where transaksi_kirim.no_kirim='$sqlidp'";
  $query=mysqli_query($konek, $select);
  $tot_harga=0;
  while ($tampil = mysqli_fetch_array($query)){
    $select1="select nama_customer from customer where id_customer='$tampil[id_customer]'";
    $query1=mysqli_query($konek, $select1);
    $tampil1 = mysqli_fetch_array($query1);
    $select2="select nama_produk from produk where id_produk='$tampil[id_produk]'";
    $query2=mysqli_query($konek, $select2);
    $tampil2 = mysqli_fetch_array($query2);
    $a = $tampil['harga'] ; $b = $tampil['jumlah'];
    $total = $a*$b;
    $tot_harga+=$total;
  echo "
		<tr>
			<td align='center'>$tampil1[nama_customer]</td>
			<td align='center'>$tampil2[nama_produk]</td>";
?>
			<td align='center'>Rp. <?php if(!empty($tampil[harga])){ echo number_format($tampil[harga],0,'.',','); } ?></td>
<?php
  echo "
			<td align='center'>$tampil[jumlah]</td>";
?>

			<td align='center'>Rp. <?php if(!empty($total)){ echo number_format($total,0,'.',','); } ?></td>
<?php
       }
    }
  else{
    $select0="select transaksi_kirim.id_customer, transaksi_kirim.id_produk, produk.harga, transaksi_kirim.jumlah  from transaksi_kirim inner join customer on transaksi_kirim.id_customer=customer.id_customer inner join produk on transaksi_kirim.id_produk=produk.id_produk where transaksi_kirim.no_kirim='$sqlidp'";
    $query0=mysqli_query($konek, $select0);
    $tot_harga=0;
    while ($tampil0 = mysqli_fetch_array($query0)){
      $select1="select nama_customer from customer where id_customer='$tampil0[id_customer]'";
      $query1=mysqli_query($konek, $select1);
      $tampil1 = mysqli_fetch_array($query1);
      $select2="select nama_produk from produk where id_produk='$tampil0[id_produk]'";
      $query2=mysqli_query($konek, $select2);
      $tampil2 = mysqli_fetch_array($query2);
      $a = $tampil0['harga'] ; $b = $tampil0['jumlah'];
      $total = $a*$b;
      $tot_harga+=$total;
    echo "
  		<tr>
  			<td align='center'>$tampil1[nama_customer]</td>
  			<td align='center'>$tampil2[nama_produk]</td>";
 ?>
      <td align='center'>Rp. <?php if(!empty($tampil0[harga])){ echo number_format($tampil0[harga],0,'.',','); } ?></td>
<?php
  echo "
  			<td align='center'>$tampil0[jumlah]</td>";
?>
      <td align='center'>Rp. <?php if(!empty($total)){ echo number_format($total,0,'.',','); } ?></td>
<?php
      }
  }
?>
		</tr>
    <tr>
      <td colspan="4" align="center"><b>Total Harga</b></td>
      <td>Rp. <?php if(!empty($tot_harga)){ echo number_format($tot_harga,0,'.',','); } ?></td>
    </tr>
</table>
<hr>
<p><center><input type="submit" value="Cetak" name="submit"></center></p>
<p><center><a href="home.php?page=jual">Kembali</a></center></p>
</form>
