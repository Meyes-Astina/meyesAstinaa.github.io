<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pesanan - Commission Art</title>
    <link rel="stylesheet" href="style-order.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <h1>Commission Art</h1>
            </div>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">Tentang Saya</a></li>
                <li><a href="contact.php">Hubungi Kami</a></li>
                <li><a href="detail.php">Data Pesanan</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="order-list">
            <h2>Data Semua Pesanan</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Usia</th>
                    <th>Gmail</th>
                    <th>Jenis Seni</th>
                    <th>Jenis Pesanan</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Aksi</th>
                </tr>
                <?php
                // Koneksi ke database
                $host = "localhost";
                $user = "root";
                $pass = "";
                $database = "comission";
                $koneksi = mysqli_connect($host, $user, $pass, $database);

                if (!$koneksi) {
                    die("Tidak bisa terkoneksi: " . mysqli_connect_error());
                }

                // Query untuk mengambil semua data pesanan
                $query = "SELECT * FROM tb_art";
                $result = mysqli_query($koneksi, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["age"] . "</td>";
                        echo "<td>" . $row["gmail"] . "</td>";
                        echo "<td>" . $row["jenisseni"] . "</td>";
                        echo "<td>" . $row["jenispesanan"] . "</td>";
                        echo "<td>" . $row["deskripsi"] . "</td>";
                        echo "<td>" . date("Y-m-d") . "</td>";
                        echo "<td>
                            <a href='edit_pesanan.php?id=" . $row["id"] . "' class='edit-button'>Edit</a>
                            <a href='hapus_pesanan.php?id=" . $row["id"] . "' class='delete-button'>Hapus</a>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Tidak ada data pesanan.</td></tr>";
                }

                // Tutup koneksi ke database
                mysqli_close($koneksi);
                ?>
            </table>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Commission Art</p>
    </footer>
</body>

</html>