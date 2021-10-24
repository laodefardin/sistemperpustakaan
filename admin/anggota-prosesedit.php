<?php
include '../koneksi.php';
session_start();
$id = $_GET['id'];
	$nis= $_POST['nis'];
	$nama= $_POST['nama'];
	$tempat_lahir= $_POST['tempat_lahir'];
	$tanggal_lahir= $_POST['tanggal_lahir'];
	$jenis_kelamin= $_POST['jenis_kelamin'];
	$kelas= $_POST['kelas'];

    $update = "UPDATE tb_anggota set nis='$nis', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', kelas='$kelas' where nis = '$nis' ";
    $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));
    $_SESSION['pesan'] = 'Ubah';
    echo "<script> document.location.href='./anggota';</script>";