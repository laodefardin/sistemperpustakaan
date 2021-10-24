<?php $halaman='uploadfoto';
include "global_header.php";
?><?php //after klik

if (isset($_POST['upload'])) {
    // Ambil data foto yang dipilih dari form
    $img=$_FILES['foto']['name'];
    $tmp=$_FILES['foto']['tmp_name'];
    // // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    $nama_baru=date('dmYHis').$img;
    // // Set path folder tempat menyimpan fotonya
    $path="img/user/".$nama_baru;

    // // Proses upload
    if(move_uploaded_file($tmp, $path)) {
        // Cek apakah gambar berhasil diupload atau tidak
        // Query untuk menampilkan data gambar berdasarkan id user yang dikirim
        $profil=$koneksi->query("SELECT * FROM tb_pengguna WHERE id = '".$_SESSION['id_user']."'");
        $data=mysqli_fetch_array($profil); // Ambil data dari hasil eksekusi $profil
        //  // Cek apakah file foto sebelumnya ada di folder images
        if (is_file("./img/user/".$data['foto'])) // Jika foto ada
        unlink("./img/user/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder images

        // Proses ubah data ke Database
        $update="UPDATE tb_pengguna SET foto='$nama_baru' WHERE id = '".$_SESSION['id_user']."'";
        mysqli_query($koneksi, $update) or die(mysqli_error()); // Eksekusi/ Jalankan query dari variabel $update
        $_SESSION['pesan']='Foto Berhasil Di Update';
        echo "<script type='text/javascript'>window.location = 'setting-uploadfoto'</script>";
        // echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
}

?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body"><?php //menampilkan pesan jika ada pesan

if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
    echo '<div class="alert alert-success fade in">
<a href="#"class="close"data-dismiss="alert"aria-label="close">&times;
    </a>'.$_SESSION['pesan'].'
    </div>';

}

//mengatur session pesan menjadi kosong
$_SESSION['pesan']='';
?><div class="row">
                            <div class="col-md-4">
                                <h3>Upload Foto Profil Ukuran 3x4 </h3>
                                <form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                    <input type="file" name="foto" id="foto" accept="image/jpeg"><br><button
                                        class="btn btn-primary btn-sm" name="upload" type="submit">Upload</button>
                            </div>
                            <div class="col-md-4"><?php $profil=$koneksi->query("SELECT * FROM tb_pengguna WHERE id = '".$_SESSION['id_user']."'");

foreach ($profil as $data) {
    ?><?php $foto=$data["foto"];

    if($foto==='') {
        ?><img src="../img/anonim.png" class="profile-user-img img-square" style="width:200px"><?php
    }

    else {
        ?><img src="img/user/<?php echo $data['foto'];?>" class="profile-user-img img-square" style="width:200px"><?php
    }

    ;
    ?><?php
}

?></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

</div>
<?php include "global_footer.php";
?>