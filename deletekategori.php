<?php 
include 'koneksi.php';
$id_kategori = $_GET['id_kategori'];

$sql = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id_kategori'");
header ("location:kategoriadmin.php");
?>