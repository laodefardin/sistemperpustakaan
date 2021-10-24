<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>REKAPITULASI SPP PER <?= $_SESSION["bln"] ?> <?= $_SESSION["thn"] ?> </title>
</head>

<body onload="window.print()">
    <style type="text/css">
        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }

        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 9pt "Tahoma";

        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        @page {
            size: A4 landscape;
            margin: 0;
        }
    </style>
    </style>

    <center>
        <h1>REKAPITULASI SPP PER <?= $_SESSION["bln"] ?> <?= $_SESSION["thn"] ?> <br /> 
    <?php
    $bln = $_SESSION["bln"];
        $tahun = $_SESSION["thn"];
    echo "SELECT * FROM tb_buku WHERE MONTH(tanggal_input) = '$bln' and YEAR(tanggal_input) = '$tahun'"?>
    </h1>
    </center>

    <table width="98%" border="0" cellpadding="0" cellspacing="0" style='border-collapse:collapse;margin:0 auto'>
        <tr>
            <th rowspan='2'>No</th>
            <th rowspan='2'>Judul</th>
            <th rowspan='2'>Pengarang</th>
            <th rowspan='2'>Tahun Terbit</th>
            <th rowspan='2'>ISBN</th>
            <th colspan='3'>Jumlah Buku</th>
            <th colspan='3'>Lokasi Buku</th>
            <th colspan='3'>Tanggal Input</th>
        </tr>
        <?php 
        include "../../koneksi.php";

        
        
        $query = $koneksi->query("SELECT * FROM tb_buku WHERE MONTH(tanggal_input) = '$bln' and YEAR(tanggal_input) = '$tahun'");
        $nomor = 1;
        foreach ($query as $data): ?>
        <tr>
            <td><?= $nomor; ?></td>
            <td><?= $data['judul']; ?></td>
            <td><?= $data['pengarang']; ?></td>
            <td><?= $data['penerbit']; ?></td>
            <td><?= $data['tahun_terbit']; ?></td>
             <td><?= $data['isbn']; ?></td>
        <?php $nomor++; endforeach; ?>
    </table>
</body>

</html>