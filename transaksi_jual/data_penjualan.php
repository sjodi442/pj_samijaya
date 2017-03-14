<html>
<head>
</head>
<body>
<?php include "../koneksi.php" ?>
<h2 align="center">Data Transaksi Penjualan</h2>
<?php
	$query = "select * from transaksi_penjualan order by no_penjualan DESC LIMIT 1";
  	$as = mysqli_query($konek, $query);
 	$data = mysqli_fetch_array($as);
 	$query1 = "select nama_customer from customer where id_customer='$data[id_customer]'";
  	$as1 = mysqli_query($konek, $query1);
  	$data1 = mysqli_fetch_array($as1);
  	$query2 = "select nama_produk from produk where id_produk='$data[id_produk]'";
  	$as2 = mysqli_query($konek, $query2);
  	$data2 = mysqli_fetch_array($as2);
?>
<!-- cari -->
<form method="post" action="home.php?page=cari_jual">
	cari: <select name="select" onchange="showDiv(this)">
	<option value="" disabled selected>Select your option</option>
	<option value="1">tanggal</option>
	<option value="2">no_pengiriman</option>
	<option value="3">nama_customer</option>
	</select>
<!-- script -->
<script>
function showDiv(xxx){
 		if(xxx.value == 1){
			document.getElementById('tanggal').style.display = "block";
			document.getElementById('no').style.display = "none";
			document.getElementById('nama').style.display = "none";
			document.getElementById('tgl').name = "tgl";
		}
		else if(xxx.value == 2){
			document.getElementById('tanggal').style.display = "none";
			document.getElementById('no').style.display = "block";
			document.getElementById('nama').style.display = "none";
			document.getElementById('tgl').name = "no";
		}
		else if(xxx.value == 3){
			document.getElementById('tanggal').style.display = "none";
			document.getElementById('no').style.display = "none";
			document.getElementById('nama').style.display = "block";
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
	<div id="nama" style="display: none">
		<form method="POST" action="home.php?page=jual_per_customer">
		Nama Customer: <select type="text" name="nama_customer">
			<?php
			$select="select from * customer";
			$query9 = mysqli_query($konek,'select * from customer');
			while ($kat = mysqli_fetch_array($query9))
			{
		?>
			<option value="<?php echo $kat['id_customer']; ?> "><?php echo $kat['nama_customer'];?></option>
		<?php
			}
		?>
		</select>
		<input type="submit" name="cari" value="Cari">
	</form>
	</div>

<table border=2 align='center'>
		<thead>
		<tr>
		<th>No. Penjualan</th><th>Tanggal</th><th>Nama Customer</th><th>Nama Produk</th><th>Harga</th><th>Jumlah</th><th>Total</th>
		</tr>
		</thead>
	</center>
<?php
	  $query5 = "select * from transaksi_penjualan order by no_penjualan DESC LIMIT 1";
      $xxx = mysqli_query($konek, $query5);
      $xxes = mysqli_fetch_array($xxx);
      $query = "select * from transaksi_penjualan";
      $as = mysqli_query($konek, $query);
      $tot_harga=0;
      while ($data = mysqli_fetch_array($as)){
        $query1 = "select nama_customer from customer where id_customer='$data[id_customer]'";
        $as1 = mysqli_query($konek, $query1);
        $data1 = mysqli_fetch_array($as1);
        $query2 = "select nama_produk from produk where id_produk='$data[id_produk]'";
        $as2 = mysqli_query($konek, $query2);
        $data2 = mysqli_fetch_array($as2);
	echo "
		<tr>
			<td>$data[no_penjualan]</td>
			<td>$data[tgl_trans_jual]</td>
			<td>$data1[nama_customer]</td>
			<td>$data2[nama_produk]</td>";
	?>
			<td>Rp. <?php if(!empty($data[harga])){ echo number_format($data[harga],0,'.',','); } ?></td>
			<td align="center"><?php echo " $data[jumlah]"; ?></td>
			<td>Rp. <?php if(!empty($data[total])){ echo number_format($data[total],0,'.',','); } ?></td>
		<?php
			$tot_harga+=$data['total'];
		?>
		</tr>
<?php
}
?>
		<tr>
			<td colspan="6" align="center"><b>Total Penjualan</b></td>
			<td>Rp. <?php if(!empty($tot_harga)){ echo number_format($tot_harga,0,'.',','); } ?></td>
		</tr>
</table>
