<html>
<head>
</head>
<body><center>
<?php
include "../koneksi.php";
$sql = "select * from anggaran where id_anggaran='$_GET[id_anggaran]'";
$edit = mysqli_query($konek,$sql) or die (mysqli_error());
$r = mysqli_fetch_array($edit);
echo "
<form method=post action=anggaran/update.php?id_anggaran=$r[id_anggaran]>
	<h2>Edit Data Anggaran</h2>
		<table align='center'>
			<tr>
				<td>id anggaran</td>
				<td>: <input type=text name=id_anggaran value='$r[id_anggaran]' readonly></td>
			</tr>
			<tr>
				<td>Nama Produk</td>
				<td>: <input type=text name=nama_produk value='$r[nama_produk]' readonly></td>
			</tr>
			<tr>
				<td>Modal</td>
				<td>: <input type=text name=modal value='$r[modal]'></td>
			</tr>
			<tr>
				<td>Harga Jual</td>
				<td>: <input type=text name=harga value='$r[harga]'></td>
			</tr>
		</table>
			
					<input class=input type=submit name=update value=Update>
					<input class=input type=button value=Batal onclick=self.history.back()>
</form>"; 
?>
</body>
</html>