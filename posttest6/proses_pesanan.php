<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];
    $jenisSeni = $_POST['jenisSeni'];
    $jenisPesanan = $_POST['jenisPesanan'];
    $deskripsi = $_POST['deskripsi'];
    
    echo "Pesanan Anda telah berhasil disimpan!";
}
?>
