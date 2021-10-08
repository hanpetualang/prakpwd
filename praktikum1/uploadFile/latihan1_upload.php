<?php 
//Mengambil lokasi, nama, dan deskripsi file
//yang dikirim dari latihan1.php
$lokasi_file =  $_FILES['fupload']['tmp_name']; 
$nama_file   = $_FILES['fupload']['name']; 
$deskripsi   = $_POST['deskripsi']; 
 
//Menentukan lokasi akhir dimana file akan disimpan
$direktori = "D:/XAMPP/htdocs/code/prakpwd/praktikum1/uploadFile/files/$nama_file"; 

//Tampilkan notifikasi jika berhasil atau gagal
if (move_uploaded_file($lokasi_file, $direktori)){ 
    echo "Nama File: <b>$nama_file</b> berhasil di upload <br>"; 
    echo "Deskripsi File :<br>$deskripsi"; 
} 
else
    echo "File gagal diupload";  
?>