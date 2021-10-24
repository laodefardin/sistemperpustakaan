<?php
// Load file koneksi.php
include "../../koneksi.php";
include '../lib.php';
session_start();
$nama = $_SESSION["nama"];

// Load plugin PHPExcel nya
require_once 'PHPExcel/PHPExcel.php';

// Panggil class PHPExcel nya
$excel = new PHPExcel();

// Settingan awal fil excel
$excel->getProperties()->setCreator('Laode Fardin')
					   ->setLastModifiedBy('Laode Fardin')
					   ->setTitle("Data Laporan $nama")
					   ->setSubject("Laporan")
					   ->setDescription("Laporan Semua Data")
					   ->setKeywords("Data Laporan $nama");

// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
$style_col = array(
	'font' => array('bold' => true), // Set font nya jadi bold
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	)
);

// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = array(
	'alignment' => array(
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	)
);

$excel->setActiveSheetIndex(0)->setCellValue('A2', "REKAPITULASI SPP"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('A2:L2'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(11); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
$excel->setActiveSheetIndex(0)->setCellValue('A3', "Nama $_SESSION[nama]"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('A3:L3'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(11); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

// Buat header tabel nya pada baris ke 3
$excel->getActiveSheet()->mergeCells('A5:A6');
$excel->setActiveSheetIndex(0)->setCellValue('A5', "No."); // Set kolom A3 dengan tulisan "NO"
$excel->setActiveSheetIndex(0)->setCellValue('B5', "Nama"); // Set kolom B3 dengan tulisan "NIS"
$excel->getActiveSheet()->mergeCells('B5:B6');
$excel->setActiveSheetIndex(0)->setCellValue('C5', "Pinjaman Pokok"); // Set kolom C3 dengan tulisan "NAMA"
$excel->getActiveSheet()->mergeCells('C5:C6');
$excel->setActiveSheetIndex(0)->setCellValue('D5', "Jasa 1.5%"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$excel->getActiveSheet()->mergeCells('D5:D6');
$excel->setActiveSheetIndex(0)->setCellValue('E5', "Total Bayar"); // Set kolom E3 dengan tulisan "TELEPON"
$excel->getActiveSheet()->mergeCells('E5:E6');

$excel->setActiveSheetIndex(0)->setCellValue('F5', "Sudah Bayar"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->getActiveSheet()->mergeCells('F5:H5');
$excel->setActiveSheetIndex(0)->setCellValue('F6', "Pokok"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->setActiveSheetIndex(0)->setCellValue('G6', "Jasa"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->setActiveSheetIndex(0)->setCellValue('H6', "Jumlah"); // Set kolom F3 dengan tulisan "ALAMAT"

$excel->setActiveSheetIndex(0)->setCellValue('I5', "Sisa Pinjaman"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->getActiveSheet()->mergeCells('I5:K5');
$excel->setActiveSheetIndex(0)->setCellValue('I6', "Pokok"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->setActiveSheetIndex(0)->setCellValue('J6', "Jasa"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->setActiveSheetIndex(0)->setCellValue('K6', "Jumlah"); // Set kolom F3 dengan tulisan "ALAMAT"

$excel->setActiveSheetIndex(0)->setCellValue('L5', "Tabungan"); // Set kolom B3 dengan tulisan "NIS"
$excel->getActiveSheet()->mergeCells('L5:L6');


// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('A6')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B6')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C6')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D6')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E6')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F6')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('G5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('G6')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('H5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('H6')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('I5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('I6')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('J5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('J6')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('K5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('K6')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('L5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('L6')->applyFromArray($style_col);

// Set height baris ke 1, 2 dan 3
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(15);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(15);

// // Buat query untuk menampilkan semua data siswa
$sql = mysqli_query($koneksi, "SELECT ksp15.*, anggota.* FROM ksp15 INNER JOIN anggota ON ksp15.id_anggota=anggota.id_anggota  WHERE nama = '$nama' ");

// $sql = mysqli_query($koneksi, "SELECT  FROM ksp1 WHERE bulan = $_SESSION[bln] AND tahun='$_SESSION[tahun]'");
// $data = mysqli_fetch_array($sql2);
// count($bln);
// while($data1 = mysqli_fetch_array($sql2)){
// // $loop = $data1['a'];
// }

// $loop = 100;
$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 7; // Set baris pertama untuk isi tabel adalah baris ke 4
foreach ($sql as $data) {// Ambil semua data dari hasil eksekusi $sql
    $excel->getActiveSheet()->getStyle('C')->getNumberFormat()->setFormatCode('_("Rp"* #,##0_);_("-Rp"* #,##0_);_("Rp"* "-"_-);_(@_)');
	$excel->getActiveSheet()->getStyle('D')->getNumberFormat()->setFormatCode('_("Rp"* #,##0_);_("-Rp"* #,##0_);_("Rp"* "-"_-);_(@_)');
    $excel->getActiveSheet()->getStyle('E')->getNumberFormat()->setFormatCode('_("Rp"* #,##0_);_("-Rp"* #,##0_);_("Rp"* "-"_-);_(@_)');
    $excel->getActiveSheet()->getStyle('F')->getNumberFormat()->setFormatCode('_("Rp"* #,##0_);_("-Rp"* #,##0_);_("Rp"* "-"_-);_(@_)');
    $excel->getActiveSheet()->getStyle('G')->getNumberFormat()->setFormatCode('_("Rp"* #,##0_);_("-Rp"* #,##0_);_("Rp"* "-"_-);_(@_)');
    $excel->getActiveSheet()->getStyle('H')->getNumberFormat()->setFormatCode('_("Rp"* #,##0_);_("-Rp"* #,##0_);_("Rp"* "-"_-);_(@_)');
    $excel->getActiveSheet()->getStyle('I')->getNumberFormat()->setFormatCode('_("Rp"* #,##0_);_("-Rp"* #,##0_);_("Rp"* "-"_-);_(@_)');
    $excel->getActiveSheet()->getStyle('J')->getNumberFormat()->setFormatCode('_("Rp"* #,##0_);_("-Rp"* #,##0_);_("Rp"* "-"_-);_(@_)');
    $excel->getActiveSheet()->getStyle('K')->getNumberFormat()->setFormatCode('_("Rp"* #,##0_);_("-Rp"* #,##0_);_("Rp"* "-"_-);_(@_)');


    $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['nama']);
	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['pinjaman_pokok']);
	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['totaljasa']);	
	$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['totalbayar']);

	$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['totpokok']);
	$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['totjasa']);

    
    $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, '=(F'.$numrow.'+G'.$numrow.')');
	// $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['sdh_pokok'] + $data['sdh_jasa']);

	$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $sisapokok = $data['pinjaman_pokok']-$data['totpokok']);
    $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, '=(C'.$numrow.'-F'.$numrow.')');

	$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $sisajasa = $data['totaljasa']-$data['totjasa']);
    $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, '=(D'.$numrow.'-G'.$numrow.')');

	$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $sisapokok + $sisajasa);
    $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, '=(I'.$numrow.'+J'.$numrow.')');
	
	// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);

	// $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
	
	$no++; // Tambah 1 setiap kali looping
	$numrow++; // Tambah 1 setiap kali looping
}

// Set width kolom
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); // Set width kolom C
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('K')->setWidth(15); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('L')->setWidth(15); // Set width kolom E

// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("Rekapitulasi SPP");
$excel->setActiveSheetIndex(0);

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Rekapitulasi '.$nama.'.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>
