<?php
include '../koneksi.php';
if (!isset($_SESSION["username"])) {
    echo "<script>
            alert('Anda telah logout');
            window.location.href = '../';
          </script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_end_time = $_POST['end_time'];
    $sql = "UPDATE timer SET end_time='$new_end_time' WHERE id_timer=1";
    if ($conn->query($sql) === TRUE) {
        echo "Timer berhasil diupdate";
    } else {
        echo "Terjadi kesalahan saat update: " . $conn->error;
    }
}
?>

<link rel="stylesheet" href="../assets/style/set-timer.css">
<form method="post" action="">
    <label for="end_time">Set New End Time:</label>
    <input type="datetime-local" id="end_time" name="end_time">
    <input type="submit" value="Update">
</form>