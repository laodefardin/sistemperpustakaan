<?php
// Load file koneksi.php
include "../../koneksi.php";
session_start();
$bln = $_SESSION["bln"];
$tahun = $_SESSION["thn"];

// Load plugin PHPExcel nya
require_once 'PHPExcel/PHPExcel.php';

// Panggil class PHPExcel nya
$excel = new PHPExcel();

// Settingan awal fil excel
$excel->getProperties()->setCreator('Laode Fardin')
					   ->setLastModifiedBy('Laode Fardin')
					   ->setTitle("Data Laporan $bln $tahun")
					   ->setSubject("Laporan")
					   ->setDescription("Laporan Semua Data")
					   ->setKeywords("Data Laporan $bln $tahun");

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

$excel->setActiveSheetIndex(0)->setCellValue('A2', "LAPORAN DATA BUKU"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('A2:I2'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(11); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
if ($bln == 'all') {
	$excel->setActiveSheetIndex(0)->setCellValue('A3', "TAHUN $_SESSION[thn]");
}else{
$excel->setActiveSheetIndex(0)->setCellValue('A3', "BULAN $_SESSION[bln] TAHUN $_SESSION[thn]"); 
}
// Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('A3:I3'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(11); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

// Buat header tabel nya pada baris ke 3
$excel->setActiveSheetIndex(0)->setCellValue('A5', "No."); // Set kolom A3 dengan tulisan "NO"
$excel->getActiveSheet()->mergeCells('A5:A6');
$excel->setActiveSheetIndex(0)->setCellValue('B5', "Judul"); // Set kolom B3 dengan tulisan "NIS"
$excel->getActiveSheet()->mergeCells('B5:B6');
$excel->setActiveSheetIndex(0)->setCellValue('C5', "Pengarang"); // Set kolom C3 dengan tulisan "NAMA"
$excel->getActiveSheet()->mergeCells('C5:C6');
$excel->setActiveSheetIndex(0)->setCellValue('D5', "Penerbit"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$excel->getActiveSheet()->mergeCells('D5:D6');
$excel->setActiveSheetIndex(0)->setCellValue('E5', "Tahun Terbit"); // Set kolom E3 dengan tulisan "TELEPON"
$excel->getActiveSheet()->mergeCells('E5:E6');
$excel->setActiveSheetIndex(0)->setCellValue('F5', "ISBN"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->getActiveSheet()->mergeCells('F5:F6');
$excel->setActiveSheetIndex(0)->setCellValue('G5', "Jumlah Buku"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->getActiveSheet()->mergeCells('G5:G6');
$excel->setActiveSheetIndex(0)->setCellValue('H5', "Lokasi Buku"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->getActiveSheet()->mergeCells('H5:H6');
$excel->setActiveSheetIndex(0)->setCellValue('I5', "Tanggal Input"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->getActiveSheet()->mergeCells('I5:I6');


// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('G5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('H5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('I5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('A6')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B6')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C6')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D6')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E6')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F6')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('G6')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('H6')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('I6')->applyFromArray($style_col);

// Set height baris ke 1, 2 dan 3
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);

// // Buat query untuk menampilkan semua data siswa

if ($bln == 'all') {
	$sql = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE YEAR(tanggal_input) = '$tahun'");
}else{
	$sql = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE MONTH(tanggal_input) = '$bln' and YEAR(tanggal_input) = '$tahun'");
}
$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 7; // Set baris pertama untuk isi tabel adalah baris ke 4
foreach ($sql as $data) {// Ambil semua data dari hasil eksekusi $sql
    $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['judul']);
	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['pengarang']);
	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['penerbit']);	
	$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['tahun_terbit']);
	$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, number_format($data['isbn']));
	$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['jumlah_buku']);
	$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['lokasi']);
	$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data['tanggal_input']);
	
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

	// $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
	
	$no++; // Tambah 1 setiap kali looping
	$numrow++; // Tambah 1 setiap kali looping
}

// Set width kolom
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(35); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom E

// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("Laporan Data Buku");
$excel->setActiveSheetIndex(0);

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Laporan Data Buku Bulan '.$bln.' Tahun '.$tahun.'.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>
