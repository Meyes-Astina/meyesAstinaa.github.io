<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login user</title>
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
                <li><a href="home.php">Home</a></li>
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
    <h1>Login user</h1>
    <div class="login-table">
        <form method="post" action="login_user.php">
            <label for="user_username">Username</label>
            <input type="text" id="user_username" name="user_username" required>
            <label for="user_password">Password</label>
            <input type="password" id="user_password" name="user_password" required>
            <button type="submit">Login</button>
        </form>
    </div>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Koneksi ke database
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'comission';

        $mysqli = new mysqli($host, $username, $password, $database);

        if ($mysqli->connect_error) {
            die("Koneksi ke database gagal: " . $mysqli->connect_error);
        }

        // Proses login user
        $user_username = $_POST["user_username"];
        $user_password = $_POST["user_password"];

        // Periksa apakah username dan password ada di tabel "register_user"
        $check_user_query = "SELECT * FROM registrasi_user WHERE register_username = '$user_username' AND register_password = '$user_password'";
        $check_user_result = $mysqli->query($check_user_query);

        if ($check_user_result->num_rows == 1) {
            // User ditemukan, Anda dapat mengatur sesi user di sini
            echo "Login User Berhasil!";
            session_start();
            $_SESSION["user_username"] = $user_username; // Mengatur sesi user
            echo "Login User Berhasil!";
            header("Location: home.php");
            exit();
        } else {
            // Login user gagal
            echo "Login User Gagal!";
        }

        // Tutup koneksi database
        $mysqli->close();
    }
    ?>

    <script src="script.js"></script>
</body>

</html>