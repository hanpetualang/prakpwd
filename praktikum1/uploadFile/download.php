<?php
//Menentukan direktori yang akan dibaca
$myDir = "D:/XAMPP/htdocs/code/prakpwd/praktikum1/uploadFile/files/"; 
//Buka isi direktori
$dir = opendir($myDir); 
echo "Isi folder (klik link untuk download : <br>"; 
//Tampilkan isi direktori sampai habis
//Buat link ke file
//Karena pada program saya disimpan pada folder files maka
//ditambahkan files pada awal link
while($tmp = readdir($dir))
    echo "<a href='files/$tmp' target='_blank'>$tmp</a><br>";  
closedir($dir); 
?>