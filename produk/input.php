<html>
<head>
</head>
<body>
<?php include "../koneksi.php";
$sql = "select * from produk ORDER BY id_produk
DESC LIMIT 1";
$edit=mysqli_query($konek,$sql) or die (mysqli_error());
$r = mysqli_fetch_array($edit);
$a = $r['id_produk'];
$a++;?>
<b><h1 align="center">Input Data Produk</h1></b>
<form method="POST" action="produk/insert.php">
<table align="center">
	<tr>
		<td>ID Produk</td>
		<td>: <input type="text" name="id_produk" placeholder="" readonly value="<?php  if (empty($r)) echo "P00".$a; else echo $a; ?>"> </td>
	</tr>
	<tr>
		<td>Nama Produk </td>
		<td>: <input type="text" name="nama_produk" placeholder=""></td>
	</tr>
	<tr>
		<td>Harga</td>
		<td>: <input type="text" name="harga" placeholder=""></td>
	</tr>
	<tr>
		<td>Jumlah</td>
		<td>: <input type="text" name="stok" placeholder=""></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" name="submit" value="Simpan"><input type="button" value="Batal" onclick="self.history.back()"></td>
	</tr>

</table>

</form>
</body>
</html>
