<?php 
$halaman = 'dashboard';
include "global_header.php"; 
$level = $_SESSION['level'];
$nama = $_SESSION['nama'];
?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="alert alert-info alert-dismissible">
            <h5><i class="icon fas fa-check"></i> Selamat Datang</h5>
            SIMPERPUS - Sistem Informasi Perpustakaan Sekolah Menengah Kejuruan
        </div>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <?php
              $sql = "SELECT count(id) as a FROM tb_buku";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
                        <h3><?= $data['a']; ?></h3>
                        <p>Data Pustaka</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="buku" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <?php
              $sql = "SELECT count(nis) as a FROM tb_anggota";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
                        <h3><?= $data['a']; ?></h3>
                        <p>Data Anggota</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="anggota" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <?php
              $sql = "SELECT count(id) as a FROM tb_transaksi WHERE status = 'Pinjam'";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
                        <h3><?= $data['a']; ?></h3>
                        <p>Transaksi Pinjam</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>

                    </div>
                    <a href="transaksi" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
<div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <?php
              $sql = "SELECT count(id) as a FROM tb_transaksi WHERE status = 'Kembali' ";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
                        <h3><?= $data['a']; ?></h3>
                        <p>Transaksi Kembali</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>

                    </div>
                    <a href="transaksi-kembali" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "global_footer.php"; ?>