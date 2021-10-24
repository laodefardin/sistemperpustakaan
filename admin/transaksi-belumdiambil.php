<?php
$halaman = 'Transaksi Buku Belum diambil';
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
                        <h3 class="card-title">Data Transaksi Buku Belum diambil</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                            <th>Nis</th>
                                            <th>Nama Peminjam</th>
											<th>Tanggal Pinjam</th>
											<th>Status</th>
											
											<th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = $koneksi->query("SELECT * FROM tb_transaksi WHERE status='Belum diambil'");
                        $nomor_urut = 1;
                        foreach ($query as $data) :
                                                ?>
                                <tr>
                                    <td><?= $nomor_urut; ?></td>
                                    <td><?php echo $data['judul']; ?></td>
							<td><?php echo $data['nis']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['tanggal_pinjam']; ?></td>
							<td><?php echo $data['status']; ?></td>
                                    <td>
<a href="transaksi-updatestatus?id=<?php echo $data['id'];?>&judul=<?php echo $data['judul']?> "
                                            class="btn btn-primary btn-xs" >update status</a>
<a href="transaksi_prosespinjamhapus?id=<?php echo $data['id'];?>"
                                            class="btn btn-danger btn-xs tombol-hapus" >hapus</a>

                                    </td>
                                </tr>
                                <?php $nomor_urut++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Foto Anggota</h4>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="fetched-data"></div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                    <!-- <button class="btn btn-primary" type="button">Save changes</button> -->
                                </div>
                            </div>

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

<?php include "global_footer.php"; ?>