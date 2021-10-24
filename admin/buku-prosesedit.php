<?php
include '../koneksi.php';
session_start();
$id = $_GET['id'];
$judul= $_POST['judul'];
$pengarang= $_POST['pengarang'];
$penerbit= $_POST['penerbit'];
$tahun= $_POST['tahun'];
$isbn= $_POST['isbn'];
$jumlah= $_POST['jumlah'];
								
$lokasi= $_POST['lokasi'];
								
								
$tanggal= $_POST['tanggal'];
$img = $_FILES['foto']['name'];
if(empty($img)){
    $update = "UPDATE tb_buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun', isbn='$isbn', jumlah_buku='$jumlah', lokasi='$lokasi', tanggal_input='$tanggal' WHERE id = '".$id."' ";

    $sql = mysqli_query($koneksi, $update);
    $_SESSION['pesan'] = 'Ubah';
    echo "<script> document.location.href='./buku';</script>";
}else{
    $query = $koneksi->query("SELECT * FROM tb_buku WHERE id = '$_GET[id]' ");
    $data = mysqli_fetch_array($query);
    $lokasi1 = $data['gambar'];
    $hapus_gbr = "./img/buku/".$lokasi1;
    unlink($hapus_gbr);

    move_uploaded_file($_FILES['foto']['tmp_name'], './img/buku/'.$img);

    $update = "UPDATE tb_buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun', isbn='$isbn', jumlah_buku='$jumlah', lokasi='$lokasi', tanggal_input='$tanggal', gambar='$img' WHERE id = '".$id."' ";
    $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));
    $_SESSION['pesan'] = 'Ubah';
    echo "<script> document.location.href='./buku';</script>";
}