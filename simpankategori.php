<?php
    include 'koneksi.php';
    $id=$_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];
    $sql =mysqli_query($koneksi,"insert into kategori(`id_kategori`,`nama_kategori`) values ('$id','$nama_kategori')");
    header("location:kategori.php?id=$id");
?>
