<?php 
$halaman = 'Edit Guru';
include "global_header.php"; ?>

<!-- Main content -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">Edit Guru</div>
                    <div class="card-body">
                        <?php
                    $query = $koneksi->query("SELECT * FROM tb_pengguna WHERE nis = '$_GET[id]'");
                    if(is_array($query) || is_object($query)){
                    foreach ($query as $data) {
                    ?>
                        <form action="" method="post"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input required="" type="text" name="username"
                                            value="<?php echo $data['username'];?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" name="password" class="form-control" />
                                    </div>

                                    <input class="btn btn-primary" name="update" type="submit" value="Update">
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

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<?php
if (isset($_POST['update'])){
$id = $_GET['id'];
	$username= $_POST['username'];
	$password= $_POST['password'];
    $password_sha1 = md5(sha1(md5($password)));

    if (!empty($password)){
    $update = "UPDATE tb_pengguna set username='$username', password='$password_sha1' where nis = '$id' ";
    }else{
    $update = "UPDATE tb_pengguna set username='$username' where nis = '$id' ";
    }

    $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));
    
    $_SESSION['pesan'] = 'Ubah';
    echo "<script> document.location.href='./guru';</script>";
            }
?>

<!-- /.content-wrapper -->
<?php include "global_footer.php"; ?>