<?php  
    include '../koneksi.php'; 
?> 

<h3>Form Pencarian Dengan PHP MAHASISWA</h3> 

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
        <th>Nama</th> 
    </tr> 
<?php  
    //Jika tombol cari ditekan (submit)
    if(isset($_GET['cari'])){ 
        //Dapatkan data input dari yang dicari
        $cari = $_GET['cari']; 
        // Masukkan hasil pencarian dari tabel mahasiswa dengan nama yang mengandung
        // Unsur kata dalam pencarian ke variabel $tampil
        $sql="select * from mahasiswa where nama like'%".$cari."%'"; 
        $tampil = mysqli_query($con,$sql); 
    }
    // Jika tidak ada pencarian maka masukkan semua data pada tabel mahasiswa
    // Ke variabel $tampil
    else{ 
        $sql="select * from mahasiswa"; 
        $tampil = mysqli_query($con,$sql); 
    } 
    $no = 1; 
    while($r = mysqli_fetch_array($tampil)){ 
        ?> 
            <tr> 
            <td><?php echo $no++; ?></td> 
            <td><?php echo $r['nama']; ?></td> 
            </tr> 
        <?php } ?> 
</table>