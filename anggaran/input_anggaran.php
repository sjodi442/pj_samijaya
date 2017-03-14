<html>
<head>
</head>
<body>
<center>
<table>
<form method="POST" action="anggaran/insert.php">
<h2>INPUT ANGGARAN</h2>
<tr><td>Nama Produk </td><td>: <select type="text" name="nama_produk">
<?php 
include"../koneksi.php";
$query=mysqli_query($konek,"select * from produk");
	while($kata=mysqli_fetch_array($query))
	{
	?>
	<option><?php echo $kata['nama_produk']; ?>
	</option>
	<?php
	}
	?>
</select></td>
<tr><td>Modal </td><td>: <input type="text" name="modal"></td>
<tr><td>Harga Jual </td><td>: <input type="text" name="harga"></td>
</table>
<input class="input" type="submit" name="submit" value="Simpan"> <input type="button" value="Batal" onclick="self.history.back()">
</form>
</body>
</html>