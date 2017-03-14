<html>
<head>
</head>
<body>
<form method="POST" action="kebijakan/insert.php">
<h1 align="center">Input Data Kebijakan Harga</h1>
<table align="center">
<tr>
	<td>Nama Customer</td>
	<td>: <select type="text" name="nama_customer">
		<?php
			include "../koneksi.php";
			$select="select from * customer";
			$query1 = mysqli_query($konek,'select * from customer');
			while ($kat = mysqli_fetch_array($query1))
			{
		?>
			<option value="<?php echo $kat['id_customer']; ?> "><?php echo $kat['nama_customer'];?></option>
		<?php
			}
		?>
		</select>
	</td>
</tr>
<tr>
	<td>Nama Barang</td>
	<td>: <select type="text" name="nama_produk">
		<?php
			include "../koneksi.php";
			$select="select from * produk";
			$query1 = mysqli_query($konek,'select * from produk');
			while ($kat = mysqli_fetch_array($query1))
			{
		?>
			<option value="<?php echo $kat['id_produk']; ?>"> <?php echo $kat['nama_produk'];?></option>
		<?php
			}
		?>
		</select>
	</td>
</tr>
<tr>
	<td>Harga</td>
	<td>: <input name="harga" type="text"></td>
</tr>
<tr>
	<td colspan="2" align="center"><input class="input" type="submit" name="submit" value="Simpan"> <input type="button" value="Batal" onclick="self.history.back()"</td>
</tr>
</table>
</form>
</body>
</html>
