<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'todo_list';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pekerjaan = $_POST['pekerjaan'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $sql = "INSERT INTO tasks (pekerjaan, deskripsi, tanggal, status) VALUES ('$pekerjaan', '$deskripsi', '$tanggal', '$status')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?success=true");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
