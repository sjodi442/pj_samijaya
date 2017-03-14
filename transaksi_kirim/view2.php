<html>
<head>
	<!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css" media="print">
    @page
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
</style>
<style>
#wrapper{
  width : 500px;
  margin: 0 auto;
  overflow: hidden;
}
</style>
</head>
<body>
<div>
	<div id="wrapper">
		<div class="row" style="background-color:#ff403b;color:#ffffff;padding:20px;font-family:verdana">
<?php include "../koneksi.php"; ?>

<h1 align="center">Nota Pengiriman</h1>
</div>
<div class="row" style="padding:20px;font-family:verdana">
<?php
	$select="select * from transaksi_kirim ORDER BY no_kirim DESC LIMIT 1";
	$query=mysqli_query($konek,$select);
	$a= mysqli_fetch_array($query);
	$e="select * from customer where id_customer='$a[id_customer]'";
	$b= mysqli_query($konek,$e);
	$f=mysqli_fetch_array($b);

?>
<table width="100%">
<tr><td> Nomor Pengiriman: <input class="form-control" style="max-width:200px" type="text" value=" <?php echo $a['no_kirim']; ?>" readonly></td>
<td align="right">Tanggal : <?php $tgl=date('d-m-Y'); echo $tgl; ?></td>
<tr><td>Nama Customer: <input class="form-control" style="max-width:200px" type="text" value=" <?php echo $f['nama_customer']; ?>" readonly><br>
</td></tr>
<tr><td>Tempo: <input class="form-control" style="max-width:200px" type="text" value=" <?php echo $a['tempo']; ?>" readonly></td></tr></table>

<table class="table table-striped" border="0.5" align="center">
		<thead>
			<tr>
				<th>NAMA PRODUK</th><th>JUMLAH</th>
			</tr>
		</thead>

<?php
	$m="select * from transaksi_kirim ORDER BY no_kirim DESC LIMIT 1";
	$g= mysqli_query($konek,$m);
	$l=mysqli_fetch_array($g);
	$e="SELECT transaksi_kirim.no_kirim,transaksi_kirim.jumlah,produk.nama_produk from transaksi_kirim inner join produk on transaksi_kirim.id_produk = produk.id_produk where transaksi_kirim.no_kirim='$l[no_kirim]'";
	$b= mysqli_query($konek,$e);
	while($tampil = mysqli_fetch_array($b)){
	echo "
		<tr>
			<td>$tampil[nama_produk]</td>
			<td>$tampil[jumlah]</td>";
?>


		</tr>


		<?php
}

?>
<td>

</td>
		</table>
		<script>
		window.print();
		</script>
</div>
</body>
</html>
