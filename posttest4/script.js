// Mendapatkan preferensi mode dari localStorage saat halaman dimuat
const userMode = localStorage.getItem('themeMode');

// Set mode sesuai preferensi pengguna
if (userMode === 'dark') {
    document.body.classList.add('dark-mode');
    darkModeButton.classList.add('active');
    lightModeButton.classList.remove('active');
} else {
    document.body.classList.remove('dark-mode');
    lightModeButton.classList.add('active');
    darkModeButton.classList.remove('active');
}