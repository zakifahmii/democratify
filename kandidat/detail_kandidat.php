<?php
include '../layout/header.php';
require '../koneksi.php';

session_start();

if (isset($_GET['id']) && isset($_POST['pilih'])) {
    $id_kandidat = $_GET['id'];

    $query = "INSERT INTO voting (id_kandidat) VALUES ('$id_kandidat')";
    if ($result = mysqli_query($conn, $query)) {
        echo "<script>alert('Pilihanmu Berhasil Dipilih!');
        window.location.href='../control/logout.php';</script>";
        exit();
    } else {
        echo "<script>alert('Terjadi kesalahan saat menyimpan. Silakan coba lagi.');</script>";
    }
}
if (!isset($_SESSION["nis"])) : ?>
    <script>
        alert("Anda telah logout, terimakasih sudah berpartisipasi");
        window.location.href = "../";
    </script>
<?php endif;

$id = intval($_GET["id"]);

$query = "SELECT * FROM kandidat WHERE id_kandidat = $id";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/style/detail.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </head>

    <body>
        <form action="" method="post">
            <div class="container">
                <a href="../siswa/dashboard_voting.php" class="back-button">&#9587;</a>
                <nav>INFORMASI KANDIDAT</nav>

                <div class="wrapper-detail-kandidat">
                    <div class="item">
                        <img src="../assets/img/<?= $data["gambar"]; ?>">
                        <button type="submit" name="pilih" class="overlay-button">Pilih Kandidat</button>
                    </div>

                    <div class="detail-kandidat">
                        <table>
                            <tr>
                                <td><strong>Nomor Urut:</strong></td>
                                <td><?= $data["id_kandidat"]; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Nama Kandidat:</strong></td>
                                <td><?= $data["nama"]; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Kelas:</strong></td>
                                <td><?= $data["kelas"]; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Visi:</strong></td>
                                <td><?= $data["visi"]; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Misi:</strong></td>
                                <td><?= $data["misi"]; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </body>

    </html>

<?php
} else {
    // Tampilkan pesan jika data kandidat tidak ditemukan
    echo "Data kandidat tidak ditemukan.";
}

include '../layout/footer.php';
?>