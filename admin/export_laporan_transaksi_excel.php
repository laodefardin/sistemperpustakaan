
<?php
if (isset($_POST['submit']))
{?>

 <?php

	include "function.php";

	include "../koneksi.php";


	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan_peminjamanbuku(".date('d-m-Y').").xls");
	
	$bln = $_POST['bln'] ;
	$thn = $_POST['thn'] ;

?>	

<body>
<center>
<h2>Laporan Transaksi Peminjaman Buku Bulan <?php echo $bln;?> Tahun <?php echo $thn;?></h2>
</center>
<table border="1">
	<tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Nis</th>
                                            <th>Nama Peminjam</th>
											<th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
											
											<th>Terlambat</th>
											
											<th>Status</th>
	</tr>
	
	<?php
		$no = 1;
		$sql = $koneksi->query("select * from tb_transaksi where status='Pinjam' and MONTH(tanggal_pinjam) = '$bln' and YEAR(tanggal_pinjam) = '$thn'");
			while ($data = $sql->fetch_assoc()) {
									
	
	
	?>
	

						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['judul']; ?></td>
							<td><?php echo $data['nis']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['tanggal_pinjam']; ?></td>
							<td><?php echo $data['tanggal_kembali']; ?></td>
							<td>
								<?php 
								
								$denda = 1000;
								$tanggal_dateline2 = $data['tanggal_kembali'];
								$tanggal_kembali = date('d-m-Y');
								
								$lambat = terlambat($tanggal_dateline2, $tanggal_kembali);
								$denda1 = $lambat * $denda;
								
								if ($lambat>0) {
									echo "
									
									<font color='red'>$lambat hari<br>(Rp $denda1)</font>
									";
								}else{
									echo $lambat." Hari";
								}
								
								?>
							</td>
							<td><?php echo $data['status']; ?></td>
					
							</tr>
	
	<?php
	
	}
	
	?>
	
	</table>
	</body>
	<?php }?>
	
	<?php
	$koneksi = new mysqli("localhost","root","","db_perpustakaan");

	include "../../function.php";

	$bln = $_POST['bln'] ;
	$thn = $_POST['thn'] ;
	?>
	
	<?php
	if ($bln == 'all') {
		?>
	<div class="table-responsive">
							
                                <table  class="display table table-bordered" id="transaksi">
								
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Nis</th>
                                            <th>Nama Peminjam</th>
											<th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
											<th>Terlambat</th>
											
											<th>Status</th>
											
                                        </tr>
                                    </thead>
		<tbody>
									
		
		<?php
		$no = 1;
		$sql = $koneksi->query("select * from tb_transaksi where status='Pinjam' and YEAR(tanggal_pinjam) = '$thn'");
		while ($data = $sql->fetch_assoc()) {
									
		?>
	
						
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['judul']; ?></td>
							<td><?php echo $data['nis']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['tanggal_pinjam']; ?></td>
							<td><?php echo $data['tanggal_kembali']; ?></td>
							<td>
								<?php 
								
								$denda = 1000;
								$tanggal_dateline2 = $data['tanggal_kembali'];
								$tanggal_kembali = date('d-m-Y');
								
								$lambat = terlambat($tanggal_dateline2, $tanggal_kembali);
								$denda1 = $lambat * $denda;
								
								if ($lambat>0) {
									echo "
									
									<font color='red'>$lambat hari<br>(Rp $denda1)</font>
									";
								}else{
									echo $lambat." Hari";
								}
								
								?>
								
							</td>
							<td><?php echo $data['status']; ?></td>
					
							
							
							
						</td>
						</tr>
						<?php 
						}
						?>

					</tbody>
                    </table>
					</div>
					
					
					<?php
					}
					else{ ?>
						<div class="table-responsive">
							
                                <table  class="display table table-bordered" id="transaksi">
								
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Nis</th>
                                            <th>Nama Peminjam</th>
											<th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
											<th>Terlambat</th>
											
											<th>Status</th>
											
                                        </tr>
                                    </thead>
		<tbody>
									
		
		<?php
		$no = 1;
		$sql = $koneksi->query("select * from tb_transaksi where status='Pinjam' and MONTH(tanggal_pinjam) = '$bln' and YEAR(tanggal_pinjam) = '$thn'");
			while ($data = $sql->fetch_assoc()) {
									
		?>
	
						
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['judul']; ?></td>
							<td><?php echo $data['nis']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['tanggal_pinjam']; ?></td>
							<td><?php echo $data['tanggal_kembali']; ?></td>
							<td>
								<?php 
								
								$denda = 1000;
								$tanggal_dateline2 = $data['tanggal_kembali'];
								$tanggal_kembali = date('d-m-Y');
								
								$lambat = terlambat($tanggal_dateline2, $tanggal_kembali);
								$denda1 = $lambat * $denda;
								
								if ($lambat>0) {
									echo "
									
									<font color='red'>$lambat hari<br>(Rp $denda1)</font>
									";
								}else{
									echo $lambat." Hari";
								}
								
								?>
								
							</td>
							<td><?php echo $data['status']; ?></td>
					
							
							
							
						</td>
						</tr>
						<?php 
		}
		?>
    </tbody>
	</table>
</div>
	
	<?php

}

?>