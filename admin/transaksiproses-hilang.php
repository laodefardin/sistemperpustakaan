<?php 
include '../koneksi.php';
session_start();

$id = $_GET['id'];
$lambat = $_GET['lambat'];
$denda = $_GET['denda'];


$sql = $koneksi->query("UPDATE tb_transaksi SET status='Hilang', lambat='$lambat', denda='$denda' where id='$id'");
?>

<script type="text/javascript">
alert("Proses Buku Hilang");
window.location.href="transaksi-bukuhilang";
</script>
<?php
?>