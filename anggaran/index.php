<html>
<head>
</head>
<body>
<?php include "../koneksi.php"; ?>
<h2 align="center">Daftar Data Anggaran</h2>
<?php
	$select="select * from anggaran";
	$query=mysqli_query($konek,$select);
?>

<p><a href="home.php?page=input_anggaran">Tambah Data</a></p>
<table border='1' align='center'>
		<thead>
			<tr>
				<th>ID Anggaran</th><th>Nama Produk</th><th>Modal</th><th>Harga Jual</th><th>Untung</th><th colspan="2">Action</th>
			</tr>
		</thead>
<?php
	while($t = mysqli_fetch_array ($query)){
	echo "
		<tr>
			<td>$t[id_anggaran]</td>
			<td>$t[nama_produk]</td>";
?>
			<td>Rp. <?php if(!empty($t[modal])){ echo number_format($t[modal],0,'.',','); } ?></td>
			<td>Rp. <?php if(!empty($t[harga])){ echo number_format($t[harga],0,'.',','); } ?></td>
			<td>Rp. <?php if(!empty($t[untung])){ echo number_format($t[untung],0,'.',','); } ?></td>
			<td><a href=home.php?page=edit_anggaran&id_anggaran=<?php echo $t['id_anggaran']; ?>>Edit</a></td>
			<td><a href=home.php?page=del_anggaran&id_anggaran=<?php echo $t['id_anggaran']; ?> onClick="return confirm('Apakah Anda Yakin Hapus Data?')">Hapus</a></td>
<?php
}
?>
</tr>
</table>