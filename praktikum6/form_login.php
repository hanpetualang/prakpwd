<?php 
    //Buat tabel tak terlihat agar rapi dan form untuk menampung data
    //Captcha diambil dari variabel file captcha.php
    echo "<h2>Login</h2> 
    <form method=post action=cek_login.php> 
    <table>" . 
    // untuk postest
    "<tr><td>Email</td><td> : <input name='email' type='text'></td></tr> " .

    "<tr><td>Username</td><td> : <input name='id_user' type='text'></td></tr> 
    <tr><td>Password</td><td> : <input name='paswd' type='text'></td></tr>" . 
    "<tr><td>Captcha<br> 
    <img src='captcha.php' /></td><td> : <input name='captcha_code' type='text'></td></tr> 
    <tr><td colspan=2><input type='submit' value='LOGIN'></td></tr> 
    </table> 
    </form>"; 
?> 