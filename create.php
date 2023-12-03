<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    
    include "koneksi.php";

    
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $npm=input($_POST["npm"]);
        $nama=input($_POST["nama"]);
        $kelas=input($_POST["kelas"]);
        $no_hp=input($_POST["no_hp"]);
        $jurusan=input($_POST["jurusan"]);

        
        $sql="insert into mahasiswa (npm,nama,kelas,no_hp,jurusan) values
		('$npm','$nama','$kelas','$no_hp','$jurusan')";

        
        $hasil=mysqli_query($kon,$sql);

        
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>NPM:</label>
            <input type="text" name="npm" class="form-control" placeholder="Masukan NPM" required />

        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required/>
        </div>
       <div class="form-group">
            <label>Kelas :</label>
            <input type="text" name="kelas" class="form-control" placeholder="Masukan Kelas" required/>
        </div>
                </p>
        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required/>
        </div>
        <div class="form-group">
            <label>Jurusan:</label>
            <textarea name="jurusan" class="form-control" rows="5"placeholder="Masukan Nama Jurusan" required></textarea>
        </div>       

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>