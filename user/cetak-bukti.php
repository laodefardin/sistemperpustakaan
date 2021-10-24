<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Bukti Peminjaman Buku</title>
</head>

<body onload="window.print()">
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            /* margin: 20px auto; */
            border-collapse: collapse;
        }

        table th,
        table td {
            /* border: 1px solid #3c3c3c; */
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>

  
    <center>
        <h3>Bukti Peminjaman Buku
            <br /><br /><br /></h3>

    </center>

    <table width="98%" border="1" cellpadding="0" cellspacing="0" style='border-collapse:collapse;margin:0 auto'>
        <?php 
        include "../koneksi.php";
        
        $id = $_GET['id'];

            $query = "SELECT * FROM tb_transaksi WHERE status = 'Belum diambil' AND id = '$id'";
            $data = mysqli_query($koneksi,$query);
        
        $no = 1;
		while($d = mysqli_fetch_array($data)){
		?>

        <tr>
            <td><strong>Hari & Tanggal Peminjaman</strong></td>
            <td><?= $d['tanggal_pinjam']; ?></td>
        </tr>
        <tr>
            <td><strong>Nama Peminjam</strong></td>
            <td><?= $d['nama']; ?></td>
        </tr>
        <tr>
            <td style="width: 250px;"><strong>Status buku</td>
            <td><h3> Buku Belum Di ambil</h3>
            <em>Silahkan membawa bukti ini ke perpustakaan, untuk mengambil buku yg anda pinjam</em>
            </td>
        </tr>


        <!-- 
        
        <tr>
            <td><?= $no++; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php
            $status = $d['status'];
            if ($status == '1'){
                echo "Sudah Dikembalikan";
            }else{
                echo "Belum Dikembalikan";
            }
            ?></td>
        </tr> -->


    </table>
    <br>

    <em>Peminjam setuju untuk mengembalikan semua pinjaman setelah kerja sama berakhir atau diputuskan dari satu atau
        kedua belah pihak dalam keadaan baik. Peminjam menyanggupi penggantian bila terjadi kehilangan dan
        kerusakan.</em>
    <br> <br> <br>

    <table width="98%" cellpadding="0" cellspacing="0" style='border-collapse:collapse;margin:0 auto'>
        <tr>
            <td><br></td>
            <td style="padding-left: 200px;"> Mengetahui :</td>
        </tr>
        <tr>
            <td> <strong>Peminjam</strong></td>
            <td style="padding-left: 200px;"><strong>Kepala Perpustakaan</strong></td>
        </tr>
        <tr>
            <td><br></td>
            <td style="padding-left: 200px;"></td>
        </tr>
        <tr>
            <td><br></td>
            <td style="padding-left: 200px;"></td>
        </tr>
        <tr>
            <td> <strong><?= $d['nama']; ?></strong></td>
            <td style="padding-left: 200px;"><strong>Nama Kepala Perpustakaan</strong></td>
        </tr>
    </table><br>

    <?php 
		}
		?>
</body>

</html>