<?php
include '../koneksi.php';
session_start();
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$id = $_GET['id'];

$hapus = "DELETE FROM tb_anggota WHERE nis = '$id'";
$hapus_user = "DELETE FROM tb_pengguna WHERE nis = '$id'";

$proses = $koneksi->query($hapus);
$koneksi->query($hapus_user);
if ($proses) {
    $_SESSION['pesan'] = 'Hapus';
}
echo "<script> document.location.href='./anggota';</script>";
die();
