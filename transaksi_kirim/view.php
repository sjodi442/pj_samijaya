<html>
<head>
</head>
<body>
<div>
<?php include "../koneksi.php"; ?>

<h2 align="center">Data Pengiriman</h2>
<hr />
<?php

		$select="select * from temp";
	$query=mysqli_query($konek,$select);
	$a= mysqli_fetch_array($query);



?>
No.Pengiriman : <?php echo "$a[no_kirim]"; ?>
<center>
<br>
<table align='center' border="1">
	<center>
		<thead>
			<tr>
				<th>Nama Customer</th><th>Nama Produk</th><th>Jumlah</th><th>tempo</th>
			</tr>
		</thead>
	</center>

<?php
	$e="SELECT temp.no_kirim,temp.jumlah,temp.tempo,produk.nama_produk,customer.nama_customer from temp inner join produk on temp.id_produk = produk.id_produk inner join customer on temp.id_customer = customer.id_customer";
	$b= mysqli_query($konek,$e);
	while($tampil = mysqli_fetch_array($b)){
	echo "
		<tr>
			<td>$tampil[nama_customer]</td>
			<td>$tampil[nama_produk]</td>
			<td>$tampil[jumlah]</td>
			<td>$tampil[tempo]</td>";
?>

		<td><a href=home.php?page=del_kirim&no_kirim=<?php echo $tampil['no_kirim']?> onClick="return confirm('Apakah Anda Yakin Hapus Data?')">Hapus</a></td>
		</tr>


		<?php
}

?>

</table>

<p><center><a href="home.php?page=tambah_beli">Tambah Pembelian</a></center></p>
<hr>
<p><center><a href="transaksi_kirim/insert2.php">Cetak</a></center></p>
</div>
</body>
</html>
