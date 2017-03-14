<html>
<head>
</head>
<body>
<?php include "../koneksi.php" ?>
<h2 align="center">Data Transaksi Pengiriman</h2>
<p><a href="home.php?page=kirim">Input Transaksi Pengiriman</a></p>
<?php
	$query = "select * from transaksi_kirim order by no_kirim DESC LIMIT 1";
  	$as = mysqli_query($konek, $query);
 	$data = mysqli_fetch_array($as);
 	$query1 = "select nama_customer from customer where id_customer='$data[id_customer]'";
  	$as1 = mysqli_query($konek, $query1);
  	$data1 = mysqli_fetch_array($as1);
  	$query2 = "select nama_produk from produk where id_produk='$data[id_produk]'";
  	$as2 = mysqli_query($konek, $query2);
  	$data2 = mysqli_fetch_array($as2);
?>
<!-- pilihan serach -->
<form method="post" action="home.php?page=cari_kirim">
	cari: <select name="select" onchange="showDiv(this)">
	<option value="" disabled selected>Select your option</option>
	<option value="1">tanggal</option>
	<option value="2">no_pengiriman</option>
	</select>

<!-- script -->
<script>
function showDiv(xxx){
 		if(xxx.value == 1){
			document.getElementById('tanggal').style.display = "block";
			document.getElementById('no').style.display = "none";
			document.getElementById('tgl').name = "tgl";
		}
		else if(xxx.value == 2){
			document.getElementById('tanggal').style.display = "none";
			document.getElementById('no').style.display = "block";
			document.getElementById('tgl').name = "no";
		}
	}
</script>
<!-- form search -->
	<div id="tanggal" style="display: none;">
		tanggal mulai: <input type="date" name="tgl1"><br>
		tanggal akhir:<input type="date" name="tgl2"><br>
		<input type="submit" id="tgl" name="tgl"><br>
	</div>
	<div id="no" style="display: none;">
		cari no_kirim : <input type="text" name="no_kirim"><br>
		<input type="submit" name="no"><br>
	</div>
	</form>
	<!-- table -->
<table border=2 align='center'>
		<thead>
		<tr>
		<th>No. Pengiriman</th><th>Tanggal</th><th>Nama Customer</th><th>Nama Produk</th><th>Jumlah</th><th>tempo</th><th>status</th><th colspan="2">Action</th>
		</tr>
		</thead>
	</center>
<?php
	  $query5 = "select * from transaksi_kirim order by no_kirim DESC LIMIT 1";
      $xxx = mysqli_query($konek, $query5);
      $xxes = mysqli_fetch_array($xxx);
      $query = "select * from transaksi_kirim";
      $as = mysqli_query($konek, $query);
      while ($data = mysqli_fetch_array($as)){
        $query1 = "select nama_customer from customer where id_customer='$data[id_customer]'";
        $as1 = mysqli_query($konek, $query1);
        $data1 = mysqli_fetch_array($as1);
        $query2 = "select nama_produk from produk where id_produk='$data[id_produk]'";
        $as2 = mysqli_query($konek, $query2);
        $data2 = mysqli_fetch_array($as2);
	echo "
		<tr>
			<td>$data[no_kirim]</td>
			<td>$data[tgl_kirim]</td>
			<td>$data1[nama_customer]</td>
			<td>$data2[nama_produk]</td>
			<td>$data[jumlah]</td>
			<td>$data[tempo]</td>
			<td>$data[status]</td>
		";
?>
			<td><a href=edit.php?id=<?php echo $data['id'] ?> > Edit </a></td>
			<td><a href=delete.php?id=<?php echo $data['id'] ?> onClick="return confirm('Apakah Anda Yakin Hapus Data?')" > Hapus </a></td>
		</tr>
<?php
}
?>
</table>
