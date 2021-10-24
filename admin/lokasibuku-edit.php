<?php 
$halaman = 'Edit Lokasi Buku';
include "global_header.php"; ?>

<!-- Main content -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Edit Lokasi Buku</div>
                    <div class="card-body">
                        <?php
                    $query = $koneksi->query("SELECT * FROM tb_lokasibuku WHERE id = '$_GET[id]'");
                    if(is_array($query) || is_object($query)){
                    foreach ($query as $data) {
                    ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Lokasi Buku</label>
                                        <input type="text" name="lokasi" class="form-control" value="<?= $data['lokasi'];?>"/>
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
            $lokasi= $_POST['lokasi'];

                    $query = "UPDATE tb_lokasibuku SET lokasi='$lokasi' WHERE id='$_GET[id]'";
                    $proses = $koneksi->query($query);

                    if ($proses){
                        $_SESSION['pesan'] = 'Tambah';
                        echo "<script> document.location.href='./lokasibuku';</script>";
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