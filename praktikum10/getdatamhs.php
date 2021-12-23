<?php
    //Panggil file untuk koneksi
    require_once "../koneksi.php";
    //Buat query untuk mengambil data dari db
    $sql = "select * from mahasiswa";
    //Jalankan query
    $query = mysqli_query($con,$sql);
    //Masukkan setiap baris data yang didapat kedalam
    //Array $data
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row;
    }
    //Deskripsikan jenis isi konten adalah json
    header('content-type: application/json');
    //Tampilkan data yang didapat kedalam format json
    echo json_encode($data);
    mysqli_close($con);
?>