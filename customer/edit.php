<html>
<head><title></title></head>

<body>
<?php
include "../koneksi.php";
$sql = "select * from customer where id_customer='$_GET[id_customer]'";
$edit=mysqli_query($konek,$sql) or die (mysqli_error($konek));
$r = mysqli_fetch_array($edit);
echo "
<form method=post action=customer/update.php?id_customer=$r[id_customer]>
	<h2 align='center'><div><strong>Edit Customer</strong></div></h2>
		<table align='center'>
			<tr>
				<td>ID Customer</td>
				<td>: <input style=background-color:silver; readonly=true type=text name=id_customer value='$r[id_customer]'></td>
			</tr>
			<tr>
				<td>Nama Customer</td>
				<td>: <input type=text name=nama_customer value='$r[nama_customer]'>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>: <input type=text name=alamat value='$r[alamat]'>
				</td>
			</tr>
			<tr>
				<td>No. Telepon</td>
				<td>: <input type=text name=telp value='$r[telp]'>
				</td>
			</tr>
			<tr>
				<td colspan=2 align='center'>
					<input class=input type=submit name=update value=Update>
					<input class=input type=button value=Batal onclick=self.history.back()>
				</td>
			</tr>
		</table>
</form>";
?>
</body>
</html>
