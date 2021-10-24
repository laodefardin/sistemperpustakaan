<?php 
include '../koneksi.php';
session_start();

$id = $_GET['id'];
$judul = $_GET['judul'];
$lambat = $_GET['lambat'];
$denda = $_GET['denda'];

$sql = $koneksi->query("UPDATE tb_transaksi SET status='Kembali', lambat='$lambat', denda='$denda' where id='$id'");

$sql = $koneksi->query("UPDATE tb_buku SET jumlah_buku=(jumlah_buku + 1) WHERE judul='$judul'");

$_SESSION['pesan'] = 'Kembalikan';
echo "<script> document.location.href='./transaksi-kembali';</script>";
?>