<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan folder "uploads" sudah ada dan dapat ditulis
    $uploadDir = "uploads/";

    // Dapatkan informasi file yang diunggah
    $fileName = $_FILES["gambar"]["name"];
    $filePath = $uploadDir . $fileName;

    // Coba unggah file
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $filePath)) {
        echo "File berhasil diunggah.";
    } else {
        echo "Gagal mengunggah file.";
    }
}
?>
