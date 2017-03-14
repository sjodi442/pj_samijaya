<?php include "../koneksi.php" ?>
<?php
$name=$_POST['nama_customer'];
$q ="select customer.nama_customer, transaksi_penjualan.no_penjualan, transaksi_penjualan.tgl_trans_jual, produk.nama_produk, transaksi_penjualan.harga, transaksi_penjualan.jumlah, transaksi_penjualan.total from transaksi_penjualan inner join produk on transaksi_penjualan.id_produk=produk.id_produk inner join customer on transaksi_penjualan.id_customer=customer.id_customer where transaksi_penjualan.id_customer='$name'";
$result = mysqli_query($konek,$q);
$tot_harga=0;
?>
<h2 align="center">Data Penjualan Per Customer</h2>
<table align="center" border="1">
<tr>
<center>
<th>No.</th>
<th>Nama Customer</th>
<th>No Pembelian</th>
<th>Tanggal</th>
<th>Nama Produk</th>
<th>Harga</th>
<th>Jumlah</th>
<th>Total</th>
</center></tr>
<?php
$no = 1;
while ($data = mysqli_fetch_array($result)) {
?>

<tr>
			<td class="tabel"><?php echo $no ;?></td>
			<td class="tabel"><?php echo $data['nama_customer']?></td>
        	<td class="tabel"><?php echo $data['no_penjualan']; ?></td>
        	<td class="tabel"><?php echo $data['tgl_trans_jual']; ?></td>
        	<td class="tabel"><?php echo $data['nama_produk']; ?></td>
        	<td class="tabel"><?php echo $data['harga']; ?></td>
        	<td class="tabel"><?php echo $data['jumlah']; ?></td>
        	<td class="tabel"><?php echo $data['total']; ?></td>
</tr>	
<?php 
$tot_harga+=$data['total'];
 $no++;
	} 
	?>
	<tr>
		<td class="tabel" colspan="7" align="center">Total Harga</td>
		<td class="tabel"><?php echo $tot_harga; ?></td>
	</tr>
</table>
<p><center><a href="home.php?page=data_jual">Kembali</a></center></p>