<html>
<head>
<title> pembelian </title>


</head>
<body>
<?php include "../koneksi.php";
$edit=mysqli_query($konek,"select * from transaksi_kirim ORDER BY no_kirim
DESC LIMIT 1") or die (mysqli_error());
$r = mysqli_fetch_array($edit);
$a = $r['no_kirim'];
$a++;

?>
<h1 align="center">Input Data Pengiriman</h1>
<p><a href="home.php?page=tampil_kirim">Lihat Data Pengiriman</a></p>
<hr>
<center>
<form style="display: <?php if($_SESSION['level'] == 3) echo 'none'; else echo 'block'; ?>" method="POST" action="transaksi_kirim/insert.php">
	<table  align="center">
		<tr>
			<td> No.Pengiriman </td>
			<td>: <input type="text" readonly="true" name="no_kirim" placeholder="" value="<?php if (empty($r)) echo "TKB00000000".$a; else echo $a; ?>"> </td>
		</tr>

				<tr>
			<td> Nama Customer </td>
			<td>:
				<select name="id_customer">
				<?php
					include "../koneksi.php";
						$a="SELECT * from customer";
						$query1=mysqli_query($konek,$a);
						while ($kat=mysqli_fetch_array($query1))
						{
						?>
						<option value="<?php echo $kat['id_customer']; ?>"><?php echo $kat['nama_customer']; ?> </option>
						<?php
						}
						?>
				</select>
			</td>
		</tr>

			<tr>
			<td> Nama produk </td>
			<td>:
				<select name="id_produk">
				<?php
					include "../koneksi.php";
						$a="select * from produk";
						$query1=mysqli_query($konek,$a);
						while ($kat=mysqli_fetch_array($query1))
						{
						?>
						<option value="<?php echo $kat['id_produk'];?>"><?php echo $kat['nama_produk']; ?> </option>
						<?php
						}
						?>
				</select>
			</td>
		</tr>

		<tr>
			<td> Jumlah </td>
			<td>: <input type="text" name="jumlah"></td>
		</tr>
		<tr>
			<td>Tempo Pembayaran</td>
			<td>: <input type="date" name="tempo" required></td>
		</tr>
		<tr>
			<td></td>
			<td> <br /><input type="submit" name="submit" value="Simpan"> <br /><br /> <input type="button" value="Batal" onclick="self.history.back()"></td>
		</tr>
	</table>
</form>
</center>
</body>
</html>
