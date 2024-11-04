<?php
include 'koneksi.php';
$id = $_GET['id_artikel'];
$sql = mysqli_query($koneksi, "select * from artikel where id_artikel='$id'");
$artikel = mysqli_fetch_array($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center mb-4">Edit Artikel</h1>
    <form action="simpaneditartikel.php"enctype="multipart/form-data"  method="POST">

    <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input name="id_artikel" value="<?php echo $artikel['id_artikel']?>" type="text"  class="form-control" id="formGroupExampleInput" placeholder="tambahkan ID">
    </div>

      <div class="mb-3">
        <label for="judul" class="form-label">Judul </label>
        <input  value="<?php echo $artikel['judul']?>" type="text" name="judul" class="form-control" id="formGroupExampleInput" placeholder="tambahkan judul">
    </div>
   
<div class="mb-3">
        <label for="tanggal_publish" class="form-label">Tanggal Publish</label>
        <input  value="<?php echo $artikel['tanggal_publish']?>" type="date" name="tanggal_publish" class="form-control" id="formGroupExampleInput" placeholder="tambahkan Tanggal">
    </div>
    <div class="mb-3">
        <label for="kategori" class="form-label">Kategori Artikel</label>
        <select name="id_kategori" class="form-control">
            <?php
            $kategori = mysqli_query($koneksi, "select * from kategori");
            while($k=mysqli_fetch_array($kategori)){
                echo "<option value='".$k['id_kategori']."' ";
                echo $k['id_kategori']==$artikel['id_kategori']?'selected':'';
                echo ">".$k['nama_kategori']."</option>";
            }
            ?>
        </select>
      </div>
      
      <div class="mb-3">
        <label for="isi_artikel" class="form-label">Isi Artikel</label>
        <textarea name="isi_artikel" class="form-control" id="isi_artikel" rows="7" placeholder="Masukan isi_artikel   Buku"><?php echo $artikel['isi_artikel']?></textarea>
      </div>
          <div class="mb-3">
            <label for="cover" class="form-label">cover</label>
            <input type="file" name="cover" value="cover/" class="form-control" id="cover" placeholder="tambahkan cover">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">user_id</label>
            <input type="text" value="<?php echo $artikel['id_user']?>" name="id_user" class="form-control" id="formGroupExampleInput" placeholder="tambahkan user_id">
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">status_aktif</label>
            <input type="text"  value="<?php echo $artikel['status_aktif']?>" name="status_aktif" class="form-control" id="formGroupExampleInput" placeholder="tambahkan status_aktif">
          </div>

          <button type="submit" class="btn btn-primary btn-sm">Submit</button>
          <a href="homeadmin.php"><button class="btn btn-danger btn-sm">Batalkan</button></a>
        </form>
        
    
    <script src="js/bootstrap.bundle.js"></script>