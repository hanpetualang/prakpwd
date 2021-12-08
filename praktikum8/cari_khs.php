<?php  
    include '../koneksi.php'; 
?> 

<h3>Form Pencarian DATA KHS Dengan PHP </h3> 

<form action="" method="get"> 
    <label>Cari :</label> 
    <input type="text" name="cari"> 
    <input type="submit" value="Cari"> 
</form> 

<?php  
    if(isset($_GET['cari'])){ 
        $cari = $_GET['cari']; 
        echo "<b>Hasil pencarian : ".$cari."</b>"; 
    } 
?> 

<table border="1"> 
<tr> 
    <th>No</th> 
    <th>NIM</th>
    <th>Nama Mahasiswa</th> 
    <th>Daftar Kode MK</th> 
    <th>Nama MK</th> 
    <th>Nilai</th> 

</tr> 
<?php  
    // Jika tombol pencarian ditekan
    if(isset($_GET['cari'])){ 
        // Tampung kata yang akan dicari
        $cari = $_GET['cari']; 
        // Cari dari tabel khs dengan nim sesuai inputan
        // Simpan ke variabel tampil
        $sql=
        "SELECT * FROM KHS RIGHT JOIN mahasiswa ON mahasiswa.nim = khs.nim
         INNER JOIN matakuliah ON matakuliah.kode = khs.kodemk
        WHERE mahasiswa.nim = '".$cari."'"; 
        $tampil = mysqli_query($con,$sql); 
    }
    // Jika tidak ada pencaria maka tampilkan semua data
    // Dari tabel KHS
    else{ 
        $sql=
        "SELECT * FROM KHS RIGHT JOIN mahasiswa ON mahasiswa.nim = khs.nim 
         LEFT JOIN matakuliah ON matakuliah.kode = khs.kodemk"; 
        $tampil = mysqli_query($con,$sql); 
    } 
    $no = 1; 
    while($r = mysqli_fetch_array($tampil)){ 
?> 
        <tr> 
        <td><?php echo $no++; ?></td> 
        <td><?php echo $r['nim']; ?></td> 
        <td><?php echo $r['nama']; ?></td> 
        <td><?php echo $r['kodemk']; ?></td> 
        <td><?php echo $r['namamk']; ?></td> 
        <td><?php echo $r['nilai']; ?></td> 
        </tr> 
<?php } ?> 
</table>