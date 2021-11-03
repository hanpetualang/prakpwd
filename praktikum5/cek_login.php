<?php 
    //Memanggil file koneksi database
    //Digunakan ketika akan melakukan query
    include "koneksi.php"; 

    //Menyimpan data yang dikirimkan dari form_login
    $id_user = $_POST['id_user']; 
    $pass=md5($_POST['paswd']); 

    //Mencocokkan data yang diinputkan user dengan yang ada pada database
    $sql="SELECT * FROM users WHERE id_user='$id_user' AND password='$pass'"; 

    //Jalankan query dengan menggunakan variabel $conn pada
    //file koneksi.php sebagai media penghubungnya
    $login=mysqli_query($con,$sql); 

    //Jika terdapat data yang sama pada database maka akan ditampung
    $ketemu=mysqli_num_rows($login); 
    //Memgambil kolom pada database kemudian disimpan pada array $r
    $r= mysqli_fetch_array($login); 

    //Jika variabel ketemu tidak kosong (ditemukan data)
    if ($ketemu > 0){ 
        //Jalankan sesson
        session_start(); 

        //Simpan user dan password pada session
        $_SESSION['iduser'] = $r['id_user']; 
        $_SESSION['passuser'] = $r['password']; 

        //Tampilkan user dan password yang disimpan pada session
        echo"USER BERHASIL LOGIN<br>"; 
        echo "id user =",$_SESSION['iduser'],"<br>"; 
        echo "password=",$_SESSION['passuser'],"<br>"; 
        echo "<a href=logout.php><b>LOGOUT</b></a></center>"; 
    } 
    else{ 
        echo "<center>Login gagal! username & password tidak benar<br>"; 
        echo "<a href=form_login.php><b>ULANGILAGI</b></a></center>"; 
    } 
    
    //Putuskan koneksi dengan database
    mysqli_close($con); 
?>