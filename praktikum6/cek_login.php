<?php 
    //Jalankan session
    session_start(); 
    //Panggil file koneksi
    include "koneksi.php";
    //Tampung data dari form_login 
    $id_user = $_POST['id_user']; 
    
    //Tambahan untuk field email
    $email = $_POST['email'];
    
    $pass=md5($_POST['paswd']); 
    //Cocokkan dengan yang ada pada database
    $sql="SELECT * FROM users WHERE id_user='$id_user' AND password='$pass' AND email='$email'"; 

    //Jika captcha yang diinput user sesuai maka proses
    if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {          
        //Cari data username dan password pada database
        $login=mysqli_query($con,$sql); 
        $ketemu=mysqli_num_rows($login); 
        $r= mysqli_fetch_array($login); 

        //Jika terdapat data yang sesuai maka tampilkan data login berhasil
        if ($ketemu > 0){ 
            $_SESSION['iduser'] = $r['id_user']; 
            $_SESSION['passuser'] = $r['password']; 
            // 
            $_SESSION['email'] = $r['email']; 
            
            echo"USER BERHASIL LOGIN<br>"; 
            echo "id user =",$_SESSION['iduser'],"<br>"; 
            // 
            echo "email = ", $_SESSION['email'],"<br>";

            echo "password=",$_SESSION['passuser'],"<br>"; 
            echo "<a href=logout.php><b>LOGOUT</b></a></center>"; 
        } 
        //Jika terdapat data yang tidak sesuai maka tampilkan data login gagal
        else{ 
            echo "<center>Login gagal! username & password tidak benar<br>"; 
            echo "<a href=form_login.php><b>ULANGI LAGI</b></a></center>"; 
        } 
        mysqli_close($con);         
    }  
    //Jika captcha yang diinput user tidak sesuai maka hentikan proses
    //Dan tampilkan notif login gagal
    else { 
        echo "<center>Login gagal! Captcha tidak sesuai<br>"; 
        echo "<a href=form_login.php><b>ULANGI LAGI</b></a></center>";    
    } 
?> 