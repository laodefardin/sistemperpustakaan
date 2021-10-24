<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>REKAPITULASI SPP PER NOVEMBER 2019 </title>
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
        <h1>REKAPITULASI SPP PER <?= $_SESSION["bln"] ?> <?= $_SESSION["tahun"] ?> <br /> </h1>
    </center>

    <table width="98%" border="0" cellpadding="0" cellspacing="0" style='border-collapse:collapse;margin:0 auto'>
        <tr>
            <th rowspan='2'>No</th>
            <th rowspan='2'>Nama</th>
            <th rowspan='2'>Pinjaman Pokok</th>
            <th rowspan='2'>Jasa 1%</th>
            <th rowspan='2'>Total Bayar</th>
            <th colspan='3'>Sudah Bayar</th>
            <th colspan='3'>Sisa Pinjaman</th>
        </tr>
        <tr>
            <th>Pokok</th>
            <th>Jasa</th>
            <th>Jumlah</th>
            <th>Pokok</th>
            <th>Jasa</th>
            <th>Jumlah</th>
        </tr>
        <?php 
        include "../../koneksi.php";
        include '../lib.php';

        $bln = $_SESSION["bln"];
        $tahun = $_SESSION["tahun"];
        
        $query = $koneksi->query("SELECT ksp1.*, anggota.* FROM ksp1 INNER JOIN anggota ON ksp1.id_anggota=anggota.id_anggota  WHERE bulan = '$bln' AND tahun = '$tahun'");
        $nomor = 1;
        foreach ($query as $data): ?>
        <tr>
            <td><?= $nomor; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= rupiah($data['pinjaman_pokok']); ?></td>
            <td><?= rupiah($data['totaljasa']); ?></td>
            <td><?= rupiah($data['totalbayar']); ?></td>

            <td><?= rupiah($data['totpokok']); ?></td>
            <td><?= rupiah($data['totjasa']); ?></td>
            <td><?= rupiah($data['totpokok'] + $data['totjasa'] ); ?></td>

            <td><?= rupiah($sisapokok = $data['pinjaman_pokok']-$data['totpokok']); ?></td>
            <td><?= rupiah($sisajasa = $data['totaljasa']-$data['totjasa']); ?></td>
            <td><?= rupiah($sisapokok + $sisajasa)?></td>
        </tr>
        <?php $nomor++; endforeach; ?>
    </table>
</body>

</html>