<?php 
$halaman = 'Tambah Transaksi Pinjam';
include "global_header.php"; 

$tanggal_pinjam = date("Y-m-d");
$tujuh_hari = mktime(0,0,0, date("n"), date("j")+7, date("Y"));
$kembali = date("Y-m-d", $tujuh_hari);

?>

<!-- Main content -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Tambah Transaksi Pinjam</div>
                    <div class="card-body">
                    <?php
                    $query = $koneksi->query("SELECT * FROM tb_buku WHERE id = '$_GET[id]'");
                    if(is_array($query) || is_object($query)){
                    foreach ($query as $data) {
                    ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Judul Buku</label>
                                        <select required="" name="buku" class="form-control select2">
                                            <option value="">-- Pilih Judul Buku --</option>

                                            <?php
								
								$sql = $koneksi -> query("SELECT * FROM tb_buku ORDER BY id");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[id].$data[judul]'>$data[judul]</option>";
								}
								?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Anggota</label>
                                        <select required="" name="nama" class="form-control select2" />
                                        <option value="">-- Pilih Nama Peminjam --</option>
                                        <?php
								
								$sql = $koneksi -> query("SELECT * FROM tb_anggota ORDER BY nis");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[nis].$data[nama]'>$data[nis], $data[nama]</option>";
								}
								?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal Pinjam</label>
                                        <input type="date" name="tanggal_pinjam" class="form-control" id="tanggal"
                                            value="<?php echo $tanggal_pinjam; ?>" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Kembali</label>
                                        <input type="date" name="tanggal_kembali" class="form-control" id="tanggal"
                                            value="<?php echo $kembali; ?>" readonly />
                                    </div>

                                    <input class="btn btn-primary" name="tambah" type="submit" value="Tambah">
                                    <input class="btn btn-danger" id="reset" type="reset" value="Batal"
                                        onclick="self.history.back()">
                                </div>

                            </div>
                        </form>
                        <?php }} ?>
                    </div>
                </div>
            </div>
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
			$pecah_nama = explode(".", $nama);
			$nis = $pecah_nama[0];
			$nama = $pecah_nama[1];

            $sql = mysqli_query($koneksi,"select * from tb_buku where judul='$judul'");
								
			while ($data = mysqli_fetch_assoc($sql)) {
			$sisa = $data['jumlah_buku'];
									
			if ($sisa <= 0) {
			?>

            <script type="text/javascript">
                alert("Stok Buku Habis, Transaksi Tidak Dapat Dilakukan, Silakan Tambah Stok Buku Terlebih Dahulu");
                window.location.href = "transaksipinjam-tambah";
            </script>

            <?php
										
			}else{
            $query = "INSERT INTO tb_transaksi (judul, nis, nama, tanggal_pinjam, tanggal_kembali, status) VALUES ('$judul','$nis','$nama','$tanggal_pinjam','$tanggal_kembali','Pinjam')";
                    $proses = $koneksi->query($query);
                    $sql2 = $koneksi->query("UPDATE tb_buku SET jumlah_buku=(jumlah_buku-1) WHERE id='$id'");

                    if ($proses){
                        $_SESSION['pesan'] = 'Tambah';
                        echo "<script> document.location.href='./transaksi';</script>";
                    }
            }
        }
    }
            ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "global_footer.php"; ?>