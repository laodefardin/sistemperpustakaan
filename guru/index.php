<?php
include 'global_header.php';
?>
<!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"> Cari Pustaka <small>Informasi Data Pustaka</small></h1>
                        </div>

                    </div><!-- /.row -->
                    <!-- <div class="alert alert-info alert-dismissible">
                        <h5><i class="icon fas fa-info"></i>Tip!</h5>
                        Selamat datang di Sistem Inventory Barang (SIB) SMKN 1 Papalang, Anda bisa melihat dan mencari
                        informasi barang
                    </div> -->


                </div><!-- /.container-fluid -->

            </div>
            <!-- /.content-header -->


            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="card card-primary">

                        <div class="col-xs-12" style="margin: 10px 0 0 0;">
                            <div class="box-tools">
                                <div class="input-group input-group-lg" style="width: 50%; margin: 0 auto;">
                                    <input type="text" id="myInput" onkeyup="myFunction()" name="table_search"
                                        class="form-control pull-right" placeholder="Cari pustaka">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default btn-lg"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Judul Pustaka</th>
                                        <th>Pengarang</th>
                                        <th>Peneribit</th>
                                        <th>Tahun</th>
                                        <th>ISBN</th>
                                        <th>Ketersediaan</th>
                                        <th>Lokasi Buku</th>
                                        <th>Lihat Buku</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                $query = $koneksi->query("SELECT * FROM tb_buku");
                        $nomor_urut = 1;
                        foreach ($query as $data) :
                                                ?>
                                    <tr>
                                        <td><?= $nomor_urut; ?></td>
                                        <td><?= $data['judul']; ?></td>
                                        <td><?= $data['pengarang']; ?></td>
                                        <td><?= $data['penerbit']; ?></td>
                                        <td><?= $data['tahun_terbit']; ?></td>
                                        <td><?= $data['isbn']; ?></td>
                                        <td><?= $data['jumlah_buku']; ?>
                                            <?php
                            if ($data['jumlah_buku'] == 0) {
                            $label = "danger";
                            $pesan = "Kosong";
                            } else {
                            $label = "success";
                            $pesan = "Tersedia";
                            }
                            ?>
                    <span class="label label-<?php echo $label; ?>"><?php echo $pesan; ?></span>
                                        </td>
                                        <td><?= $data['lokasi']?></td>
                                        <td>
                                            <?php echo "<a  class='btn btn-info btn-xs' href='#largeModal' class='btn btn-default btn-xs' id='custId' data-toggle='modal' data-id=" . $data['id'] . "><i class='fa fa-eye'></i> Lihat </a>"; ?>
                                        
                                            <a href="pinjam_buku?id=<?= $data['id'];?>" class="btn btn-primary btn-xs">Pinjam</a>
                                        </td>
                                    </tr>
                                    <?php
                                                    $nomor_urut++;
                                                endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Gambar Buku</h4>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="fetched-data" style="width: 100%; height: 400px;"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Close</button>
                                        
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- /.card -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->

            <!-- /.content-wrapper -->

<?php
include 'global_footer.php';
?>