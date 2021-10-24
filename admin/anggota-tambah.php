<?php 
$halaman = 'Tambah Anggota';
include "global_header.php"; ?>

<!-- Main content -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Tambah Anggota</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input required="" type="number" name="nis" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Anggota</label>
                                        <input required="" type="text" name="nama" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input required="" type="text" name="tempat_lahir" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input required="" type="date" name="tanggal_lahir" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select required="" class="form-control" name="jenis_kelamin">
                                            <option value="Laki-laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <input required="" type="text" name="kelas" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input required="" type="text" name="username" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input required="" type="text" name="password" class="form-control" />
                                    </div>

                                    <input class="btn btn-primary" name="tambah" type="submit" value="Tambah">
                                    <input class="btn btn-danger" id="reset" type="reset" value="Batal"
                                        onclick="self.history.back()">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
            <?php
            if (isset($_POST['tambah'])){
            $nis= $_POST['nis'];
			$nama= $_POST['nama'];
			$tempat_lahir= $_POST['tempat_lahir'];
			$tanggal_lahir= $_POST['tanggal_lahir'];
			$jenis_kelamin= $_POST['jenis_kelamin'];
			$kelas= $_POST['kelas'];
            $username= $_POST['username'];
            $password= $_POST['password'];
            $password_sha1 = md5(sha1(md5($password)));
            

                    $query = "INSERT INTO tb_anggota (nis, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, kelas) values('$nis','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$kelas')";

                    $query1 = "INSERT INTO tb_pengguna (nis, username, nama, password, level, foto) values ('$nis','$username','$nama','$password_sha1','Siswa','')";

                    $proses = $koneksi->query($query);
                    $koneksi->query($query1);

                    if ($proses){
                        $_SESSION['pesan'] = 'Tambah';
                        echo "<script> document.location.href='./anggota';</script>";
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