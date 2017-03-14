<?php include "../koneksi.php"; 
ini_set('error_reporting', E_ALL|E_STRICT);
ini_set('display_errors', 1);
?>
<?php
$no_jurnal=$_POST['no_jurnal'];
$tanggal=$_POST['tanggal'];
$keterangan=$_POST['keterangan'];
				
$posisi=$_POST['posisi'];
$jumlah_dk=ucwords($_POST['jumlah']);
				
if($posisi=='debet'){
	$dk='debet';
	}else{
	$dk='kredit';
	}
				
$query=mysqli_query($konek, "insert into jurnal_kas(no_jurnal,keterangan,tgl,".$dk.")
	values('$no_jurnal','$keterangan','$tanggal','$jumlah_dk')");
									
	if($query){
		echo "berhasil";
	}else{
	echo mysqli_error($konek);
	}
header('Location:../home.php?page=view_kas');
?>