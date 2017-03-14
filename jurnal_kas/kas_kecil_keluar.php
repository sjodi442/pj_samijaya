<?php include "../koneksi.php";
$edit=mysqli_query($konek,"select * from jurnal_kas_kecil ORDER BY no_jurnal
DESC LIMIT 1") or die (mysqli_error($konek));
$r = mysqli_fetch_array($edit);
$a = $r['no_jurnal'];
$a++;
?>
<h2 align='center'>Input Jurnal Kas Kecil Keluar</h2>
<p><a href="home.php?page=view_kas_kecil">Lihat Data Jurnal Kas Kecil</a></p>
<form method=POST action=jurnal_kas/insert_kas_kecil.php>
	<table align='center'>
		<tr>
			<td>No. Transaksi</td>
			<td> : <input type="text" name="no_jurnal" readonly="true" value="<?php if (empty($r)) echo "JKK00".$a; else echo $a; ?>"></td>
		</tr>
		<tr>
			<td>Tanggal Transaksi</td>
			<td> : <input type=date name='tanggal' value="<?php echo date("Y-m-d") ?>" required ></td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td> : <input type=text name='keterangan' size="45" required></td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td> : <input type=text name='jumlah' required></td>
		</tr>
		<tr>
			<td>Posisi</td>
                <td> :
					<select name="posisi">
						<option value="kredit">Kredit</option>
					</select>
				</td>
		</tr>
		<tr>
			<td colspan=2 align=center>
				<input class=input type=submit value=Simpan>
				<input class=input type=button value=Batal onclick=self.history.back()>
			</td>
		</tr>
	</table>
</form>
