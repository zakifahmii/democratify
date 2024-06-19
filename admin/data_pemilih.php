<?php
include '../koneksi.php';
include '../layout/sidebar.php';

session_start();
// QUERY DATA TABEL SISWA
$query_siswa = "SELECT * FROM siswa";
$result_siswa = mysqli_query($conn, $query_siswa);
$jumlah_siswa = mysqli_num_rows($result_siswa);

if (!isset($_SESSION["username"])) {
    echo "<script>
            alert('Anda telah logout');
            window.location.href = '../';
          </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/tabel.css">
    <link rel="stylesheet" href="../assets/style/logout.css">
    <link rel="stylesheet" href="../assets/style/admin-page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <h1>DATA PEMILIH - SISWA</h1>
    <table>
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result_siswa)) : ?>
                <tr>
                    <td><?php echo $row['nis']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['kelas']; ?></td>
                    <td><?php echo $row['jurusan']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div class="logout" id="logout">
        <a href="../control/logout.php">
            <i class="fa fa-sign-out"></i>
        </a>
    </div>
</body>

</html>