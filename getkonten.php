<?php
 $host ="127.0.0.1";
 $username= "root" ;
 $password= "" ;
 $database= "dbartikel" ;

// Koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $kategoriId = $_GET['id'];
    $sql = "SELECT * FROM konten WHERE kategori_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $kategoriId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h3>" . $row['judul'] . "</h3>";
            echo "<p>" . $row['isi'] . "</p>";
        }
    } else {
        echo "<p>Tidak ada konten untuk kategori ini.</p>";
    }
}

$stmt->close();
$conn->close();
?>
