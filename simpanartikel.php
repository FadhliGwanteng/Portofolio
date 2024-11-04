<?php
include 'koneksi.php';
$id = $_POST['id_artikel'];
$judul = $_POST['judul'];
$tanggal_publish = $_POST['tanggal_publish']; 
$kategori_id = $_POST['id_kategori'];
$isi_artikel = $_POST['isi_artikel'];
$status_aktif = $_POST['status_aktif'];

$target_dir = "cover/";
$namaFile = $_FILES["cover"]["name"];
$target_file = $target_dir . basename($namaFile);
$namaSementara = $_FILES['cover']['tmp_name'];
$terupload = move_uploaded_file($namaSementara, $target_file);





$sql = mysqli_query($koneksi, "INSERT INTO artikel(`id_artikel`, `judul`, `tanggal_publish`, `id_kategori`, `isi_artikel`, `cover`, `status_aktif`) VALUES ('$id','$judul','$tanggal_publish','$kategori_id','$isi_artikel','$status_aktif','$namaFile')");
header("location:dataartikel.php");
?>