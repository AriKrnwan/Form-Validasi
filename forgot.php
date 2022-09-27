<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <form action="" method="POST">
            <div class="signup_link">
                Masukkan username dan email untuk mengganti password
            </div>
            <div class="txt_field">
                <input type="text" name="username" id="username" required>
                <span></span>
                <label for="username">Username</label>
            </div>
            <div class="txt_field">
                <input type="text" name="email" id="email" required>
                <span></span>
                <label for="email">Email</label>
            </div>
            <button type="submit" name="login">Kirim</button>
            <div class="signup_link">
                Belum daftar? Tekan <a href="registrasi.php">Registrasi</a>
            </div>
        </form>
    </div>
</body>
</html>