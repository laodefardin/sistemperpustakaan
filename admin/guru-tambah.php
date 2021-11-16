<?php 
$halaman = 'Tambah Guru';
include "global_header.php"; ?>

<!-- Main content -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Tambah Guru</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input required="" type="text" name="namalengkap" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input required="" type="text" name="telp" class="form-control" />
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
            $namalengkap= $_POST['namalengkap'];
			$telp= $_POST['telp'];

            $no_acak = mt_rand(1000, 9999);

            $username= $_POST['username'];
            $password= $_POST['password'];
            $password_sha1 = md5(sha1(md5($password)));
            

                    $query = "INSERT INTO tb_guru (id_guru, namalengkap, telp) values('$no_acak','$namalengkap','$telp')";

                    $query1 = "INSERT INTO tb_pengguna (nis, username, nama, password, level, foto) values ('$no_acak','$username','$namalengkap','$password_sha1','Guru','')";

                    $proses = $koneksi->query($query);
                    $koneksi->query($query1);

                    if ($proses){
                        $_SESSION['pesan'] = 'Tambah';
                        echo "<script> document.location.href='./guru';</script>";
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