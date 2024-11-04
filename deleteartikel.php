<?php 
include 'koneksi.php';
$id_artikel = $_GET['id_artikel'];

$sql = mysqli_query($koneksi, "DELETE FROM artikel WHERE id_artikel='$id_artikel'");
header ("location:dataartikel.php");
?>