<html>
<head>
<title> form 6 </title>


</head>
<body>
<?php include "../koneksi.php";
$edit=mysqli_query($konek,"select * from transaksi_kirim ORDER BY no_kirim
DESC LIMIT 1") or die (mysqli_error());
$r = mysqli_fetch_array($edit);
$a = $r['no_kirim'];
$a++;

?>
<center>
<form method="POST" action="transaksi_kirim/insert.php">
	<b>INPUT NOTA PENGGIRIMAN</b>
	<table  align="center">
		<tr>
			<td> No.Penggiriman </td>
			<td>: <input type="text" readonly="true" name="no_kirim" placeholder="" value="<?php if (empty($r)) echo "TKB00000000".$a; else echo $a; ?>"> </td>
		</tr>

				<tr>
			<td> Nama Customer </td>
			<td>:
				<select name="id_customer">
				<?php
					include "../koneksi.php";
						$a="SELECT * from temp";
						$query1=mysqli_query($konek,$a);
						$o = mysqli_fetch_array($query1);
						$f = "select * from customer where id_customer='$o[id_customer]'";
						$as = mysqli_query($konek, $f);
						$kat=mysqli_fetch_array($as);
						echo $kat['id_customer'];
						?>
						<option value="<?php echo $kat['id_customer']; ?>"><?php echo $kat['nama_customer']; ?> </option>
						<?php

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
		<tr hidden="true">
			<td> Tempo</td>
			<?php $sel = "select * from temp order by no_kirim DESC LIMIT 1";
			$q = mysqli_query($konek, $sel);
			$fj = mysqli_fetch_array($q); ?>
			<td>: <input type="date" name="tempo" value="<?php echo $fj['tempo']; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Simpan"> <input type="button" value="Batal" onclick="self.history.back()"></td>
		</tr>
	</table>
</form>
</center>
</body>
</html>
