<?php
include 'config/database.php';

if (isset($_GET['success']) && $_GET['success'] == 'true') {
    echo "<script>
            alert('Semangat! Jangan kasih kendorzzz 😁☝️');
          </script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cie mau ngambis</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h2>To-Do List</h2>

    <div class="container">
        <div class="form-container">
            <form action="insert.php" method="POST">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" name="pekerjaan" required>

                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" required></textarea>

                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" required>

                <label for="status">Status</label>
                <select name="status" required>
                    <option value="Pending">Pending</option>
                    <option value="Selesai">Selesai</option>
                </select>

                <input type="submit" value="Tambah">
            </form>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Pekerjaan</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM tasks";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['pekerjaan']}</td>
                                    <td>{$row['deskripsi']}</td>
                                    <td>{$row['tanggal']}</td>
                                    <td>{$row['status']}</td>
                                    <td>
                                        <a href='edit.php?id={$row['id']}'>Edit</a> | 
                                        <a href='delete.php?id={$row['id']}'>Hapus</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
