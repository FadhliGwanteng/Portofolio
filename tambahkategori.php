<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="Homeadmin.php">Tambah Kategori</a>
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
    <br><br>
    <form action="simpankategori.php" method="POST" >
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">ID Kategori</label>
  <input type="number" class="form-control" name ="id_kategori"id="exampleFormControlInput1" placeholder="ID Kategori">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Kategori Artikel</label>
  <input type="text" name = "nama_kategori" class="form-control" id="exampleFormControlInput1" placeholder="Kategori Artikel">
</div>

<button type="submit" class="btn btn-primary">Submit</button>
<a href="kategoriadmin.php" ><button type="button" class="btn btn-danger">Batalkan</button></a>
</form>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>