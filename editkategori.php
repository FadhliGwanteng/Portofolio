<?php
include ('header.php');
include ('koneksi.php');
$id = $_GET['id_kategori'];
$sql=mysqli_query($koneksi,"SELECT * FROM kategori WHERE id_kategori='$id'");
$kategori=mysqli_fetch_array($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>
<br><br><br>
    <h3 align="center">Form Edit kategori</h3>
    <br><br>
    <form  action="simpaneditkategori.php" method="POST">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">ID Kategori</label>
  <input name ="id_kategori" type="number"  value = "<?php echo $kategori['id_kategori']?>" class="form-control" id="exampleFormControlInput1" placeholder="ID Kategori">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Kategori Buku</label>
  <input name="nama_kategori" value = "<?php echo $kategori['nama_kategori']?>"type="text" id="exampleFormControlInput1" placeholder="Kategori Buku">
</div>

<button type="submit" class="btn btn-primary">Submit</button>
<a href="kategori.php" ><button type="button" class="btn btn-danger">Batalkan</button></a>
</form>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>