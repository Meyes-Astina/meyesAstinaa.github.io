<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
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
                        <a href="login_admin.php">Admin</a>
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
    <h1>Login Admin</h1>
    <div class="login-table">
        <form method="post" action="login_admin.php">
            <label for="admin_username">Username</label>
            <input type="text" id="admin_username" name="admin_username" required>
            <label for="admin_password">Password</label>
            <input type="password" id="admin_password" name="admin_password" required>
            <button type="submit">Login</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $admin_username = $_POST["admin_username"];
        $admin_password = $_POST["admin_password"];

        // Koneksi ke database
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'comission';

        $mysqli = new mysqli($host, $username, $password, $database);

        if ($mysqli->connect_error) {
            die("Koneksi ke database gagal: " . $mysqli->connect_error);
        }

        // Periksa kredensial admin
        $admin_query = "SELECT * FROM login_admin WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'";
        $admin_result = $mysqli->query($admin_query);

        if ($admin_result->num_rows == 1) {
            // Admin ditemukan, Anda dapat memberikan akses ke fitur admin di sini
            echo "Login Admin Berhasil!";
            session_start();
            $_SESSION["user_username"] = $user_username; // Mengatur sesi user
            echo "Login User Berhasil!";
            header("Location: home.php");
            exit();
        } else {
            // Login admin gagal
            echo "Login Admin Gagal!";
        }

        // Tutup koneksi database
        $mysqli->close();
    }

    ?>

    <script src="script.js"></script>
</body>

</html>