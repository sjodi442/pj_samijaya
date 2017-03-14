<html>
<head>
</head>
<body>
<?php
include '../koneksi.php';?>
<h2 align="center">Daftar Data Customer</h2>
<?php
	$select="select * from customer";
	$query=mysqli_query($konek,$select);
?>
<p><a style="display: <?php if($_SESSION['level'] == 2 || $_SESSION['level'] == 3) echo 'none'; else echo 'block'; ?>" href="home.php?page=input_cust">Tambah Data</a> | <a  href="grafik/grafik_cust.php" target="blank">Grafik Prestasi Customer</a></p>
<table align="center" border="1">
	<center>
		<thead>
			<tr>
				<th>ID Customer</th><th>Nama Customer</th><th>Alamat</th><th>No Telepon</th><th colspan="2">Action</th>
			</tr>
		</thead>
	</center>
<?php
	while($tampil = mysqli_fetch_array ($query)){
	echo "
		<tr>
			<td>$tampil[id_customer]</td>
			<td>$tampil[nama_customer]</td>
			<td>$tampil[alamat]</td>
			<td>$tampil[telp]</td>";
?>
			<td><a href=home.php?page=edit_cust&id_customer=<?php echo $tampil['id_customer'] ?>>Edit</a></td>
			<td><a href=home.php?page=del_cust&id_customer=<?php echo $tampil['id_customer']?> onClick="return confirm('Apakah Anda Yakin Ingin Hapus Data?')">Hapus</a></td>
		</tr>
<?php
}
?>
</table>
</body>
</html>
