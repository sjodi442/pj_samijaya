<?php error_reporting (0);
session_start();
echo $_SESSION["level"];
?>

<?php
include "koneksi.php";
/*session_start();*/
if (empty($_SESSION['level'])){
header('location:home.php');}

?>

<html>
	<head>
		<link href="style.css" rel="stylesheet" type="text/css" />
		<style>
		</style>
		<script>
		</script>
		<title>PJ SAMIJAYA</title>
	</head>
	<body>
		<div id="wrap">
			<div id="header">
				<center>
				Sistem Penjualan</br>
				PJ Samijaya
				</center>
			</div>
			<div id="menu">
			<div id="menucss">
				<ul>
					<li><a href="home.php?page=content">Home</a></li>
					<li><a href="#">Master</a>
						<ul>
							<li style="display: <?php if ($_SESSION['level'] == 3) echo 'none'; else echo 'block'; ?>"><a href="<?php if($_SESSION['level'] == 3) echo 'home.php?page=denied'; else echo 'home.php?page=customer'; ?>">Data Customer</a></li>
							<li><a href="home.php?page=produk">Data Produk</a></li>
							<li style="display: <?php if ($_SESSION['level'] == 3 || $_SESSION['level'] == 2) echo 'none'; else echo 'block'; ?>"><a href="<?php if($_SESSION['level'] == 2 || $_SESSION['level'] == 3) echo 'home.php?page=denied'; else echo 'home.php?page=kebijakan'; ?>">Kebijakan Harga</a></li>
							<li style="display: <?php if ($_SESSION['level'] == 3 || $_SESSION['level'] == 2) echo 'none'; else echo 'block'; ?>"><a href="<?php if($_SESSION['level'] == 2 || $_SESSION['level'] == 3) echo 'home.php?page=denied'; else echo 'home.php?page=anggaran'; ?>">Anggaran</a></li>
						</ul>
					</li>
					<li style="display: <?php if ($_SESSION['level'] == 3) echo 'none'; else echo 'block'; ?>" id="dis"><a href="#">Transaksi</a>
							<ul>
								<li><a href="<?php if($_SESSION['level'] == 3) echo 'home.php?page=denied'; else echo 'home.php?page=kirim'; ?>">Pengiriman</a></li>
								<li style="display: <?php if ($_SESSION['level'] == 3 || $_SESSION['level'] == 2) echo 'none'; else echo 'block'; ?>"><a href="<?php if($_SESSION['level'] == 2 || $_SESSION['level'] == 3) echo 'home.php?page=denied'; else echo 'home.php?page=jual'; ?>">Penjualan</a></li>
							</ul>
					</li>
					<li style="display: <?php if ($_SESSION['level'] == 3 || $_SESSION['level'] == 2) echo 'none'; else echo 'block'; ?>"><a href="#">Jurnal Kas</a>
						<ul>
							<li><a  href="<?php if($_SESSION['level'] == 2 || $_SESSION['level'] == 3) echo 'home.php?page=denied'; else echo 'home.php?page=kas_masuk_b'; ?>">Kas Masuk</a></li>
							<li><a href="<?php if($_SESSION['level'] == 2 || $_SESSION['level'] == 3) echo 'home.php?page=denied'; else echo 'home.php?page=kas_keluar_b'; ?>">Kas keluar</a></li>
						</ul>
					</li>
					<li style="display: <?php if ($_SESSION['level'] == 3) echo 'none'; else echo 'block'; ?>"><a href="#">Jurnal Kas Kecil</a>
						<ul>
							<li><a href="<?php if($_SESSION['level'] == 3) echo 'home.php?page=denied'; else echo 'home.php?page=kas_masuk'; ?>">Kas Masuk</a></li>
							<li><a href="<?php if($_SESSION['level'] == 3) echo 'home.php?page=denied'; else echo 'home.php?page=kas_keluar'; ?>">Kas keluar</a></li>
						</ul>
					</li>
					<li> <a href="#">Laporan</a>
						<ul>
							<li style="display:<?php if($_SESSION['level'] == 2 )echo 'none'; else echo 'block'; ?>"><a href="produk/pdf.php">Lap. Produk</a></li>
							<li style="display:<?php if($_SESSION['level'] == 2 || $_SESSION['level'] == 3) echo 'none'; else echo 'block'; ?>"><a href="customer/pdf.php">Lap. Customer</a></li>
							<li style="display:<?php if($_SESSION['level'] == 2 || $_SESSION['level'] == 3) echo 'none'; else echo 'block'; ?>"><a href="kebijakan/pdf.php">Lap. Kebijakan Harga</a></li>
							<li style="display:<?php if($_SESSION['level'] == 2 || $_SESSION['level'] == 3) echo 'none'; else echo 'block'; ?>"><a href="anggaran/pdf.php">Lap. Anggaran</a></li>
							<li style="display:<?php if($_SESSION['level'] == 3 ) echo 'none'; else echo 'block'; ?>"><a href="transaksi_kirim/pdf.php">Lap. Pengiriman</a></li>
							<li style="display:<?php if($_SESSION['level'] == 3 || $_SESSION['level'] == 2) echo 'none'; else echo 'block'; ?>"><a href="transaksi_jual/pdf.php">Lap. Penjualan</a></li>
						</ul>
					</li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
			</div>

			<div id="content">
				<!-- <div id="page"> -->
					<?php
						$page=(isset($_GET['page']))?$_GET['page']:"main";
						switch($page){

						// CUSTOMER
						case 'content'						: include"access_denied.php";break;
						case 'customer'						:include"customer/index.php";break;
						case 'input_cust'					:include"customer/input.php";break;
						case 'edit_cust'					:include"customer/edit.php";break;
						case 'del_cust'						:include"customer/delete.php";break;
						case 'update_cust'					:include"customer/update.php";break;
						case 'insert_cust'					:include"customer/insert.php";break;
						case 'lap_cust'						:include"customer/pdf.php";break;

						// PRODUK
						case 'produk'						:include"produk/view.php";break;
						case 'input_produk'					:include"produk/input.php";break;
						case 'edit_produk'					:include"produk/edit.php";break;
						case 'del_produk'					:include"produk/delete.php";break;
						case 'update_produk'				:include"produk/update.php";break;
						case 'insert_produk'				:include"produk/insert.php";break;
						case 'lap_produk'					:include"produk/pdf.php";break;
						// UPDATE PRODUK
						case 'tambah_produk'				:include"update_produk/input.php";break;
						case 'insert_tambah_produk'			:include"update_produk/insert.php";break;


						// KEBIJAKAN HARGA
						case 'kebijakan'					:include"kebijakan/view.php";break;
						case 'input_kebijakan'				:include"kebijakan/form_kebijakan_harga.php";break;
						case 'edit_kebijakan'				:include"kebijakan/edit.php";break;
						case 'del_kebijakan'				:include"kebijakan/delete.php";break;
						case 'update_kebijakan'				:include"kebijakan/update.php";break;
						case 'insert_kebijakan'				:include"kebijakan/insert.php";break;
						case 'lap_kebijakan'				:include"kebijakan/pdf.php";break;
						case 'cari_kebijakan'				:include"kebijakan/view_cari.php";break;

						// ANGGARAN
						case 'anggaran'						:include"anggaran/index.php";break;
						case 'input_anggaran'				:include"anggaran/input_anggaran.php";break;
						case 'edit_anggaran'				:include"anggaran/edit.php";break;
						case 'del_anggaran'					:include"anggaran/delete.php";break;
						case 'update_anggaran'				:include"anggaran/update.php";break;
						case 'insert_anggaran'				:include"anggaran/insert.php";break;
						case 'lap_anggaran'					:include"anggaran/pdf.php";break;

						// PENGIRIMAN
						case 'kirim'						:include"transaksi_kirim/index.php";break;
						case 'insert_kirim'					:include"transaksi_kirim/insert.php";break;
						case 'view_kirim'					:include"transaksi_kirim/view.php";break;
						case 'tambah_beli'					:include"transaksi_kirim/form2.php";break;
						case 'nota_kirim'					:include"transaksi_kirim/view2.php";break;
						case 'insert_cetak_kirim'			:include"transaksi_kirim/insert2.php";break;
						case 'del_kirim'					:include"transaksi_kirim/hapus.php";break;
						case 'tampil_kirim'					:include"transaksi_kirim/tampil_data.php";break;
						case 'lap_kirim'					:include"transaksi_kirim/pdf.php";break;
						case 'cari_kirim'								: include"transaksi_kirim/view_kirim_cari.php";break;
						case 'val_kirim'					:include"transaksi_kirim/index.php"; echo "<script> window.onload = alert('account masih hutang') ;</script>";break;

						// PENJUALAN
						case 'jual'							:include"transaksi_jual/index.php";break;
						case 'view_jual'					:include"transaksi_jual/view.php";break;
						case 'insert_jual'					:include"transaksi_jual/input_jual.php";break;
						case 'data_jual'					:include"transaksi_jual/data_penjualan.php";break;
						case 'jual_per_customer'			:include"transaksi_jual/data_penjualan_per_customer.php";break;
						case 'cari_jual'					: include"transaksi_jual/view_jual_cari.php";break;
						case 'val_jual'							:include"transaksi_jual/index.php"; echo "<script> window.onload = alert('account sudah bayar') ;</script>";break;

						// JURNAL KAS
						case 'kas_masuk_b'					:include"jurnal_kas/kas_masuk.php";break;
						case 'kas_keluar_b'					:include"jurnal_kas/kas_keluar.php";break;
						case 'kas_masuk'					:include"jurnal_kas/kas_kecil_masuk.php";break;
						case 'kas_keluar'					:include"jurnal_kas/kas_kecil_keluar.php";break;
						// case 'edit_kas_masuk'				:include"jurnal_kas/edit_kas_kecil_masuk.php";break;
						// case 'edit_kas_keluar'				:include"jurnal_kas/edit_kas_kecil_keluar.php";break;
						case 'view_kas_kecil'				:include"jurnal_kas/view_kas_kecil.php";break;
						case 'view_kas'						:include"jurnal_kas/view_kas.php";break;

						// access
						case 'denied'            	:include"access_denied.php";break;

						}
					?>
			<!--	</div> -->

			<!--	<div id="sidebar">
					<div id="box1"><b><a href="#"><font color="white">LAPORAN</font></a></b></div>
						<div id="box2">
							<ul>
								<li style="display:<?php //if($_SESSION['level'] == 2 )echo 'none'; else echo 'block'; ?>"><a href="produk/pdf.php">Lap. Produk</a></li>
								<li style="display:<?php //if($_SESSION['level'] == 2 || $_SESSION['level'] == 3) echo 'none'; else echo 'block'; ?>"><a href="customer/pdf.php">Lap. Customer</a></li>
								<li style="display:<?php //if($_SESSION['level'] == 2 || $_SESSION['level'] == 3) echo 'none'; else echo 'block'; ?>"><a href="kebijakan/pdf.php">Lap. Kebijakan Harga</a></li>
								<li style="display:<?php //if($_SESSION['level'] == 2 || $_SESSION['level'] == 3) echo 'none'; else echo 'block'; ?>"><a href="anggaran/pdf.php">Lap. Anggaran</a></li>
								<li style="display:<?php //if($_SESSION['level'] == 3 ) echo 'none'; else echo 'block'; ?>"><a href="transaksi_kirim/pdf.php">Lap. Pengiriman</a></li>
								<li style="display:<?php //if($_SESSION['level'] == 3 || $_SESSION['level'] == 2) echo 'none'; else echo 'block'; ?>"><a href="transaksi_jual/pdf.php">Lap. Penjualan</a></li>
							</ul>
						</div>
				</div>
			</div> -->
		</div>

			<div id="footer">
					Copyright 2017 &copy; PJ. Samijaya. All Right Reserved
			</div>

		</div>
	</body>
</html>
