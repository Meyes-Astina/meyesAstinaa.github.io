<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "comission";

$koneksi = mysqli_connect($host, $user, $pass, $database);

if (!$koneksi) {
    die("Tidak bisa terkoneksi: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    $sql = "DELETE FROM tb_art WHERE id=$id";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: detail.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>