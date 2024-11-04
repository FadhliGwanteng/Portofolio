<?php
include('koneksi.php'); // Menghubungkan ke database
$id_kategori = $_GET['id'];
$sql=mysqli_query($koneksi,"SELECT * FROM artikel WHERE id_kategori='$id_kategori'");
$id_kategori=mysqli_fetch_array($sql);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($artikel['judul']); ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
        }
        h1 {
            color: #333;
        }
        .article-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .content {
            margin-top: 20px;
            line-height: 1.6;
            color: #555;
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

<div class="container">
    <h1><?php echo htmlspecialchars($artikel['judul']); ?></h1>
    <img src="cover/<?php echo htmlspecialchars($artikel['cover']); ?>" class="article-image" alt="<?php echo htmlspecialchars($artikel['judul']); ?>">
    <div class="content">
        <p><?php echo nl2br(htmlspecialchars($artikel['isi_artikel'])); ?></p>
    </div>  
    <a href="index.php" class="back-button">Back to Artikel</a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
