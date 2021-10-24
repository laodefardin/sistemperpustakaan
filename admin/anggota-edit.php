<?php 
$halaman = 'Edit Anggota';
include "global_header.php"; ?>

<!-- Main content -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">Edit Anggota</div>
                    <div class="card-body">
                        <?php
                    $query = $koneksi->query("SELECT * FROM tb_anggota WHERE nis = '$_GET[id]'");
                    if(is_array($query) || is_object($query)){
                    foreach ($query as $data) {
                    ?>
                        <form action="anggota-prosesedit.php?id=<?= $_GET['id'];?>" method="post"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input required="" type="number" name="nis" class="form-control"
                                            value="<?php echo $data['nis'];?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Anggota</label>
                                        <input required="" type="text" name="nama" class="form-control"
                                            value="<?php echo $data['nama'];?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir"
                                            value="<?php echo $data['tempat_lahir'];?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir"
                                            value="<?php echo $data['tanggal_lahir'];?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin">
                                            <option value="Laki-laki"
                                                <?php if ($data['jenis_kelamin']=='Laki-laki') {echo "selected"; } ?>>
                                                Laki-laki</option>
                                            <option value="Perempuan"
                                                <?php if ($data['jenis_kelamin']=='Perempuan') {echo "selected"; } ?>>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <input type="text" name="kelas" value="<?php echo $data['kelas'];?>"
                                            class="form-control" />
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