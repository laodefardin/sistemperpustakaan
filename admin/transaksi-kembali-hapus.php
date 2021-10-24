<?php
include '../koneksi.php';
session_start();
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$id = $_GET['id'];

$hapus = "DELETE FROM tb_transaksi WHERE status='Kembali' AND id = '$id'";

$proses = $koneksi->query($hapus);
if ($proses) {
    $_SESSION['pesan'] = 'Hapus';
}
echo "<script> document.location.href='./transaksi-kembali';</script>";
die();
