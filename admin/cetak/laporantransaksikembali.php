<?php
include "../../koneksi.php";
session_start();
	include "../function.php";

    header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan_peminjamanbuku(".date('d-m-Y').").xls");
	
$bln = $_SESSION["bln"];
$thn = $_SESSION["thn"];
?>

<body>
    <center>
<?php
if ($bln == 'all') { ?>
<h2>LAPORAN TRANSAKSI PENGEMBALIAN TAHUN <?php echo $thn;?></h2>
<?php }else{?>
<h2>LAPORAN TRANSAKSI PENGEMBALIAN BULAN <?php echo $bln;?>  TAHUN <?php echo $thn;?></h2>
<?php } ?>
        
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
        if ($bln == 'all') {
	    $sql = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE status='Kembali' AND YEAR(tanggal_pinjam) = '$thn'");
        }else{
	   $sql = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE status='Kembali' AND MONTH(tanggal_pinjam) = '$bln' AND YEAR(tanggal_pinjam) = '$thn'");
        }
$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 7; // Set baris pertama untuk isi tabel adalah baris ke 4
foreach ($sql as $data) {
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