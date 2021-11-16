<?php
include '../koneksi.php';
session_start();
$id = $_GET['id'];
	$namalengkap= $_POST['namalengkap'];
	$telp= $_POST['telp'];

    $update = "UPDATE tb_guru set namalengkap='$namalengkap', telp='$telp' where id_guru= '$id' ";
    $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));
    $_SESSION['pesan'] = 'Ubah';
    echo "<script> document.location.href='./guru';</script>";