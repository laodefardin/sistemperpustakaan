<?php 
$halaman = 'Tambah Buku';
include "global_header.php";
$level = $_SESSION['level'];
?>
<!-- Main content -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">Tambah Buku</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Judul Buku</label>
                                        <input required="" type="text" name="judul" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label>Pengarang</label>
                                        <input required="" type="text" name="pengarang" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label>Penerbit</label>
                                        <input required="" type="text" name="penerbit" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label>Tahun Terbit</label>
                                        <select required="" class="form-control" name="tahun">
                                            <?php
								$tahun = date("Y");
								for ($i=$tahun-25; $i <= $tahun; $i++){
									echo'
								<option value="'.$i.'">'.$i.'</option>';
								}
						?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ISBN</label>
                                        <input required="" type="text" name="isbn" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Buku</label>
                                        <input required="" type="number" name="jumlah" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Lokasi Buku</label>
                                        <select required="" name="lokasi" class="form-control" />
                                        <option value="">-- Pilih Lokasi Buku --</option>
                                        <?php
								
								$sql = $koneksi -> query("SELECT * FROM tb_lokasibuku ORDER BY id");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[id].$data[lokasi]'>$data[lokasi]</option>";
								}
								?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Input</label>
                                        <input required="" type="date" name="tanggal" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="foto">Masukkan Foto Buku</label>
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input" id="customFile"
                                                accept="image/jpeg">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>

                                    </div>

                                    <div class="form-group form-actions">
                                        <input class="btn btn-primary" name="tambah" type="submit" value="Tambah">
                                        <input class="btn btn-danger" id="reset" type="reset" value="Batal"
                                            onclick="self.history.back()">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
            <?php
            if (isset($_POST['tambah'])){
                $judul= $_POST['judul'];
				$pengarang= $_POST['pengarang'];
				$penerbit= $_POST['penerbit'];
				$tahun= $_POST['tahun'];
				$isbn= $_POST['isbn'];
				$jumlah= $_POST['jumlah'];
				$lokasi= $_POST['lokasi'];
				$pecah_lokasi = explode(".", $lokasi);
							
				$id = $pecah_lokasi[0];
				$lokasi = $pecah_lokasi[1];
								
				$tanggal= $_POST['tanggal'];

                $img = $_FILES['foto']['name'];
                $tmp = $_FILES['foto']['tmp_name'];

                $gambar_baru = date('dYHiS').$img;

                $path = "./img/buku/".$gambar_baru;

                if(empty($img)){
                $query = 'INSERT INTO tb_buku (judul, pengarang, penerbit, tahun_terbit, isbn, jumlah_buku, lokasi, tanggal_input, gambar) VALUES ("'.$judul.'","'.$pengarang.'","'.$penerbit.'", "'.$tahun.'","'.$isbn.'","'.$jumlah.'","'.$lokasi.'","'.$tanggal.'","")';
                    $proses = $koneksi->query($query);

                    if ($proses){
                        $_SESSION['pesan'] = 'Tambah';
                        echo "<script> document.location.href='./buku';</script>";
                    }
                }else{
                if (move_uploaded_file($tmp, $path)){
                    $query = 'INSERT INTO tb_buku (judul, pengarang, penerbit, tahun_terbit, isbn, jumlah_buku, lokasi, tanggal_input, gambar) VALUES ("'.$judul.'","'.$pengarang.'","'.$penerbit.'", "'.$tahun.'","'.$isbn.'","'.$jumlah.'","'.$lokasi.'","'.$tanggal.'","'.$gambar_baru.'")';
                    $proses = $koneksi->query($query);
                    if ($proses){
                        $_SESSION['pesan'] = 'Tambah';
                        echo "<script> document.location.href='./buku';</script>";
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