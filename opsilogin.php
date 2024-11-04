<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - My Artikel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Login</h2>
        <p class="text-center">Please select your role to login:</p>

        <div class="d-flex justify-content-center">
            <form action="login.php" method="post" class="w-50">
                <div class="form-group">
                    <label for="role">Select Role:</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="" disabled selected>Select your role</option>
                        <option value="admin">Admin</option>
                        <option value="visitor">User</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="nama" required>
                </div>
                <div class="form-group mt-3">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Login</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap core JS -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
