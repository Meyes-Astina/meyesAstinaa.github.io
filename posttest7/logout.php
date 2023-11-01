<?php
// Inisialisasi sesi
session_start();

// Hancurkan semua sesi
session_destroy();

// Redirect ke halaman login atau halaman beranda
header("Location: login_user.php");
exit;
?>