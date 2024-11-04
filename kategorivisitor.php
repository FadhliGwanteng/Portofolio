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
  
  <nav class="navbar navbar-expand-lg navbar-secondary bg-secondary">
    <div class="container">
      <a class="navbar-brand" href="kategorivisitor.php">Kategori Management</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <!-- Add more nav items here as needed -->
        </ul>
      </div>
    </div>
  </nav>

  <?php include('koneksi.php'); ?>

  <div class="container">
    <h3 class="text-center">Tabel Kategori</h3>
    <div>
      <a href="index.php">
        <button type="button" class="btn btn-danger btn-close" aria-label="Close"></button>
      </a>
    </div>
    
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">ID Kategori</th>
          <th scope="col">Nama Kategori</th>
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
          </tr>
        <?php
            $nomor++;
          }
        ?>
      </tbody>
    </table>
  </div>
  <!-- footer -->
  
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
