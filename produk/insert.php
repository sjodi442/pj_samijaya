<?php
include "../koneksi.php";
$query = "INSERT into produk (id_produk,nama_produk,harga,stok) VALUES('$_POST[id_produk]','$_POST[nama_produk]','$_POST[harga]','$_POST[stok]')";
if (mysqli_query($konek, $query)){
	$quer = "select * from customer";
	$sql0 = mysqli_query($konek, $quer);
	while ($k = mysqli_fetch_array($sql0)){
		$sqla = "select * from kebijakan ORDER BY id_kebijakan DESC LIMIT 1";
		$edit=mysqli_query($konek,$sqla) or die (mysqli_error());
		$r = mysqli_fetch_array($edit);
		$a = $r['id_kebijakan'];
		$a++;
		if(empty($r))
			$isi="K00".$a;
		else
			$isi=$a;
		$ni = "INSERT into kebijakan (id_kebijakan,id_customer,id_produk,harga) VALUES('$isi','$k[id_customer]','$_POST[id_produk]','$_POST[harga]')";
		if (mysqli_query($konek, $ni)){
			header ('Location:../home.php?page=produk');
		}
		else{

		}
	}
}
else{

}
?>
