<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Artikel</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>
  
</body>
</html>

<?php 
      include 'koneksi.php';
?>

    <!-- 
    
    <br>
    
    <br> -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">My Artikel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="Homeadmin.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="dataartikel.php">Artikel</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <h1 align ="center">Data Artikel</h1>
<br><br><br>
<div>
      <a href="Homeadmin.php"><button
        type="button"
        class="btn-close"
        aria-label="Close"
        style="float: right"
      ></button></a>
    </div>
    <div class="container-lg">
        <table class="table-bordered">
    <script src="js/boostrap.bundle.min.js"></script>
    <table class="table table-striped table-hover">
      <thead class="table-dark">
      <tr>
          <th scope="col">Nomor</th>
          <th scope="col">Judul</th>
          <th scope="col">Tanggal Publish</th>
          <th scope="col">Kategori</th>
          <th scope="col">Isi Artikel</th>
          <th scope="col">Status Aktif</th>
          <th scope="col">Cover</th>
          <th scope="col">Action</th>
          
        </tr>
      </thead>
      <tbody>
      <a href="tambahartikel.php" ><button type="button" class="btn btn-primary">Tambah Data</button></a>
      
      <?php 
        $blog = mysqli_query($koneksi,"SELECT artikel.id_artikel, artikel.cover, artikel.judul, artikel.isi_artikel,artikel.status_aktif ,artikel.tanggal_publish, kategori.nama_kategori  
        FROM artikel
        JOIN kategori ON artikel.id_kategori = kategori.id_kategori;");
        $nomor = 1;
        while($row = mysqli_fetch_array($blog)){
          ?>
      <tr>
        <tr>
        <td> <?php echo $nomor;?></td>

        <td><?php echo $row['judul'];?></td>
        <td><?php echo $row['tanggal_publish'];?></td>
        <td><?php echo $row['nama_kategori'];?></td>
        <td><?php echo $row['isi_artikel'];?></td>
        <td><?php echo $row['status_aktif'];?></td>
        <td><img src="cover/<?php echo $row['cover']?> "width="100"></td>
      
        
          <td>
           
            <div class="d-flex gap-2">
            <a href="editartikel.php?id_artikel=<?php echo $row ['id_artikel'];?>" ><button type="button" class="btn btn-primary">Edit Data</button></a>

            <a href="deleteartikel.php?id_artikel=<?php echo $row['id_artikel'] ?> "class="btn btn-outline-danger" 
            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
            
          </td>
        </tr>
        <?php
        $nomor++;
        }
        ?>
        
</tbody>
</table> 
  



