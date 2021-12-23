<?php
    //Definisikan url untuk web service
    $url = "http://localhost:4443/code/prakpwd/praktikum10/getdatamhs.php";
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
    echo "<p>";
    echo "NIM : " . $r->nim . "<br />";
    echo "Nama : " . $r->nama . "<br />";
    echo "jenis kel : " . $r->jkel . "<br />";
    echo "Alamat : " . $r->alamat . "<br />";
    echo "Tgl Lahir : " . $r->tgllhr . "<br />";
    echo "</p>";
}