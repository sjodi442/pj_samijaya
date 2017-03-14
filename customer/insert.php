<?php
include'../koneksi.php';
$query = "INSERT into customer VALUES ( '$_POST[id_customer]', '$_POST[nama_customer]', '$_POST[alamat]', '$_POST[telp]')";
if (mysqli_query($konek, $query)){
	$quer = "Select * from produk";
	$sql = mysqli_query($konek, $quer);
	while ($k = mysqli_fetch_array($sql)){
		$sqla = "select * from kebijakan ORDER BY id_kebijakan DESC LIMIT 1";
		$edit=mysqli_query($konek,$sqla) or die (mysqli_error());
		$r = mysqli_fetch_array($edit);
		$a = $r['id_kebijakan'];
		$a++;
		if(empty($r))
			$isi="K00".$a;
		else
			$isi=$a;
		$ni = "INSERT into kebijakan (id_kebijakan,id_customer,id_produk,harga) VALUES('$isi','$_POST[id_customer]','$k[id_produk]','$k[harga]')";
		if (mysqli_query($konek, $ni)){
			echo "berhasil";
			header("Location:../home.php?page=customer");
		}
		else{
			echo "gagal";
		}
	}
}
else{

}

?>
