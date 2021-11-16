<?php
include '../koneksi.php';

if ($_POST['rowid']) {
    $id = $_POST['rowid'];
    $sql = "SELECT * FROM tb_buku WHERE id = $id";

    $result = $koneksi->query($sql);
    foreach ($result as $data) :
?>
<img src="../admin/img/buku/<?= $data['gambar']; ?>" style="margin: auto; height: 100%; display: block; ">

<?php endforeach; ?>
<?php } ?>
<?php
$koneksi->close();
?>