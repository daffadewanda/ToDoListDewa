<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'todo_list';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['pekerjaan']}</td>
                <td>{$row['deskripsi']}</td>
                <td>{$row['tanggal']}</td>
                <td>{$row['status']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
}

$conn->close();
?>
