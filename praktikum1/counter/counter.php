<?php
//Inisialisasi file yang akan digunakan untuk penghitung
$filecounter="counter.txt"; 
//Buka file untuk read dan write
$fl=fopen($filecounter,"r+");
//Baca file lalu masukkan ke variabel hit 
$hit=fread($fl,filesize($filecounter)); 
 
//Membuat tabel
echo "<table width=250 align=center border=1 cellspacing=0 cellpadding=0 bordercolor=#0000FF'><tr>"; 
echo "<td width=250 valign=middle align=center>"; 
echo "<font face=verdana size=2 color=#FF0000><b>"; 

//Menampilkan isi file
echo "Anda pengunjung yang ke:"; 
echo $hit; 
echo "</b></font>"; 
echo "</td>"; 
echo "</tr></table>"; 

//Tutup file
fclose($fl); 

//Buka file untuk write
$fl=fopen($filecounter,"w+");
//Tambahkan variabel counter dengan 1 
$hit=$hit+1; 
//Tulis ulang file counter.txt
//Ganti isi counter.txt dengan variabel hit yang ditambahkan 1
fwrite($fl,$hit,strlen($hit)); 
//Tutup file
fclose($fl); 
?>