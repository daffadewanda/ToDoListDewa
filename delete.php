<?php
include 'config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tasks WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('KEREN BETUL 👍👍👍 yu didid!');
                window.location.href = 'index.php';  // Redirect ke index.php setelah alert
              </script>";
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
