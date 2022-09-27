<?php
session_start();

if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Masuk pok!</title>
    <style>
        div {
            width: 250px;
            text-align: center;
            margin: auto;
            margin-top: 150px;
            background-color: #31E1F7;
            padding: 100px;
            border-radius: 30px;
        }
    </style>
</head>
<body>
    <div>
        Selamat Datang 
        <?php
            echo "Login pada tanggal : ";
            date_default_timezone_set('Asia/Jakarta');
            echo date("d - m - Y");
            echo "<br>" . "Waktu : ";
            echo date("H:i:s");
        ?>
        <br>
        <a href="logout.php"><button>Logout</button></a>
    </div>

</body>
</html>