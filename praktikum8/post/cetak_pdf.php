<?php 
    // memanggil library FPDF 
    require('../fpdf/fpdf.php'); 
    // intance object dan memberikan pengaturan halaman PDF 
    $pdf = new FPDF('l','mm','A5'); 
    // membuat halaman baru 
    $pdf->AddPage(); 
    // setting jenis font yang akan digunakan 
    $pdf->SetFont('Arial','B',16); 
    // mencetak string  
    $pdf->Cell(190,7,'PROGRAM STUDI TEKNIK INFORMATIKA',0,1,'C'); 
    $pdf->SetFont('Arial','B',12); 
    $pdf->Cell(190,7,'DAFTAR MAHASISWA MAKUL PEMROGRAMAN WEB DINAMIS',0,1,'C'); 
    
    // Memberikan space kebawah agar tidak terlalu rapat 
    $pdf->Cell(10,7,'',0,1); 
    
    // Buat Font menjadi Bold
    $pdf->SetFont('Arial','B',10); 
    // Tuliskan string ke kolom
    // Dengan aturan Cell(Panjang, Tinggi, Text, Border)
    $pdf->Cell(20,6,'NIM',1,0); 
    $pdf->Cell(50,6,'NAMA MAHASISWA',1,0); 
    $pdf->Cell(25,6,'J KEL',1,0); 
    $pdf->Cell(50,6,'ALAMAT',1,0); 
    $pdf->Cell(30,6,'TANGGAL LHR',1,1); 
    // Hilangkan format Bold
    $pdf->SetFont('Arial','',10); 
    
    // Panggil file untuk koneksi ke database
    include '../../koneksi.php'; 
    // Ambil data rai tabel mahasiswa
    $mahasiswa = mysqli_query($con, "select * from mahasiswa"); 
    // Massukkan data dari tabel mahasiswa ke pdf
    while ($row = mysqli_fetch_array($mahasiswa)){ 
        $pdf->Cell(20,6,$row['nim'],1,0); 
        $pdf->Cell(50,6,$row['nama'],1,0); 
        $pdf->Cell(25,6,$row['jkel'],1,0); 
        $pdf->Cell(50,6,$row['alamat'],1,0); 
        $pdf->Cell(30,6,$row['tgllhr'],1,1);  
    } 
    
    // Cetak / download pdf
    $pdf->Output('', 'post8.pdf'); 
?>