<?php
include "../koneksi.php";
$sql = "select * from produk where id_produk='$_GET[id_produk]'";
$edit= mysqli_query($konek,$sql) or die (mysqli_error());
$r = mysqli_fetch_array($edit);
echo "
<form method=POST action=produk/update.php?id_produk=$r[id_produk]>
	<h2><div align=center><strong>Edit Produk</strong></div></h2>
		<table border=0 align=center>
			<tr>
				<td>ID Produk</td>
				<td>: <input type=text name=id_produk value='$r[id_produk]' readonly></td>
			</tr>
			<tr>
				<td>Nama Produk</td>
				<td>: <input type=text name=nama_produk value='$r[nama_produk]'ro></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>: <input type=text name=harga value='$r[harga]'></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td>: <input type=text name=stok value='$r[stok]'></td>
			</tr>
		<tr>
				<td colspan=2 align=center>
					<input class=input type=submit name=update value=Update>
					<input class=input type=button value=Batal onclick=self.history.back()>
				</td>
		</tr>
		</table>
</form>"; 

?>
