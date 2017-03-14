<html>
<head></head>
<body>
<?php include "../koneksi.php";
$edit=mysqli_query($konek,"select * from customer ORDER BY id_customer
DESC LIMIT 1") or die (mysqli_error($konek));
$r = mysqli_fetch_array($edit); 
$a = $r['id_customer'];
$a++;
?>

<h1 align="center">INPUT CUSTOMER</h1>
<form method="POST" action="customer/insert.php">
	<table align="center">
	<tr>
		<td>ID Customer</td>
		<td>: <input style="background-color:silver;" readonly="true" type="text" value="<?php if (empty($r)) echo "C000".$a; else echo $a; ?>" name="id_customer"></td>
	</tr>
	<tr>
		<td>Nama Customer</td>
		<td>: <input type="text" name="nama_customer"></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>: <input type="text" name="alamat"></td>
	</tr>
	<tr>
		<td>No Telepon</td>
		<td>: <input type="text" name="telp"></td>
	</tr>
	<tr>
		<td colspan="2" align="center"> <input type="submit" name="submit" value="Simpan"> <input type="button" value="Batal" onclick="self.history.back()"></td>
	</tr>

</table>

</form>

</body>
</html>