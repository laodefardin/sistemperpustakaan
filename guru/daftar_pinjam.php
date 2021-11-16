<?php
include 'global_header.php';

$tanggal_pinjam = date("Y-m-d");
$tujuh_hari = mktime(0,0,0, date("n"), date("j")+7, date("Y"));
$kembali = date("Y-m-d", $tujuh_hari);

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Daftar Buku Yang telah di <small>pinjam</small></h1>
                </div>

            </div><!-- /.row -->
                <?php
                //menampilkan pesan jika ada pesan
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {

                    $pesan = $_SESSION['pesan'];

                    echo '<div class="flash-data" data-flashdata="' . $_SESSION['pesan'] . '"></div>';
                }
                //mengatur session pesan menjadi kosong

                $_SESSION['pesan'] = '';
                // unset($_SESSION['pesan']);
                // $cetak_pesan = '';
                ?>

        </div><!-- /.container-fluid -->

    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="card card-primary">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
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

                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = $koneksi->query("SELECT * FROM tb_transaksi WHERE nis='$_SESSION[nis]'");
                        $nomor_urut = 1;
                        foreach ($query as $data) :
                                                ?>
                            <tr>
                                <td><?= $nomor_urut; ?></td>
                                <td><?php echo $data['judul']; ?></td>
                                <td><?php echo $data['nis']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['tanggal_pinjam']; ?></td>
                                <td><?php echo $data['tanggal_kembali']; ?></td>
                                <td>
                                    <?php 
								
								$denda2 = $koneksi -> query("select * from tb_denda");
								$denda3 = $denda2 -> fetch_assoc();
								$denda4 = $denda3['denda'];
							
								
								
								
								$tanggal_dateline2 = $data['tanggal_kembali'];
								$tanggal_kembali = date('Y-m-d');
								
								$lambat = terlambat($tanggal_dateline2, $tanggal_kembali);
								$denda1 = $lambat * $denda4;
								
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
                                <td>
                                    <?php
$status = $data['status'];
if ($status == 'Belum diambil') { ?>
<a href="cetak-bukti?id=<?php echo $data['id'];?>" target="_blank"
                                        class="btn btn-info btn-xs">Cetak Bukti</a>
                                    <a href="hapus-pinjam?id=<?php echo $data['id'];?>"
                                        class="btn btn-danger btn-xs tombol-hapus">Batal Pinjam</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php $nomor_urut++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Gambar Buku</h4>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="fetched-data" style="width: 100%; height: 400px;"></div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>

                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- /.card -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<!-- /.content-wrapper -->
<!-- /.col-md-6 -->
<?php
            if (isset($_POST['tambah'])){
            $tanggal_pinjam= $_POST['tanggal_pinjam'];
			$tanggal_kembali= $_POST['tanggal_kembali'];
								
			$buku= $_POST['buku'];
			$pecah_buku = explode(".", $buku);
							
			$id = $pecah_buku[0];
			$judul = $pecah_buku[1];
								
			$nama= $_POST['nama'];
			$nis = $_POST['nis'];

            $sql = mysqli_query($koneksi,"select * from tb_buku where judul='$judul'");
								
			while ($data = mysqli_fetch_assoc($sql)) {
			$sisa = $data['jumlah_buku'];
									
			if ($sisa <= 0) {
			?>

<script type="text/javascript">
    alert("Stok Buku Habis, Transaksi Tidak Dapat Dilakukan, Silakan Tambah Stok Buku Terlebih Dahulu");
    window.location.href = "pinjam_buku";
</script>

<?php
										
			}else{
            $query = "INSERT INTO tb_transaksi (judul, nis, nama, tanggal_pinjam, tanggal_kembali, status) VALUES ('$judul','$nis','$nama','$tanggal_pinjam','$tanggal_kembali','Belum diambil')";
                    $proses = $koneksi->query($query);
                    $sql2 = $koneksi->query("UPDATE tb_buku SET jumlah_buku=(jumlah_buku-1) WHERE id='$id'");

                    if ($proses){
                        $_SESSION['pesan'] = 'Tambah';
                        echo "<script> document.location.href='./index';</script>";
                    }
            }
        }
    }
            ?>
<?php
include 'global_footer.php';
?>