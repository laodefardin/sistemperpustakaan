<?php
$halaman = 'Laporan Data Anggota';
include "global_header.php"; 
// $query = query("SELECT * FROM barang");

?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <?php
                //menampilkan pesan jika ada pesan
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {

                    $pesan = $_SESSION['pesan'];

                    echo '<div class="flash-data" data-flashdata="' . $_SESSION['pesan'] . '"></div>';
                }
                //mengatur session pesan menjadi kosong

                $_SESSION['pesan'] = '';
                // unset($_SESSION['pesan']);
                // $cetak_pesan = '';
                ?>
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Data Anggota</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tampung1">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     $query=$koneksi->query( "SELECT * FROM tb_anggota");  $nomor_urut = 1;
                        foreach ($query as $data) :
                                                ?>
                                    <tr>
                                        <td><?= $nomor_urut; ?></td>
                                        <td><?php echo $data['nis']; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['tempat_lahir']; ?></td>
                                        <td><?php echo $data['tanggal_lahir']; ?></td>
                                        <td><?php echo $data['jenis_kelamin']; ?></td>
                                        <td><?php echo $data['kelas']; ?></td>
                                    </tr>
                                    <?php $nomor_urut++; endforeach; ?>
                                </tbody>
                            </table>
                            <form action="" method="post" enctype="multipart/form-data">
                                <input class="btn btn-success btn-sm" name="submit_excel" target="_blank" type="submit"
                                    value="Cetak Excel">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card -->


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
<?php
if (isset($_POST['submit_excel'])){
echo "<script>window.open('cetak/laporananggota.php', '_blank');</script>";
}
?>

<?php include "global_footer.php"; ?>