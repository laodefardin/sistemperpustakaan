<!DOCTYPE html>
<?php
include 'koneksi.php';
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>SIMPERPUS - Cari Pustaka</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-dark navbar-info">
            <div class="container">
                <a href="index" class="navbar-brand">
                    <span class="brand-text font-weight-light">SIMPERPUS - Sistem Informasi Perpustakaan Sekolah
                        Menengah Kejuruan</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <!-- <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index" class="nav-link">Login</a>
                        </li>
                    </ul> -->
                </div>
            </div>
        </nav>
        <!-- /.navbar -->

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
                                            <?php echo "<a  class='btn btn-info btn-xs' href='#largeModal' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=" . $data['id'] . "><i class='fa fa-eye'></i> Lihat </a>"; ?>
                                        
                                            <a href="user/pinjam_buku?id=<?= $data['id'];?>" class="btn btn-primary btn-xs">Pinjam</a>
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



            <!-- Main Footer -->
            <footer class="main-footer">
                <div class='container'>
                    <!-- To the right -->
                    <div class="float-right d-none d-sm-inline">
                        Anything you want
                    </div>
                    <!-- Default to the left -->
                    <strong>Copyright &copy; 2021 <a href="">SIMPERPUS - Sistem Informasi Perpustakaan Sekolah Menengah Kejuruan</a>.</strong> All rights
                    reserved.
                </div>
            </footer>
        </div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


    <!-- AdminLTE -->
    <script src="assets/dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="assets/plugins/chart.js/Chart.min.js"></script>
    <script src="assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="assets/plugins/moment/moment.min.js"></script>
    <script src="assets/dist/js/demo.js"></script>
    <script src="assets/dist/js/pages/dashboard3.js"></script>
    <script src="assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#largeModal').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type: 'post',
                    url: 'buku-detail.php',
                    data: 'rowid=' + rowid,
                    success: function (data) {
                        $('.fetched-data').html(data); //menampilkan data ke dalam modal
                    }
                });
            });
        });
    </script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
      <script>
    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
</body>

</html>