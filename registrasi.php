<?php

include 'koneksi.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $password1 = $_POST['password'];
    $password2 = $_POST['password2'];

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
       
        $query = mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$username'"); 
       
        if($query->num_rows > 0) {
         echo "<script>alert('Username sudah terdaftar');</script>";
        }
    }

    $cek_user = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
    $cek_login = mysqli_num_rows($cek_user);

    if ($cek_login > 0) {
        echo "<script>
            alert('Username telah terdaftar');
            window.location = 'registrasi.php';
        </script>";
    } else {
        if ($password1 != $password2){
            echo "<script>
                alert('Confirm password tidak sesuai');
                window.location = 'registrasi.php';
            </script>";
        } else {
            $password = password_hash($password1,PASSWORD_DEFAULT);
            mysqli_query($koneksi, "INSERT INTO users VALUES('', '$username', '$email', '$telp', '$password')");
            echo "<script>
                alert('Data berhasil dikirim');
                window.location = 'login.php';
            </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Registrasi</title>
</head>
<body>
    <div class="center">
        <h1>Registrasi</h1>
        <form action="" method="POST" autocomplete="off">
            <div class="txt_field">
                <input type="text" name="username" id="username" required>
                <span></span>
                <label for="username">Username</label>
            </div>
            <div class="txt_field">
                <input type="emailS" name="email" id="email" required>
                <span></span>
                <label for="email">Email</label>
            </div>
            <div class="txt_field">
                <input type="text" name="telp" id="telp" onkeypress="return hanyaAngka(event)" required>
                <span></span>
                <label for="telp">Telepon</label>
            </div>
            <script>
                function hanyaAngka(evt) {
		            var charCode = (evt.which) ? evt.which : event.keyCode
		            if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		            return false;
		            return true;
		        }
            </script>
            <div class="txt_field">
                <select class="form-control" name="univ" id="univ">
	                <option value="">Pilih Universitas</option>
                    <option value="Unesa">Universitas Negeri Surabaya</option>
                    <option value="Unmul">Universitas Mulawarman</option>
                    <option value="Unhas">Universitas Hasanuddin</option>
                    <option value="ITK">Institut Teknologi Kalimantan</option>
                </select>
            </div>
            <div class="txt_field">
                <input type="date" name="date" id="date" required>
                <span></span>
                <label for="date">Tanggal Lahir</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" id="password" required>
                <span></span>
                <label for="password">Password</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password2" id="password2" required>
                <span></span>
                <label for="password2">Confirm Password</label>
            </div>
            <button type="submit" name="submit" >Daftar</button>
            <div class="signup_link">
                Punya akun? Tekan <a href="login.php">Login</a>
            </div>
        </form>
    </div>
</body>
</html>