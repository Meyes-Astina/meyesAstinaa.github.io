<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan - Commission Art</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <!-- Header Anda -->
    </header>
    <main>
        <section class="order-edit">
            <h2>Edit Pesanan</h2>
            <?php
            // Sambungkan ke database Anda di sini
            $conn = mysqli_connect("localhost", "nama_pengguna", "kata_sandi", "nama_database");

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $id = $_GET['id'];
                $sql = "SELECT * FROM pesanan WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                echo "<form method='post' action='edit_order.php'>";
                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "<label for='name'>Nama:</label>";
                echo "<input type='text' id='name' name='name' value='" . $row['nama'] . "' required>";
                echo "<!-- Formulir untuk mengedit pesanan -->";
                echo "<button type='submit'>Simpan Perubahan</button>";
                echo "</form>";
            } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Kode untuk menyimpan perubahan pesanan ke database
                $id = $_POST['id'];
                $name = $_POST['name'];

                $sql = "UPDATE pesanan SET nama = '$name' WHERE id = $id";
                mysqli_query($conn, $sql);

                echo "Pesanan telah diperbarui. <a href='view_orders.php'>Kembali ke Daftar Pesanan</a>";
            }
            ?>
        </section>
    </main>
    <footer>
        <!-- Footer Anda -->
    </footer>
</body>
</html>
