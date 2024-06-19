<?php

include '../koneksi.php';
include '../layout/sidebar.php';

session_start();

$query_kandidat = "SELECT * FROM kandidat";
$result_kandidat = mysqli_query($conn, $query_kandidat);
$jumlah_kandidat = mysqli_num_rows($result_kandidat);

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
    <link rel="stylesheet" href="../assets/style/card-kandidat.css">
    <link rel="stylesheet" href="../assets/style/logout.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <h1>DATA KANDIDAT</h1>
    <a class="btn btn-tambah" href="tambah_kandidat.php" role="button">Tambah Kandidat</a>
    <?php while ($row = mysqli_fetch_assoc($result_kandidat)) : ?>
        <div class="card-group">
            <div class="card">
                <img src="../assets/img/<?= $row["gambar"]; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['nama']; ?></h5>
                    <p class="card-title">Kandidat Nomor <?php echo $row['id_kandidat']; ?></p>
                    <div class="d-grid gap-2 d-md-block">
                        <a href="edit_kandidat.php?id=<?= $row['id_kandidat']; ?>" class="btn btn-edit">Edit</a>
                        <a href="hapus_kandidat.php?id=<?= $row['id_kandidat']; ?>" class="btn btn-hapus">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>

    <div class="logout" id="logout">
        <a href="../control/logout.php">
            <i class="fa fa-sign-out"></i>
        </a>
    </div>
</body>

</html>