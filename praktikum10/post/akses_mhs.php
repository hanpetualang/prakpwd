<?php
    //Definisikan url untuk web service
    $cr='NIM';
    if(isset($_POST['searchButton'])){
        $cr = empty($_POST['nim']) ? 'NIM' : strtoupper($_POST['nim']);
        $url = "http://localhost:4443/code/prakpwd/praktikum10/post/getdatamhs.php?nim=" . $_POST['nim'];
        error_reporting(0);
    }
    else
        $url = "http://localhost:4443/code/prakpwd/praktikum10/post/getdatamhs.php";
?>
<div>
    <h3>Cari Mahasiswa [<?=$cr?>]</h3>
    <form action="#" method="post">
        <input name='nim' type="text">
        <button name='searchButton'>Cari</button>
    </form>
</div>
<?php
    

    //Buat http request ke url web service
    $client = curl_init($url);
    
    //Set option data dikembalikan sebagai string
    curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
    
    //simpan hasil ke variabel response
    $response = curl_exec($client);
    
    //Dekode dari format json menjadi array
    //Simpan ke variabel result
    $result = json_decode($response);
    
    //Tampilkan data yang didapat
    foreach ($result as $r) {
    echo "<p><table>";
    echo "<tr><td>NIM </td><td>" . $r->nim . "</td></tr>";
    echo "<tr><td>Nama </td><td>" . $r->nama . "</td></tr>";
    echo "<tr><td>jenis kel </td><td>" . $r->jkel . "</td></tr>";
    echo "<tr><td>Alamat </td><td>" . $r->alamat . "</td></tr>";
    echo "<tr><td>Tgl Lahir </td><td>" . $r->tgllhr . "</td></tr>";
    echo "<tr><td>Email </td><td>" . $r->email . "</td></tr>";
    echo "</p>";
}