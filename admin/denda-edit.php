<?php 
$halaman = 'Edit Denda';
include "global_header.php"; ?>

<!-- Main content -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Edit Denda</div>
                    <div class="card-body">
                        <?php
                    $query = $koneksi->query("SELECT * FROM tb_denda WHERE id = '$_GET[id]'");
                    if(is_array($query) || is_object($query)){
                    foreach ($query as $data) {
                    ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Besar Denda</label>
                                        <input type="number" name="denda" value="<?php echo $data['denda'];?>" class="form-control" />
                                    </div>
                                    <input class="btn btn-primary" name="tambah" type="submit" value="Update">
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
            $denda= $_POST['denda'];

                    $query = "UPDATE tb_denda set denda='$denda' WHERE id='$_GET[id]'";
                    $proses = $koneksi->query($query);

                    if ($proses){
                        $_SESSION['pesan'] = 'Tambah';
                        echo "<script> document.location.href='./denda';</script>";
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