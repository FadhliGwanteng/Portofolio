

<?php
include 'koneksi.php';
session_start();
// cara membaca inputan dari form
$nama_user=$_POST['nama'];
$password=$_POST['password'];


// melakukan pengecekan ke tabel user
$sql = "select * from user where (nama_user='$nama_user' OR email='$nama_user')     AND password='$password' ";
// melakukan konversi hasil menjadi array
$users = mysqli_fetch_assoc(mysqli_query($koneksi,$sql));


//
if($users){
    // echo "berhasil login";
    $_SESSION['nama'] = $users['nama_user']; 
    if($users["is_admin"]){
        #Login Ke Halaman Admin
    header("location:Homeadmin.php");
  
}else{
    #login ke halaman User
    header("location:homeuser.php");
}
}





?>