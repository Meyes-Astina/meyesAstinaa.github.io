<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan - Commission Art</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <h1>Commission Art</h1>
            </div>
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="about.html">Tentang Saya</a></li>
                <li><a href="contact.html">Hubungi Kami</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="order-list">
            <h2>Daftar Pesanan</h2>
            <table>
                <tr>
                    <th>Nama</th>
                    <th>Jenis Seni</th>
                    <th>Jenis Pesanan</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
                <?php
                // Sambungkan ke database Anda di sini
                $conn = mysqli_connect("localhost", "nama_pengguna", "kata_sandi", "nama_database");

                // Kode untuk mengambil data pesanan dari database
                $sql = "SELECT * FROM pesanan";
                $result = mysqli_query($conn, $sql);

                // Loop melalui hasil query dan tampilkan data pesanan
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['jenis_seni'] . "</td>";
                    echo "<td>" . $row['jenis_pesanan'] . "</td>";
                    echo "<td>" . $row['deskripsi'] . "</td>";
                    echo "<td><a href='edit_order.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete_order.php?id=" . $row['id'] . "'>Hapus</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Commission Art</p>
    </footer>
</body>

</html>