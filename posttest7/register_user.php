<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <link rel="stylesheet" href="styleakun.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="navbar.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <h1>Commission Art</h1>
            </div>
            <ul>
                <li><a href="#">Home</a></li>
                <li class="account-dropdown">
                    <a href="javascript:void(0)" class="account-button">Akun &#9662;</a>
                    <div class="account-menu">
                        <a href="login_user.php">Admin</a>
                        <a href="javascript:void(0)" class="user-button">User &#9662;</a>
                        <div class="user-submenu">
                            <a href="register_user.php">Register</a>
                            <a href="login_user.php">Login</a>
                        </div>
                    </div>
                </li>
                <li><a href="about.php">Tentang Saya</a></li>
                <li><a href="contact.php">Hubungi Kami</a></li> <!-- Tambahkan tautan ke halaman Order -->
            </ul>
        </nav>
    </header>
    <h1>Register User</h1>
    <div class="login-table">
        <form method="post" action="register_user.php">
            <label for="register_username">Username</label>
            <input type="text" id="register_username" name="register_username" required>
            <label for="user_email">Email</label>
            <input type="email" id="user_email" name="user_email" required>
            <label for="register_password">Password</label>
            <input type="password" id="register_password" name="register_password" required>
            <button type="submit">Register</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Koneksi ke database (sama seperti pada halaman login admin)
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'comission';

        $mysqli = new mysqli($host, $username, $password, $database);

        if ($mysqli->connect_error) {
            die("Koneksi ke database gagal: " . $mysqli->connect_error);
        }

        // Proses registrasi user
        $register_username = $_POST["register_username"];
        $register_password = $_POST["register_password"];
        $user_email = $_POST["user_email"];

        // Periksa apakah username dan email sudah digunakan
        $check_username_query = "SELECT * FROM registrasi_user WHERE register_username = '$register_username'";
        $check_email_query = "SELECT * FROM registrasi_user WHERE user_email = '$user_email'";

        $check_username_result = $mysqli->query($check_username_query);
        $check_email_result = $mysqli->query($check_email_query);

        if ($check_username_result->num_rows > 0) {
            echo "Username sudah digunakan. Silakan pilih username lain.";
        } elseif ($check_email_result->num_rows > 0) {
            echo "Alamat email sudah digunakan. Silakan gunakan alamat email lain.";
        } else {
            // Simpan data pengguna ke tabel "register_user"
            $register_query = "INSERT INTO registrasi_user (register_username, register_password, user_email) VALUES ('$register_username', '$register_password', '$user_email')";
            if ($mysqli->query($register_query) === TRUE) {
                echo "Registrasi berhasil!";
            } else {
                echo "Registrasi gagal: " . $mysqli->error;
            }
        }

        // Tutup koneksi database
        $mysqli->close();
    }
    ?>
    <script src="script.js"></script>

</body>

</html>