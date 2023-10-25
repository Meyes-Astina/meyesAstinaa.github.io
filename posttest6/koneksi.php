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

    // Proses unggah gambar
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $gambar_temp = $_FILES['gambar']['tmp_name'];
        $gambar = $_FILES['gambar']['name'];
        $gambar_destination = "../uploads/" . $gambar;

        // Memasukkan data pesanan ke dalam database
        $sql = "INSERT INTO tb_art (jenisseni, jenispesanan, deskripsi, gambar, nama, age, gmail, katasandi) 
        VALUES ('$jenisseni', '$jenispesanan', '$deskripsi', '$gambar', '$nama', $age, '$gmail', '$katasandi')";

        if (mysqli_query($koneksi, $sql)) {
            // Pesanan berhasil disimpan di database.

            // Pindahkan file ke direktori "uploads"
            if (move_uploaded_file($gambar_temp, $gambar_destination)) {
                echo "File berhasil diunggah.";
            } else {
                echo "Gagal mengunggah file.";
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}
