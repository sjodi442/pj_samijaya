<html>
<head>
</head>
<body>
	<h2 align="center"> Cari Data Kebijakan</h2>
	<form method="post" action="home.php?page=cari_kebijakan">
		cari: <select name="select" onchange="showDiv(this)">
		<option value="" disabled selected>Select your option</option>
		<option value="1">Nama</option>
		<option value="2">Produk</option>
		<option value="3">Nama & Produk</option>
		</select>
	<!-- script -->
	<script>
	function showDiv(xxx){
	 		if(xxx.value == 1){
				document.getElementById('customer').style.display = "block";
				document.getElementById('Produk').style.display = "none";
				document.getElementById('np').style.display = "none";
				document.getElementById('sub').name = "cus";
			}
			else if(xxx.value == 2){
				document.getElementById('customer').style.display = "none";
				document.getElementById('Produk').style.display = "block";
				document.getElementById('np').style.display = "none";
				document.getElementById('sub').name = "prod";
			}
			else if(xxx.value == 3){
				document.getElementById('customer').style.display = "none";
				document.getElementById('Produk').style.display = "none";
				document.getElementById('np').style.display = "block";
				document.getElementById('sub').name = "cusprod";
			}
		}
		</script>
		<div id="customer" style="display: none">
			<?php
			$my = "select * from customer";
			$querymy = mysqli_query($konek, $my);
			?>
			Customer: <select name="customer">
				<option disabled selected>select yout option</option>
				<?php
				while ($qq = mysqli_fetch_array($querymy)){
					echo "<option>$qq[nama_customer]</option>";
				}
				?>
			</select><br>
		</div>
		<div id="Produk" style="display: none">
				<?php
				$my = "select * from produk";
				$querymy = mysqli_query($konek, $my);
				?>
				Produk: <select name="produk">
					<option disabled selected>select yout option</option>
					<?php
					while ($qq = mysqli_fetch_array($querymy)){
						echo "<option>$qq[nama_produk]</option>";
					}
					?>
				</select><br>
		</div>
		<div id="np" style="display: none">
			<?php
			$my = "select * from customer";
			$querymy = mysqli_query($konek, $my);
			?>
			Customer: <select name="cs">
				<option disabled selected>select yout option</option>
				<?php
				while ($qq = mysqli_fetch_array($querymy)){
					echo "<option>$qq[nama_customer]</option>";
				}
				?>
			</select><br>
			<?php
			$my = "select * from produk";
			$querymy = mysqli_query($konek, $my);
			?>
			Produk: <select name="pr">
				<option disabled selected>select yout option</option>
				<?php
				while ($qq = mysqli_fetch_array($querymy)){
					echo "<option>$qq[nama_produk]</option>";
				}
				?>
			</select><br>
		</div>
		<input type="submit" id="sub" name="cus">
	</form>
<?php include "../koneksi.php" ?>
<h2 align="center">Daftar Kebijakan Harga</h2>
<?php
	$select="select kebijakan.id_kebijakan,customer.nama_customer,produk.nama_produk,kebijakan.harga from kebijakan inner join customer on kebijakan.id_customer=customer.id_customer inner join
produk on kebijakan.id_produk=produk.id_produk order by customer.nama_customer asc";
	$query=mysqli_query($konek,$select); ?>

<p><a href="home.php?page=input_kebijakan">Tambah Data</a></p>

<table border=2 align='center'>
		<thead>
		<tr>
		<th>ID</th><th>Nama Customer</th><th>Nama Produk</th><th>Harga</th><th colspan="2">Action</th>
		</tr>
		</thead>
	</center>
<?php
	while($tampil = mysqli_fetch_array ($query)){
	echo "
		<tr>
			<td>$tampil[id_kebijakan]</td>
			<td>$tampil[nama_customer]</td>
			<td>$tampil[nama_produk]</td>";
?>
			<td>Rp. <?php if(!empty($tampil[harga])){ echo number_format($tampil[harga],0,'.',','); } ?></td>
			<td><a href=home.php?page=edit_kebijakan&id_kebijakan=<?php echo $tampil['id_kebijakan'] ?> > Edit </a></td>
			<td><a href=home.php?page=del_kebijakan&id_kebijakan=<?php echo $tampil['id_kebijakan'] ?> onClick="return confirm('Apakah Anda Yakin Hapus Data?')" > Hapus </a></td>
		</tr>
<?php
}
?>
</table>
