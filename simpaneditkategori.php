<?php
    include 'koneksi.php';
    $id_kategori= $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];
    $update =mysqli_query($koneksi,"UPDATE `kategori` SET `nama_kategori`='$nama_kategori' WHERE id_kategori='$id_kategori'");
    header("location:kategori.php?id=$id_kategori");
?>
    