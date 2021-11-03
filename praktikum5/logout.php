<?php 
    //Jalankan session
    session_start(); 

    //Hancurkan session
    //Mengosongkan data yang disimpan pada
    //variabel global (Session) lalu
    //menghancurkannya
    session_destroy(); 
    echo "Anda telah sukses keluar sistem <b>LOGOUT</b>"; 
?>