<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $ambil = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
    // return var_dump($ambil);

    if (mysqli_num_rows($ambil) === 1) {
        $data = mysqli_fetch_assoc($ambil);

        if (password_verify($password, $data['password'])) {
            $_SESSION["login"] = true; 
            header("location:home.php");
            exit();
        } else {
            echo "<script>
            alert('Username atau password salah pok!');
            window.location = 'login.php';
        </script>";
        }

    } else {
        echo "<script>
            alert('Username atau password salah!');
            window.location = 'login.php';
        </script>";
    }
}

?>

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
            <div class="txt_field">
                <input type="text" name="username" id="username" required>
                <span></span>
                <label for="username">Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" id="password" required>
                <span></span>
                <label for="password">Password</label>
            </div>
            <div class="pass"><a href="forgot.php">Forgot Password?</a></div>
            <button type="submit" name="login">Login</button>
            <div class="signup_link">
                Belum daftar? Tekan <a href="registrasi.php">Registrasi</a>
            </div>
        </form>
    </div>
</body>
</html>