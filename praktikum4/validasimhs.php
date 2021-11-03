<html> 
   <head> 
      <style> 
         .error {color: #FF0000;} 
      </style> 
   </head> 
   <body> 
      <?php 
         // define variables and set to empty values 
         $namaErr = $genderErr = $nimErr = ""; 
         $nama = $gender = $nim = ""; 
          
         if ($_SERVER["REQUEST_METHOD"] == "POST") { 
             // Validasi nama tidak boleh kosong
            if (empty($_POST["nama"])) { 
               $namaErr = "Nama harus diisi"; 
            }else { 
               $nama = test_input($_POST["nama"]); 
            } 
             //Validasi nim harus diisi
            if (empty($_POST["nim"])) {
               $nimErr = "NIM harus diisi";
            }else { 
               $nim = test_input($_POST["nim"]); 
               // Validasi harus integer
               if (!filter_var($nim, FILTER_VALIDATE_INT)) { 
                $nimErr = "NIM tidak sesuai format";  
             } 
            } 
             //Validasi gender harus dipilih
            if (empty($_POST["gender"])) { 
               $genderErr = "Gender harus dipilih"; 
            }else { 
               $gender = test_input($_POST["gender"]); 
            } 
         } 
          
         //Hapus spasi di awal
         //Hapus simbol slah (\)
         //Cegah html merubah variabel menjadi simbol
         function test_input($data) { 
            $data = trim($data); 
            $data = stripslashes($data); 
            $data = htmlspecialchars($data); 
            return $data; 
         } 
      ?> 

      <h2>Data Mahasiswa </h2> 
      
      <p><span class = "error">* Harus Diisi.</span></p> 
      
      <form method = "post" action = "<?php  
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
         <table> 
            <tr> 
               <td>Nama:</td> 
               <td><input type = "text" name = "nama"> 
                  <span class = "error">* <?php echo $namaErr;?></span> 
               </td> 
            </tr> 
            <tr> 
               <td>NIM:</td> 
               <td> <input type = "text" name = "nim"> 
                  <span class = "error">* <?php echo $nimErr;?></span> 
               </td> 
            </tr> 
               <td>Gender:</td> 
               <td> 
                  <input type = "radio" name = "gender" value = "L">Laki-Laki 
                  <input type = "radio" name = "gender" value = "P">Perempuan 
                  <span class = "error">* <?php echo $genderErr;?></span> 
               </td> 
            </tr> 
            <td> 
               <input type = "submit" name = "submit" value = "Submit">  
            </td> 
         </table> 
      </form> 
      <?php 
         echo "<h2>Data yang anda isi:</h2>"; 
         echo $nama . "<br>"; 
         echo $nim . "<br>"; 
         echo $gender; 
      ?> 
   </body> 
</html>