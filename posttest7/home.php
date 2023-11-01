<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commission Art</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="navbar.css">
    <!-- Memasukkan pustaka jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
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
                        <a href="login_admin.php">Admin</a>
                        <a href="javascript:void(0)" class="user-button">User &#9662;</a>
                        <div class="user-submenu">
                            <a href="register_user.php">Register</a>
                            <a href="login_user.php">Login</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="logout.php">Logout</a> <!-- Tambahkan tautan Logout di sini -->
                </li>
                <li><a href="about.php">Tentang Saya</a></li>
                <li><a href="contact.php">Hubungi Kami</a></li> <!-- Tambahkan tautan ke halaman Order -->
            </ul>
            <div class="theme-toggle">
                <button id="darkModeButton">Dark Mode</button>
                <button id="lightModeButton">Light Mode</button>
            </div>
        </nav>
    </header>
    <main>
        <section class="hero">
            <div class="slider-container">
                <div id="image-container-brand" class="slider">
                    <div class="slide">
                        <img src="image/Website-branded.jpg" alt="Contoh Karya Seni" class="artwork">
                    </div>
                    <div class="slide">
                        <img src="image/brand-2.jpg" alt="Contoh Karya Seni" class="artwork">
                    </div>
                    <div class="slide">
                        <img src="image/brand3.jpg" alt="Contoh Karya Seni" class="artwork">
                    </div>
                </div>
                <button id="prevButton" class="slider-button">&#10094;</button>
                <button id="nextButton" class="slider-button">&#10095;</button>
            </div>
            <h2 class="welcome-text">Selamat datang di Commission Art "Chicky12"</h2>
            <h1>Kami menyediakan layanan komisi seni kreatif untuk memenuhi kebutuhan Anda.</h1>
            <p>Silakan membuat pesanan di sini :</p>
            <a href="order.php" class="btn">Buat Pesanan</a>
            <p></p>
            <h1>PILIHAN COMMISSION ART :</h1>
            <p>Silakan melihat detail art di bawah >></p>
        </section>
        <section class="gallery">
            <div class="gallery-item">
                <div class="image-container">
                    <a href="anime.php">
                        <img src="image/anime.jpg" alt="Anime Style" class="artwork">
                    </a>
                    <div class="image-description">
                        <p>Klik untuk melihat detail >></p>
                    </div>
                    <div class="image-description2">
                        <h2>ANIME STYLE</h2>
                    </div>
                </div>
            </div>
            <div class="gallery-item">
                <div class="image-container">
                    <a href="game.php">
                        <img src="image/game.jpg" alt="Game Style" class="artwork">
                    </a>
                    <div class="image-description">
                        <p>Klik untuk melihat detail >></p>
                    </div>
                    <div class="image-description2">
                        <h2>GAME STYLE</h2>
                    </div>
                </div>
            </div>
            <div class="gallery-item">
                <div class="image-container">
                    <a href="semi-realistic.php">
                        <img src="image/semireal.jpg" alt="Semi Realistic" class="artwork">
                    </a>
                    <div class="image-description">
                        <p>Klik untuk melihat detail >></p>
                    </div>
                    <div class="image-description2">
                        <h2>SEMI REALISTIC</h2>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <footer>
        <p>&copy; 2023 Commission Art</p>
    </footer>
    <script src="script.js"></script>
    </script>
    <script>
        const slider = document.querySelector('.slider');
        const slides = document.querySelectorAll('.slide');
        const prevButton = document.querySelector('#prevButton');
        const nextButton = document.querySelector('#nextButton');
        let currentIndex = 0;

        function goToSlide(index) {
            if (index < 0) {
                index = slides.length - 1;
            } else if (index >= slides.length) {
                index = 0;
            }
            slider.style.transform = `translateX(-${index * 100}%)`;
            currentIndex = index;
        }

        function nextSlide() {
            currentIndex++;
            goToSlide(currentIndex);
        }

        function prevSlide() {
            currentIndex--;
            goToSlide(currentIndex);
        }

        // Fungsi untuk berpindah slide secara otomatis
        let slideTimer = setInterval(nextSlide, 3000); // Ganti dengan interval yang Anda inginkan

        // Hentikan otomatis slide saat mouse berada di atas slider
        slider.addEventListener('mouseover', () => {
            clearInterval(slideTimer);
        });

        // Lanjutkan otomatis slide saat mouse meninggalkan slider
        slider.addEventListener('mouseout', () => {
            slideTimer = setInterval(nextSlide, 3000); // Ganti dengan interval yang Anda inginkan
        });

        // Tambahkan event listener untuk tombol sebelumnya
        prevButton.addEventListener('click', () => {
            prevSlide();
        });

        // Tambahkan event listener untuk tombol selanjutnya
        nextButton.addEventListener('click', () => {
            nextSlide();
        });

        // Kode ini akan menjalankan otomatis slide saat halaman dimuat
        slideTimer;
    </script>
    <script>
        $(document).ready(function() { //salah satu addEventListener
            // Dark Mode
            $('#darkModeButton').click(function() {
                document.body.classList.add('dark-mode');
                $('#darkModeButton').addClass('active');
                $('#lightModeButton').removeClass('active');
                localStorage.setItem('themeMode', 'dark');

                // Menampilkan pesan pop-up
                showPopup('Dark Mode diaktifkan.');

                // Manipulasi font-family style 1
                document.body.style.fontFamily = 'Roboto, sans-serif !important';
            });

            // Light Mode
            $('#lightModeButton').click(function() {
                document.body.classList.remove('dark-mode');
                $('#lightModeButton').addClass('active');
                $('#darkModeButton').removeClass('active');
                localStorage.setItem('themeMode', 'light');

                // Menampilkan pesan pop-up
                showPopup('Light Mode diaktifkan.');

                // Mengembalikan font-family ke semula style 2
                document.body.style.fontFamily = '';
            });
        });

        // Function untuk menampilkan pesan pop-up
        function showPopup(message) {
            const popup = document.createElement('div');
            popup.classList.add('popup');
            popup.textContent = message;
            document.body.appendChild(popup);

            // Menghilangkan pesan pop-up setelah beberapa detik
            setTimeout(function() {
                document.body.removeChild(popup);
            }, 2000);
        }
    </script>

</body>

</html>