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
    $jenisseni = $_POST['jenisseni'];
    $jenispesanan = $_POST['jenispesanan'];
    $deskripsi = $_POST['deskripsi'];
    $nama = $_POST['nama'];
    $age = $_POST['age'];
    $gmail = $_POST['gmail'];
    $katasandi = $_POST['katasandi'];

    $sql = "UPDATE tb_art SET jenisseni='$jenisseni', jenispesanan='$jenispesanan', deskripsi='$deskripsi', 
    nama='$nama', age='$age', gmail='$gmail', katasandi='$katasandi' WHERE id=$id";

    if (mysqli_query($koneksi, $sql)) {
        // Data berhasil diupdate, tampilkan notifikasi
        echo "Data berhasil diupdate.";

        // Ambil data yang telah diupdate
        $result = mysqli_query($koneksi, "SELECT * FROM tb_art WHERE id=$id");
        $row = mysqli_fetch_assoc($result);

        // Tampilkan hasil data yang telah diupdate
        echo "ID: " . $row['id'] . "<br>";
        echo "Jenis Seni: " . $row['jenisseni'] . "<br>";
        echo "Jenis Pesanan: " . $row['jenispesanan'] . "<br>";
        echo "Deskripsi Pesanan: " . $row['deskripsi'] . "<br>";
        echo "Nama: " . $row['nama'] . "<br>";
        echo "Usia: " . $row['age'] . "<br>";
        echo "Gmail: " . $row['gmail'] . "<br>";

        // Redirect kembali ke halaman data_pesanan.php setelah berhasil menyimpan perubahan.
        header("Location: detail.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM tb_art WHERE id=$id";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Data tidak ditemukan.";
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<!-- Halaman Edit Pesanan -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan - Commission Art</title>
    <link rel="stylesheet" href="style.css"> <!-- Pastikan Anda telah menghubungkan CSS Anda -->
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
                <li><a href="detail.php">Data Pesanan</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="order-form">
            <h2>Edit Pesanan Art</h2>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="input-group">
                    <!-- Form input untuk mengedit pesanan -->
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
                    <label for="age">Usia:</label>
                    <input type="number" id="age" name="age" value="<?php echo $row['age']; ?>" required>
                    <label for="gmail">Gmail:</label>
                    <input type="email" id="gmail" name="gmail" value="<?php echo $row['gmail']; ?>" required>
                    <label for="katasandi">Kata Sandi:</label>
                    <input type="password" id="katasandi" name="katasandi" value="<?php echo $row['katasandi']; ?>"
                        required>
                    <div class="input-group">
                        <label for="jenisseni">Jenis Seni:</label>
                        <select id="jenisseni" name="jenisseni" required>
                            <option value="Anime Style"
                                <?php echo ($row['jenisseni'] === 'Anime Style') ? 'selected' : ''; ?>>Anime Style
                            </option>
                            <option value="Game Style"
                                <?php echo ($row['jenisseni'] === 'Game Style') ? 'selected' : ''; ?>>Game Style
                            </option>
                            <option value="Semi Realistic"
                                <?php echo ($row['jenisseni'] === 'Semi Realistic') ? 'selected' : ''; ?>>Semi Realistic
                            </option>
                        </select>
                        <label for="jenispesanan">Jenis Pesanan:</label>
                        <select id="jenispesanan" name="jenispesanan" required>
                            <option value="Bust Up"
                                <?php echo ($row['jenispesanan'] === 'Bust Up') ? 'selected' : ''; ?>>Bust Up</option>
                            <option value="Half Body"
                                <?php echo ($row['jenispesanan'] === 'Half Body') ? 'selected' : ''; ?>>Half Body
                            </option>
                            <option value="Full Body"
                                <?php echo ($row['jenispesanan'] === 'Full Body') ? 'selected' : ''; ?>>Full Body
                            </option>
                        </select>
                    </div>
                    <label for="deskripsi">Deskripsi Pesanan:</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" required><?php echo $row['deskripsi']; ?></textarea>
                </div>
                <button type="submit" name="submit" class="submit-button">Simpan Perubahan</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Commission Art</p>
    </footer>
</body>

</html>
