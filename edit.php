<?php
include 'config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tasks WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pekerjaan = $_POST['pekerjaan'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $sql = "UPDATE tasks SET pekerjaan = '$pekerjaan', deskripsi = '$deskripsi', tanggal = '$tanggal', status = '$status' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?success=true");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit To-Do List</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h2>Edit To-Do List</h2>

    <div class="form-container">
        <form action="edit.php?id=<?php echo $id; ?>" method="POST">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" name="pekerjaan" value="<?php echo $row['pekerjaan']; ?>" required>

            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" required><?php echo $row['deskripsi']; ?></textarea>

            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" value="<?php echo $row['tanggal']; ?>" required>

            <label for="status">Status</label>
            <select name="status" required>
                <option value="Pending" <?php echo $row['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                <option value="Selesai" <?php echo $row['status'] == 'Selesai' ? 'selected' : ''; ?>>Selesai</option>
            </select>

            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
