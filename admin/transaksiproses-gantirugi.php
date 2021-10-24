<?php 
include '../koneksi.php';
session_start();
$id = $_GET['id'];


$sql = $koneksi->query("UPDATE tb_transaksi SET status='Lunas' WHERE id='$id'");

$_SESSION['pesan'] = 'Kembalikan';
echo "<script> document.location.href='./transaksi-gantirugi';</script>";

?>

		<!-- <script type="text/javascript">
		alert("Proses Ganti Rugi Buku Berhasil");
		window.location.href="?page=transaksi_gantirugi";
		</script> -->