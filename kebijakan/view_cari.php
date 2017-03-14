<html>
<head>
</head>
<body>
<?php include "../koneksi.php" ?>
<h2 align="center">Daftar Kebijakan Harga</h2>
<?php
if (isset($_POST['cus'])){
  $gett = mysqli_real_escape_string($konek, $_POST['customer']);
	$select="select kebijakan.id_kebijakan,customer.nama_customer,produk.nama_produk,kebijakan.harga from kebijakan inner join customer on kebijakan.id_customer=customer.id_customer inner join
produk on kebijakan.id_produk=produk.id_produk WHERE customer.nama_customer = '$gett' order by customer.nama_customer asc";
}
elseif (isset($_POST['prod'])) {
  $gett = mysqli_real_escape_string($konek, $_POST['produk']);
  $select="select kebijakan.id_kebijakan,customer.nama_customer,produk.nama_produk,kebijakan.harga from kebijakan inner join customer on kebijakan.id_customer=customer.id_customer inner join
produk on kebijakan.id_produk=produk.id_produk WHERE produk.nama_produk = '$gett' order by produk.nama_produk asc";
}
elseif (isset($_POST['cusprod'])) {
  $gett = mysqli_real_escape_string($konek, $_POST['cs']);
  $gett0 = mysqli_real_escape_string($konek, $_POST['pr']);
  $select="select kebijakan.id_kebijakan,customer.nama_customer,produk.nama_produk,kebijakan.harga from kebijakan inner join customer on kebijakan.id_customer=customer.id_customer inner join
produk on kebijakan.id_produk=produk.id_produk WHERE customer.nama_customer = '$gett' and produk.nama_produk = '$gett0' order by customer.nama_customer asc";
}
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
