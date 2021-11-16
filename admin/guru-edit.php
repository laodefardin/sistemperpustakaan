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
                    $query = $koneksi->query("SELECT * FROM tb_guru WHERE id_guru = '$_GET[id]'");
                    if(is_array($query) || is_object($query)){
                    foreach ($query as $data) {
                    ?>
                        <form action="guru-prosesedit.php?id=<?= $_GET['id'];?>" method="post"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input required="" type="text" name="namalengkap" class="form-control"
                                            value="<?php echo $data['namalengkap'];?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Telp</label>
                                        <input required="" type="text" name="telp" class="form-control"
                                            value="<?php echo $data['telp'];?>" />
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

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "global_footer.php"; ?>