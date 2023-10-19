<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Pesanan - Commission Art</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <!-- Header Anda -->
    </header>
    <main>
        <section class="order-delete">
            <h2>Hapus Pesanan</h2>
            <?php
            // Sambungkan ke database Anda di sini
            $conn = mysqli_connect("localhost", "nama_pengguna", "kata_sandi", "nama_database");

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
            
                // Sambungkan ke database Anda
                $conn = mysqli_connect("localhost", "nama_pengguna", "kata_sandi", "nama_database");
            
                // Kode untuk menghapus pesanan dari database
                $sql = "DELETE FROM pesanan WHERE id = $id";
                if (mysqli_query($conn, $sql)) {
                    echo "Pesanan telah dihapus. <a href='view_orders.php'>Kembali ke Daftar Pesanan</a>";
                } else {
                    echo "Terjadi kesalahan saat menghapus pesanan: " . mysqli_error($conn);
                }
            }