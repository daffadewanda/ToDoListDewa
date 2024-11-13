<?php
// Konfigurasi koneksi ke database
$host = 'localhost';     // Nama host (localhost untuk server lokal)
$username = 'root';      // Nama pengguna database (biasanya 'root' untuk XAMPP atau MAMP)
$password = '';          // Kata sandi (kosong jika menggunakan XAMPP/MAMP dengan root tanpa password)
$dbname = 'todo_list';   // Nama database yang digunakan

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $dbname);

// Mengecek koneksi, jika gagal tampilkan error
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
