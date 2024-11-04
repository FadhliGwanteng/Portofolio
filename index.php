<?php include('koneksi.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Welcome to My Artikel</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.jpg" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">My Artikel</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="kategorivisitor.php">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="opsilogin.php">Login </a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="dataartikelvisitor.php">Artikel</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <header class="py-5 bg-primary text-white">
    <div class="container text-center my-5">
        <h1 class="fw-bolder animate__animated animate__bounce">Welcome to My Artikel</h1>
        <p class="lead mb-0">Berbagi cerita dan pengetahuan</p>
    </div>
</header>

<!-- Tambahkan CSS Animasi -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    </header>

    <!-- Page content-->
    <div class="container main-content">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <div class="row">
                    <?php
                    // Handle search query
                    $search_query = isset($_GET['search']) ? $_GET['search'] : '';

                    // Define how many results you want per page
                    $results_per_page = 4;

                    // Determine the total number of pages available
                    if ($search_query) {
                        $query = "SELECT COUNT(*) AS total FROM artikel WHERE judul LIKE '%$search_query%'";
                    } else {
                        $query = "SELECT COUNT(*) AS total FROM artikel";
                    }
                    $result = $koneksi->query($query);
                    $row = $result->fetch_assoc();
                    $total_articles = $row['total'];
                    $number_of_pages = ceil($total_articles / $results_per_page);

                    // Determine which page number visitor is currently on
                    if (!isset($_GET['page']) || $_GET['page'] < 1) {
                        $current_page = 1;
                    } else {
                        $current_page = (int)$_GET['page'];
                    }

                    // Determine the SQL LIMIT starting number for the results on the current page
                    $offset = ($current_page - 1) * $results_per_page;

                    // Fetch articles for the current page
                    if ($search_query) {
                        $query = "SELECT * FROM artikel WHERE judul LIKE '%$search_query%' LIMIT $offset, $results_per_page";
                    } else {
                        $query = "SELECT * FROM artikel LIMIT $offset, $results_per_page";
                    }
                    $result = $koneksi->query($query);

                    if ($result->num_rows > 0) {
                        // Output data for each article
                        while ($artikel = $result->fetch_assoc()) {
                            ?>
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <img src="cover/<?php echo htmlspecialchars($artikel['cover']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($artikel['judul']); ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo htmlspecialchars($artikel['judul']); ?></h5>
                                        <p class="card-text"><?php echo substr(htmlspecialchars($artikel['isi_artikel']), 0, 100); ?></p>
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

                <!-- Pagination-->
                <nav aria-label="Pagination">
                    <ul class="pagination justify-content-center my-4">
                        <li class="page-item <?php if ($current_page == 1) echo 'disabled'; ?>">
                            <a class="page-link" href="?search=<?php echo urlencode($search_query); ?>&page=<?php echo max(1, $current_page - 1); ?>">Previous</a>
                        </li>

                        <?php
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            ?>
                            <li class="page-item <?php if ($page == $current_page) echo 'active'; ?>">
                                <a class="page-link" href="?search=<?php echo urlencode($search_query); ?>&page=<?php echo $page; ?>"><?php echo $page; ?></a>
                            </li>
                            <?php
                        }
                        ?>

                        <li class="page-item <?php if ($current_page == $number_of_pages) echo 'disabled'; ?>">
                            <a class="page-link" href="?search=<?php echo urlencode($search_query); ?>&page=<?php echo min($number_of_pages, $current_page + 1); ?>">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <form method="GET" action="">
                            <div class="input-group">
                                <input class="form-control" type="text" name="search" value="<?php echo htmlspecialchars($search_query); ?>" placeholder="Enter search term..." aria-label="Enter search term..." />
                                <button class="btn btn-primary" type="submit">Go!</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Kategori</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="list-unstyled mb-0">
                                    <?php
                                    // Fetch categories from the database
                                    $kategori_query = "SELECT * FROM kategori";
                                    $kategori_result = $koneksi->query($kategori_query);

                                    if ($kategori_result->num_rows > 0) {
                                        while ($kategori = $kategori_result->fetch_assoc()) {
                                            ?>
                                            <li>
                                                <a href="kategori.php?id=<?php echo $kategori['id_kategori']; ?>">
                                                    <?php echo htmlspecialchars($kategori['nama_kategori']); ?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                    } else {
                                        echo "<li>No categories found.</li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Side Widget</div>
                    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer-->
    <footer class="py-3 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; My Website 2024</p>
        </div>
    </footer>
    
    <!-- Bootstrap core JS-->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
  