<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kategori</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="Homeadmin.php">My Artikel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="homeuser.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="dataartikeluser.php">Artikel</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <h3 align="center">Form Tambahkan Artikel</h3>
    <br><br>
    <form action="simpanartikel.php" enctype="multipart/form-data" method="POST" >
    <div class="mb-3">
  <label for="judulbuku" class="form-label">ID Artikel</label>
  <input type="number"  name="id_artikel" class="form-control" id="exampleFormControlInput1" placeholder="ID Artikel">
</div>
  <div class="mb-3">
  <label for="judulbuku" class="form-label">Judul Artikel</label>
  <input type="text"  name="judul" class="form-control" id="exampleFormControlInput1" placeholder="Judul Artikel">
</div>
<div>
        <label for="exampleFormControlInput1" class="form-label">Kategori Artikel</label>
    
    <select class="form-select" name="id_kategori" aria-label="Default select example">
          
          <?php 
          $kategori = mysqli_query($koneksi,"select * from kategori");
          while($row = mysqli_fetch_array($kategori)){
            
            ?>
        <option name="nama_kategori" value="<?php echo $row['id_kategori']?>"><?php echo $row['nama_kategori']?></option>
        <?php 
      }
      ?>
    </select>
    </div>
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Tanggal Publish</label>
  <input type="date" name = "tanggal_publish" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Status Aktif</label>
  <input type="text" name = "status_aktif" class="form-control" id="exampleFormControlInput1" placeholder="status Aktif">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Isi Artikel</label>
  <textarea class="form-control" name="isi_artikel" id="exampleFormControlTextarea1" rows="6" placeholder="Masukan Deskripsi Buku"></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Cover Buku</label>
  <input type="file" name="cover" class="form-control" id="exampleFormControlInput1" placeholder="Cover Buku">
</div>

<button type="submit" class="btn btn-primary">Submit</button>
 
<a href="dataartikel.php" ><button type="button" class="btn btn-danger">Batalkan</button></a>
</form>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>