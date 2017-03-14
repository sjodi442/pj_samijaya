<?php
  include "../koneksi.php";
  //fetch data dari form
  $sqlidp = mysqli_real_escape_string($konek, $_POST['no_kirim']);
  $sqladp = mysqli_real_escape_string($konek, $_POST['no_jual']);
  //fetch data inner
	$select="select transaksi_kirim.id_customer, transaksi_kirim.id_produk, kebijakan.harga, transaksi_kirim.jumlah from transaksi_kirim inner join kebijakan on transaksi_kirim.id_customer=kebijakan.id_customer and transaksi_kirim.id_produk=kebijakan.id_produk where transaksi_kirim.no_kirim='$sqlidp'";
  $query=mysqli_query($konek, $select);
  $tampil = mysqli_fetch_array ($query);
  //if kosong
  $select0="select transaksi_kirim.id_customer, transaksi_kirim.id_produk, produk.harga, transaksi_kirim.jumlah  from transaksi_kirim inner join customer on transaksi_kirim.id_customer=customer.id_customer inner join produk on transaksi_kirim.id_produk=produk.id_produk where transaksi_kirim.no_kirim='$sqlidp'";
  $query0=mysqli_query($konek, $select0);
  $tampil0=mysqli_fetch_array($query0);
  //fetch data nama_customer
  if (!empty($tampil['harga'])){
  $select1="select nama_customer from customer where id_customer='$tampil[id_customer]'";
  $query1=mysqli_query($konek, $select1);
  $tampil1 = mysqli_fetch_array($query1); }
  else {
    $select1="select nama_customer from customer where id_customer='$tampil0[id_customer]'";
    $query1=mysqli_query($konek, $select1);
    $tampil1 = mysqli_fetch_array($query1);
  }
  //fetch data nama_produk
  if (!empty($tampil['harga'])){
  $select2="select nama_produk from produk where id_produk='$tampil[id_produk]'";
  $query2=mysqli_query($konek, $select2);
  $tampil2 = mysqli_fetch_array($query2); }
  else {
    $select2="select nama_produk from produk where id_produk='$tampil0[id_produk]'";
    $query2=mysqli_query($konek, $select2);
    $tampil2 = mysqli_fetch_array($query2);
  }
  //Total
  if (!empty($tampil['harga'])){
  $a = $tampil['harga'] ; $b = $tampil['jumlah'];
  $total = $a*$b;}
  else {
    $a = $tampil0['harga'] ; $b = $tampil0['jumlah'];
    $total = $a*$b;
  }
  //submit
  if (!empty($tampil['harga'])){
    $select="select transaksi_kirim.id_customer, transaksi_kirim.id_produk, kebijakan.harga, transaksi_kirim.jumlah from transaksi_kirim inner join kebijakan on transaksi_kirim.id_customer=kebijakan.id_customer and transaksi_kirim.id_produk=kebijakan.id_produk where transaksi_kirim.no_kirim='$sqlidp'";
    $query=mysqli_query($konek, $select);
    while ($tampil = mysqli_fetch_array($query)){
      $select1="select nama_customer from customer where id_customer='$tampil[id_customer]'";
      $query1=mysqli_query($konek, $select1);
      $tampil1 = mysqli_fetch_array($query1);
      $select2="select nama_produk from produk where id_produk='$tampil[id_produk]'";
      $query2=mysqli_query($konek, $select2);
      $tampil2 = mysqli_fetch_array($query2);
      $a = $tampil['harga'] ; $b = $tampil['jumlah'];
      $total = $a*$b;
      $sql = "INSERT INTO transaksi_penjualan values(DEFAULT, '$sqladp', '$tampil[id_customer]', '$tampil[id_produk]', '$tampil[harga]', '$tampil[jumlah]', '$total', NOW())";
      $l = "UPDATE transaksi_kirim SET status='Lunas' WHERE no_kirim='$sqlidp'";
      if($lqs = mysqli_query($konek, $sql) && $lqs2 = mysqli_query($konek, $l)){
        echo "berhasil";
        header("Location: transaksi_jual/nota_jual.php");
      }
      else {
        echo "gagal";
      }
    }
  }
  else {
    $select0="select transaksi_kirim.id_customer, transaksi_kirim.id_produk, produk.harga, transaksi_kirim.jumlah  from transaksi_kirim inner join customer on transaksi_kirim.id_customer=customer.id_customer inner join produk on transaksi_kirim.id_produk=produk.id_produk where transaksi_kirim.no_kirim='$sqlidp'";
    $query0=mysqli_query($konek, $select0);
    while ($tampil0 = mysqli_fetch_array($query0)){
      $select1="select nama_customer from customer where id_customer='$tampil0[id_customer]'";
      $query1=mysqli_query($konek, $select1);
      $tampil1 = mysqli_fetch_array($query1);
      $select2="select nama_produk from produk where id_produk='$tampil0[id_produk]'";
      $query2=mysqli_query($konek, $select2);
      $tampil2 = mysqli_fetch_array($query2);
      $a = $tampil0['harga'] ; $b = $tampil0['jumlah'];
      $total = $a*$b;
      $sql = "INSERT INTO transaksi_penjualan values(DEFAULT, '$sqladp', '$tampil0[id_customer]', '$tampil0[id_produk]', '$tampil0[harga]', '$tampil0[jumlah]', '$total', NOW())";
      $l = "UPDATE transaksi_kirim SET status='Lunas' WHERE no_kirim='$sqlidp'";
      if(  $lqs = mysqli_query($konek, $sql) && $lqs2 = mysqli_query($konek, $l)){
          echo "berhasil";
          header("Location: transaksi_jual/nota_jual.php");
        }
        else {
          echo "gagal";
        }
    }
}
?>
