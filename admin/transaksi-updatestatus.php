<?php 
include '../koneksi.php';
session_start();

$id = $_GET['id'];
$judul = $_GET['judul'];

$tanggal_pinjam = date("Y-m-d");
$tujuh_hari = mktime(0,0,0, date("n"), date("j")+7, date("Y"));
$kembali = date("Y-m-d", $tujuh_hari);

$sql = $koneksi->query("UPDATE tb_transaksi SET status='Pinjam', tanggal_pinjam='$tanggal_pinjam', tanggal_kembali='$kembali' where id='$id'");
// $query = "SELECT * FROM tb_buku WHERE judul = '$judul'";
$sql2 = $koneksi->query("UPDATE tb_buku SET jumlah_buku=(jumlah_buku-1) WHERE judul='$judul'");
?>

<script type="text/javascript">
alert("Update Status Pinjam Berhasil");
window.location.href="transaksi";
</script>
<?php
?>