<?php include "../koneksi.php"; ?>
<html>
<head>
</head>
<body>
<h2 align="center">Daftar Data Produk</h2>
<?php
	$select="select * from produk";
	$query=mysqli_query($konek,$select);


//<p><a href="pdf.php">Download Laporan Data Produk</a></p>
?>
<p><a style="display: <?php if($_SESSION['level'] == 2 ) echo 'none'; else echo 'block'; ?>" href="home.php?page=input_produk">| Tambah Data</a>
<a style="display: <?php if($_SESSION['level'] == 2 ) echo 'none'; else echo 'block'; ?>" href="home.php?page=tambah_produk">| Update Produk</a>
	<a href="grafik/grafik_produk.php" target="blank">| Grafik Prestasi Produk</a></p>
<table border=1 align='center'>
	<center>
		<thead>
			<tr>
				<th>ID Produk</th><th>Nama Produk</th><th>Harga</th><th>Jumlah</th><th colspan="2">Action</th>
			</tr>
		</thead>
	</center>
<?php
	while($tampil = mysqli_fetch_array ($query)){
	echo "
		<tr>
			<td>$tampil[id_produk]</td>
			<td>$tampil[nama_produk]</td>";
?>
			<td>Rp. <?php if(!empty($tampil[harga])){ echo number_format($tampil[harga],0,'.',','); } ?></td>
<?php
	echo "
			<td align='center'>$tampil[stok]</td>
			";
?>
			<td><a href=home.php?page=edit_produk&id_produk=<?php echo $tampil['id_produk'] ?>>Edit</a></td>
			<td><a href=home.php?page=del_produk&id_produk=<?php echo $tampil['id_produk']?> onClick="return confirm('Apakah Anda Yakin Hapus Data?')">Hapus</a></td>
		</tr>
<?php
}
?>
</table>

</body>
</html>
