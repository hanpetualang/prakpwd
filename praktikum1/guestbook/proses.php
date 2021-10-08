<?php
    //Mendapatkan data yang dikirim dari tampilan.html
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $komentar = $_POST['komentar'];

    echo "<head><title>My Guest Book</head></title>"; 
    //variabel untuk menuliskan ke txt
    $fp = fopen("guestbook.txt","a+");
    //Tuliskan ke txt data yang telah didapat 
    fputs($fp,"$nama|$alamat|$email|$status|$komentar\n");
    //Tutup file 
    fclose($fp); 
    echo "Terima Kasih Atas Partisipasi Anda Mengisi Buku Tamu<br>"; 
    echo "<a href=tampilan.php> Isi Buku Tamu </a><br>"; 
    echo "<a href=lihat.php> Lihat Buku Tamu </a><br>"; 
?>