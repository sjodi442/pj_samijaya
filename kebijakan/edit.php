<?php
include "../koneksi.php";
$sql = "select * from kebijakan where id_kebijakan ='$_GET[id_kebijakan]'";
$edit= mysqli_query($konek,$sql) or die (mysqli_error());
$r = mysqli_fetch_array($edit);
echo "
<h1 align='center'>Edit Kebijakan Harga</h1>
<form method=post action=kebijakan/update.php?id_kebijakan=$r[id_kebijakan]>
<table align='center'>
<tr>
	<td>ID</td>
	<td>: <input name=id_kebijakan type=text readonly value='$r[id_kebijakan]'></td>
</tr>	
<tr>
	<td>Nama Customer</td>
	<td>: <select type=text name=nama_customer>";
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
	<td>: <select type=text name=nama_produk>
			<?php
			$select="select from * produk";
			$query1 = mysqli_query($konek,'select * from produk');
			while ($kat = mysqli_fetch_array($query1))
			{
			?>
			<option value="<?php echo $kat['id_produk']; ?>"> <?php echo $kat['nama_produk'];?></option>
			<?php
			}
			echo"
		</select>
	</td>
</tr>
<tr>
	<td>Harga</td>
	<td>: <input name=harga type=text value='$r[harga]'></td>
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