<html>
<head>
</head>
<body>
<h1 align="center">Update Stok Produk<h1>
  <form method="POST" action="update_produk/insert.php">
  <table align="center">	
 	<tr>
 		<td>Nama Produk</td>
    	<td>: <select type="text" name="nama_produk">
 			<?php
				include "../koneksi.php";
				$query1=mysqli_query($konek,'select * from produk');
				while ($kat=mysqli_fetch_array($query1))
				{
			?>
				<option><?php echo $kat['nama_produk']; ?> </option>
			<?php
				}
			?>
			</select>
		</td>
	</tr>
	
 	<tr>
 		<td>Jumlah</td>
 		<td>: <input type="text" id="lname" name="stok"></td>
 	</tr>
 	<tr>
 		<td colspan="2" align="center"><input class="input" type="submit" name="submit" value="submit"> <input type="button" value="Batal" onclick="self.history.back()"></td>
 	</tr>
</table>	
</form>
</body>
</html>
