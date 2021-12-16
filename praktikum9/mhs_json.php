<?php
    //Panggil file untuk koneksi database
    include "../koneksi.php";
    //Ambil data dari tabel mahasiswa, urutkan berdasar nim
    $sql="select * from mahasiswa order by nim";
    $tampil = mysqli_query($con,$sql);
    //Jika tabel mahasiswa tidak koksong
    if (mysqli_num_rows($tampil) > 0) {
        //Buat variabel penampung array
        $response = array();
        $response["data"] = array();
        //Masukkan data dari tabel mahasiswa ke array h
        while ($r = mysqli_fetch_array($tampil)) {
            $h['nim'] = $r['nim'];
            $h['nama'] = $r['nama'];
            $h['jkel'] = $r['jkel'];
            $h['alamat'] = $r['alamat'];
            $h['tgllhr'] = $r['tgllhr'];
            //Masukkan data ke array penampung json (response)
            array_push($response["data"], $h);
        }
        //Tampilkan isi array response dengan encoding json
        echo json_encode($response);
    }
    //Jika tabel kosong maka tampilkan pesan tidak ada data
    else {
        $response["message"]="tidak ada data";
        echo json_encode($response);
    }
?>