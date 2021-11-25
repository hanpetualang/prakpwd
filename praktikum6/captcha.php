<?php
    //Jalankan fungsi session
    session_start(); 
    //Buat angka random
    $random_alpha = md5(rand()); 
    //Potong angka random dari 0 hingga 6
    //Untuk dijadikan captcha
    $captcha_code = substr($random_alpha, 0, 6); 
    //Masukkan captcha ke variabel global
    $_SESSION["captcha_code"] = $captcha_code;
    //Jadikan angka random sebagai gambar 
    $target_layer = @imagecreatetruecolor(70, 30)
    or die('Cannot Initialize new GD image stream'); 
    //Buat warna background captcha
    $captcha_background = imagecolorallocate($target_layer, 255, 160, 119); 
    imagefill($target_layer,0,0,$captcha_background); 
    //Buat warna text captcha
    $captcha_text_color = imagecolorallocate($target_layer, 0, 0, 0); 
    imagestring($target_layer, 5, 5, 5, $captcha_code, $captcha_text_color); 
    //Definisikan jenis file sebagai jpeg
    header("Content-type: image/jpeg"); 
    //Tampilkan gambar captcha
    imagejpeg($target_layer); 
?>
