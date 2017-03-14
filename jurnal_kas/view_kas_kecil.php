<?php include "../koneksi.php" ?>
<h2 align="center">Data Jurnal Kas Kecil</h2>
<table align='center' border=1>
	<tr>
		<th>No Transaksi</th><th width="100">Tanggal Transaksi</th><th>Keterangan</th><th>Debet</th><th>Kredit</th>
	</tr>
			<?php
			
			$tot_debet=0;
			$tot_kredit=0;
			
			$select="select * from jurnal_kas_kecil";
			$query=mysqli_query($konek,$select);
			if($query === FALSE){
				die(mysqli_error($konek));
			}
			while($row=mysqli_fetch_array($query)){
				$debet=$row['debet'];
				$kredit=$row['kredit'];
				
				$tot_debet=$tot_debet+$debet;
				$tot_kredit=$tot_kredit+$kredit;
				
				
				?>
				<tr>
					<td><?php echo $row['no_jurnal'];?></td>
					<td><?php echo $row['tgl'];?></td>
					<td><?php echo $row['keterangan'];?></td>
					<td align="right">Rp. <?php echo number_format($debet,0,'.',','); ?></td>
					<td align="right">Rp. <?php echo number_format($kredit,0,'.',','); ?></td>
				</tr>
				<?php
			}
			?>
			<tr>
				<td colspan="3" align="center"><b>TOTAL TRANSAKSI</b></td>
				<td align="right">Rp. <?php if(!empty($tot_debet)){ echo number_format($tot_debet,0,'.',','); } ?></td>
				<td align="right">Rp. <?php if(!empty($tot_kredit)){ echo number_format($tot_kredit,0,'.',','); } ?></td>
			</tr>
			<?php
				$saldo=$tot_debet-$tot_kredit;
			?>
			<tr>
				<td colspan="3" align="center"><b>SALDO</b></td>
				<td colspan="2" align="center"><b>Rp. <?php if (!empty($saldo)){ echo number_format($saldo,0,'.',','); } ?></b></td>
			</tr>
</table>