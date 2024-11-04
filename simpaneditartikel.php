<?php
    include 'koneksi.php';
    $id = $_POST['id_artikel'];
    $judul = $_POST['judul'];
    $tanggal_publish = $_POST['tanggal_publish'];
    $id_kategori = $_POST['id_kategori'];
    $isi_artikel = $_POST['isi_artikel'];

    $target_dir = "file_cover/";
    $namaFile = $_FILES["cover"]["name"];
    $target_file = $target_dir . basename($namaFile);
    $namaSementara = $_FILES['cover']['tmp_name'];
    $terupload = move_uploaded_file($namaSementara, $target_file);

    // Insert data ke database
    $sql = mysqli_query($koneksi,"UPDATE `artikel` SET `judul`='$judul',`tanggal_publish`='$tanggal_publish',`id_kategori`='$id_kategori',`isi_artikel`='$isi_artikel',`cover`='$namaFile' WHERE id_artikel='$id';");
   
    header("Location:dataartikel.php");
?>

