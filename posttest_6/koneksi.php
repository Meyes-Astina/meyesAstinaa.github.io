<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "comission";

$koneksi = mysqli_connect($host, $user, $pass, $database);

if (!$koneksi) {
    die("Tidak bisa terkoneksi: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $age = $_POST['age'];
    $gmail = $_POST['gmail'];
    $katasandi = $_POST['katasandi'];
    $jenisseni = $_POST['jenisseni'];
    $jenispesanan = $_POST['jenispesanan'];
    $deskripsi = $_POST['deskripsi'];

    // Memasukkan data pesanan ke dalam database
    $sql = "INSERT INTO tb_art (id, nama, age, gmail, katasandi, jenisseni, jenispesanan, deskripsi)
            VALUES ('$id', '$nama', '$age', '$gmail', '$katasandi', '$jenisseni', '$jenispesanan', '$deskripsi')";

    if (mysqli_query($koneksi, $sql)) {
        echo "Pesanan berhasil disimpan di database.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
?>
