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

    <h1 align ="center">Data Artikel</h1>
    <div>
      <a href="index.php"><button
        type="button"
        class="btn-close"
        aria-label="Close"
        style="float: right"
      ></button></a>
    </div>
    <br>
    
    <br>

    

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
          
         
        </tr>
      </thead>
      <tbody>
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
        </tr>
        <?php
        $nomor++;
        }
        ?>
        
</tbody>
</table> 
  