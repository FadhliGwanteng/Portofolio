<?php
include('koneksi.php'); // Menghubungkan ke database

// Mengambil ID kategori dari URL
$id_kategori = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Query untuk mengambil kategori berdasarkan ID
$kategori_query = "SELECT * FROM kategori WHERE id_kategori = $id_kategori";
$kategori_result = $koneksi->query($kategori_query);
$kategori = $kategori_result->fetch_assoc();

// Query untuk mengambil artikel berdasarkan kategori
$sql = "SELECT * FROM artikel WHERE id_kategori = $id_kategori";
$artikel_result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo htmlspecialchars($kategori['nama_kategori']); ?> - My Artikel</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.jpg" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">My Artikel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php">Kategori</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder"><?php echo $kategori['nama_kategori']; ?></h1>
                <p class="lead mb-0">Artikel terkait kategori ini</p>
            </div>
        </div>
    </header>

    <div class="container main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php
                    if ($artikel_result->num_rows > 0) {
                        // Output data untuk setiap artikel
                        while ($artikel = $artikel_result->fetch_assoc()) {
                            ?>
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="cover/<?php echo htmlspecialchars($artikel['cover']); ?>" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo htmlspecialchars($artikel['judul']); ?></h5>
                                        <p class="card-text"><?php echo substr(htmlspecialchars($artikel['isi_artikel']), 0, 100); ?>...</p>
                                        <a href="detailartikel.php?id=<?php echo $artikel['id_artikel']; ?>" class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<p>No articles found in this category.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; My Website 2024</p>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
