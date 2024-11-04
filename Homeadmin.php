<?php include('koneksi.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artikel</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .main-content {
            transition: margin-left 0.3s; /* Animasi saat sidebar dibuka/tutup */
            margin-left: 0; /* Margin default */
        }

        .sidebar-open .main-content {
            margin-left: 250px; /* Ubah ini sesuai dengan lebar sidebar */
        }

        .sidebar-open .welcome-title {
            margin-left: 250px; /* Ubah ini sesuai dengan lebar sidebar */
            transition: margin-left 0.3s; /* Animasi saat sidebar dibuka/tutup */
        }
    </style>
</head>

<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
    <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
    <a href="index.php" class="w3-bar-item w3-button">Home</a>
    <div class="w3-dropdown-hover">
        <button class="w3-button">Artikel</button>
        <div class="w3-dropdown-content w3-bar-block">
            <a href="tambahartikel.php" class="w3-bar-item w3-button">Tambah Artikel</a>
            <a href="dataartikel.php" class="w3-bar-item w3-button">Data Artikel</a>
        </div>
    </div>
    <div class="w3-dropdown-hover">
        <button class="w3-button">Kategori</button>
        <div class="w3-dropdown-content w3-bar-block">
            <a href="tambahkategori.php" class="w3-bar-item w3-button">Tambah Kategori</a>
            <a href="kategoriadmin.php" class="w3-bar-item w3-button">Data Kategori</a>
        </div>
    </div>
   
    <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
</div>

<!-- Page Content -->
<div class="w3-teal">
    <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
    <div class="w3-container">
        <h1 class="welcome-title">Welcome My Artikel</h1>
    </div>
</div>
<br><br><br>
<div class="container main-content">
    <div class="row">
        <?php
        // Fetch articles from the database
        $query = "SELECT * FROM artikel LIMIT 3"; // Fetch the first 9 articles
        $result = $koneksi->query($query);

        if ($result->num_rows > 0) {
            // Output data for each article
            while ($artikel = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="cover/<?php echo htmlspecialchars($artikel['cover']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($artikel['judul']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($artikel['judul']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($artikel['isi_artikel']); ?></p> <!-- Assuming you have a description field -->
                            <a href="detailartikel.php?id=<?php echo $artikel['id_artikel']; ?>" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>No articles found.</p>";
        }
        ?>
    </div>
</div>

<div class="fixed-bottom mb-5">
    <a href="https://api.whatsapp.com/send/?phone=628815728991">
        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/WhatsApp_icon.png" width="100" height="100" />
    </a>
</div>

<script>
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.body.classList.add('sidebar-open'); // Tambahkan class ke body
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.body.classList.remove('sidebar-open'); // Hapus class dari body
    }
</script>

<?php include('footer.php'); ?>
</body>
</html>
