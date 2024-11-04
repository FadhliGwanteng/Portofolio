<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kategori</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      margin-top: 20px;
    }
    h3 {
      margin-bottom: 20px;
    }
    .btn-close {
      float: right;
      margin-top: -10px;
    }
    /* Add this CSS rule for the table header */
    thead {
      background-color: #000; /* Black background */
      color: #fff; /* White text */
    }
  </style>
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
                    <li class="nav-item"><a class="nav-link" href="Homeadmin.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="kategoriadmin.php">Kategori</a></li>
                </ul>
            </div>
        </div>
    </nav>
  <?php include('koneksi.php'); ?>

  <div class="container">
    <h3 class="text-center">Tabel Kategori</h3>
    <div>
      <a href="Homeadmin.php">
        <button type="button" class="btn btn-danger btn-close" aria-label="Close"></button>
      </a>
    </div>
    
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">ID Kategori</th>
          <th scope="col">Nama Kategori</th>
          <th scope="col">Action </th>
        </tr>
      </thead>
      <tbody>
        
        <?php
          $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
          $nomor = 1;
          while ($row = mysqli_fetch_array($kategori)) {
        ?>
          <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo htmlspecialchars($row['nama_kategori']); ?></td>
            <td>
           
            <div class="d-flex gap-2">
            <a href="editkategori.php?id_kategori=<?php echo $row ['id_kategori'];?>" ><button type="button" class="btn btn-primary">Edit Data</button></a>

            <a href="deletekategori.php?id_kategori=<?php echo $row['id_kategori'] ?> "class="btn btn-outline-danger" 
            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
            
          </td>
          </tr>
        <?php
            $nomor++;
          }
        ?></td>
        
      </tbody>
      
    </table>
    
  </div>
  
  <!-- footer -->
  
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
