<!DOCTYPE html>
<?php
// mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
session_start();
include '../koneksi.php';
include "../admin/function.php";
if (!isset($_SESSION["username"])){
//   echo "<script> document.location.href='../index'; </script>";
  echo "<script> alert('anda tidak memiliki akses untuk halaman ini Sebagai Guru!, Silahkan Login terlebih dahulu atau mendaftar di petugas perpustakan');window.location= '../index';</script>";
}

$user = $_SESSION['username'];
$level = $_SESSION['level'];
$nama = $_SESSION['nama'];

$query = $koneksi->query("SELECT * FROM tb_pengguna WHERE username = '$user'");
$row = $query->fetch_array();
//jika akun berlevel peserta mengakses page admin
if ($level === "Admin"){
  echo "<script> document.location.href='../admin/index'; </script>";
  // echo "<script> alert('anda tidak memiliki akses untuk halaman ini!');window.location= '../user/index';</script>";
}elseif($level === "Siswa"){
    echo "<script> document.location.href='../user/index'; </script>";
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>SIMPERPUS - Cari Pustaka</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="icon" href="../favicon.ico" type="image/x-icon" />
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-dark navbar-info">
            <div class="container">
                <a href="index" class="navbar-brand">
                    <span class="brand-text font-weight-light">SIMPERPUS</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <!-- <li class="nav-item">
                            <a href="index" class="btn btn-info btn-sm" class="nav-link">Dashboard</a>
                        </li> -->
                        <li class="nav-item">
                            <a href="index" class="btn btn-info btn-sm" class="nav-link">Daftar Buku</a>
                        </li>
                        <li class="nav-item">
                            <a href="daftar_pinjam" class="btn btn-info btn-sm" class="nav-link">Daftar Pinjam</a>
                        </li>
                    </ul>
                </div>
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                    <li class="nav-item">
                    <span class="btn btn-info btn-sm"><?= $_SESSION["nama"]  ?> - Guru <?= $_SESSION["username"] ?></span>  <a href="../logout" class="btn btn-danger btn-sm" class="nav-link">Logout</a>
                    </li>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->