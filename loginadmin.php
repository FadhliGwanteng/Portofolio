

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image:url('bg2.png');
                backgorund-size:cover;
                background-position:center;">

    <br><br>
    <h1 align="center" style="color:red">Selamat Datang</h1>
    <br>
    <div class="container vh-80 d-flex justify-content-center align-items-center">
        <div class="card p-4 shadow-lg" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4">Login</h3>
            
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Username</label>
                    <input type="nama"  name="nama" class="form-control" id="nama" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                </div>
                <div class="d-grid">
                    <button class="" type = "sumbit"><img src="img/img2.png" width = "100px" height="60px"></button>
                    
                </div>
            </form>
            <div class="text-center mt-3">
                <a href="#">Forgot password?</a>
            </div>
        </div>
    </div>

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>