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
                    <h1 class="m-0 text-dark"> Pinjam <small>Buku</small></h1>
                </div>

            </div><!-- /.row -->
            <!-- <div class="alert alert-info alert-dismissible">
                        <h5><i class="icon fas fa-info"></i>Tip!</h5>
                        Selamat datang di Sistem Inventory Barang (SIB) SMKN 1 Papalang, Anda bisa melihat dan mencari
                        informasi barang
                    </div> -->


        </div><!-- /.container-fluid -->

    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="card card-primary">
                <!-- /.card-header -->
                <div class="card-body">
                    <?php
                    $query = $koneksi->query("SELECT * FROM tb_buku WHERE id = '$_GET[id]'");
                    if(is_array($query) || is_object($query)){
                    foreach ($query as $data) {
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <select required="" name="buku" class="form-control select2">
                                        <?php
									echo "<option value='$data[id].$data[judul]'>$data[judul]</option>";
								?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Anggota</label>
                                    <select required="" name="nis" class="form-control select2" />
                                    <option value="<?=$_SESSION["nis"]?>"><?=$_SESSION["nama"]?></option>
                                    </select>
                                </div>

                                <input type="text" name="nama" value="<?=$_SESSION["nama"]?>" hidden>

                                <div class="form-group">
                                    <label>Tanggal Pinjam</label>
                                    <input type="date" name="tanggal_pinjam" class="form-control" id="tanggal"
                                        value="<?php echo $tanggal_pinjam; ?>" readonly />
                                </div>
                                <div class="form-group">
                                    <!-- <label>Tanggal Kembali</label> -->
                                    <input type="date" name="tanggal_kembali" class="form-control" id="tanggal"
                                        value="<?php echo $kembali; ?>" hidden />
                                </div>

                                <input class="btn btn-primary" name="tambah" type="submit" value="Pinjam">
                                <input class="btn btn-danger" id="reset" type="reset" value="Batal"
                                    onclick="self.history.back()">
                            </div>
                            <div class="col-md-4">
                                <img src="../admin/img/buku/<?= $data['gambar']; ?>" style=" width: 350px;" alt="">
                            </div>

                        </div>
                    </form>
                    <?php }} ?>
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

                    // $sql2 = $koneksi->query("UPDATE tb_buku SET jumlah_buku=(jumlah_buku-1) WHERE id='$id'");
                    if ($proses){
                        $_SESSION['pesan'] = 'Tambah';
                        echo "<script> document.location.href='./daftar_pinjam';</script>";
                    }
            }
        }
    }
            ?>
<?php
include 'global_footer.php';
?>