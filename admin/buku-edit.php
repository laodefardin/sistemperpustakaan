<?php 
$halaman = 'Edit Buku';
include "global_header.php"; ?>


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Edit Buku</div>
                    <div class="card-body">
                        <?php
                    $query = $koneksi->query("SELECT * FROM tb_buku WHERE id = '$_GET[id]'");
                    if(is_array($query) || is_object($query)){
                    foreach ($query as $data) {
                    ?>
                        <form action="buku-prosesedit.php?id=<?= $_GET['id'];?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="./img/buku/<?= $data['gambar']; ?>" style=" width: 350px;" alt="">
                                    <div class="form-group">
                                        <label for="foto">Ganti Foto Buku</label>
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input" id="customFile"
                                                accept="image/jpeg">
                                            <label class="custom-file-label" for="customFile">Choose file </label>
                                        </div>
                                    </div>
                                    <div class="form-group form-actions">
                                        <input class="btn btn-primary" name="tambah" type="submit" value="Tambah">
                                        <input class="btn btn-danger" id="reset" type="reset" value="Batal"
                                            onclick="self.history.back()">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Judul Buku</label>
                                        <input required="" type="text" name="judul" class="form-control"
                                            value="<?php echo $data['judul'];?>" />
                                    </div>

                                    <div class="form-group">
                                        <label>Pengarang</label>
                                        <input required="" type="text" name="pengarang" class="form-control"
                                            value="<?php echo $data['pengarang'];?>" />
                                    </div>

                                    <div class="form-group">
                                        <label>Penerbit</label>
                                        <input required="" type="text" name="penerbit" class="form-control"
                                            value="<?php echo $data['penerbit'];?>" />
                                    </div>

                                    <div class="form-group">
                                        <label>Tahun Terbit</label>
                                        <select class="form-control" name="tahun">
                                            <?php
								$tahun = date("Y");
								for ($i=$tahun-29; $i <= $tahun; $i++){
									
									if($i==$tahun2) {
									echo'<option value="'.$i.'"selected>'.$i.'</option>';	
									
									}else{
										
									echo'<option value="'.$i.'">'.$i.'</option>';
									}
								}
							?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ISBN</label>
                                        <input required="" type="text" name="isbn" class="form-control"
                                            value="<?php echo $data['isbn'];?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Buku </label>
                                        <input required="" type="number" name="jumlah" class="form-control"
                                            value="<?php echo $data['jumlah_buku'];?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Input </label>
                                        <input type="date" name="tanggal" value="<?= $data['tanggal_input'];?>"
                                            class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Lokasi Buku</label>
                                        <select name="lokasi" value="<?php echo $data['lokasi'];?>"
                                            class="form-control" />
                                <?php
								$sql = $koneksi->query("SELECT * FROM tb_lokasibuku order by lokasi");
								while ($data=$sql->fetch_assoc()) {
									echo "<option value='$data[lokasi]'>$data[lokasi]</option>";
								} 
								?>
                                    </select>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                        <?php }} ?>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "global_footer.php"; ?>