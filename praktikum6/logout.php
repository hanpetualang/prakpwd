<?php 
    //Jalankan session
    session_start(); 

    //Hancurkan session
    //Mengosongkan data yang disimpan pada
    //variabel global (Session) lalu
    //menghancurkannya
    session_destroy(); 
    echo "Anda telah sukses keluar sistem <b><a href='form_login.php'>LOGOUT</a></b>"; 
?>