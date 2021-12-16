<?php
    //Panggil koneksi ke database
    include "../koneksi.php";
    //Mendefinisikan isi konten bertipe xml
    header('Content-Type: text/xml');
    //Ambil data dari tabel mahasiswa 
    $query = "SELECT * FROM mahasiswa";
    $hasil = mysqli_query($con,$query);
    // Mulai xml
    echo "<?php xml version='1.0'?>";
    //Tampilkan data dalam format xml
    echo "<data>";
    while ($data = mysqli_fetch_array($hasil))
    {
        echo "<mahasiswa>";
        echo "<nim>",$data['nim'],"</nim>";
        echo "<nama>",$data['nama'],"</nama>";
        echo "<jkel>",$data['jkel'],"</jkel>";
        echo "<alamat>",$data['alamat'],"</alamat>";
        echo "<tgllhr>",$data['tgllhr'],"</tgllhr>";
        echo "</mahasiswa>";
    }
    echo "</data>";
?>