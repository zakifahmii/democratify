<?php
include '../koneksi.php';
include '../layout/header.php';

session_start();

$query = "SELECT * FROM kandidat";
$result = mysqli_query($conn, $query);

if (!isset($_SESSION["nis"])) : ?>
    <script>
        alert("Anda telah logout, terimakasih sudah berpartisipasi");
        window.location.href = "../";
    </script>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/pages.css">
</head>

<body>
    <nav>KANDIDAT</nav>
    <main>
        <?php while ($kandidat = mysqli_fetch_assoc($result)) : ?>
            <a href="../kandidat/detail_kandidat.php?id=<?= $kandidat['id_kandidat']; ?>">
                <section class="card">
                    <span class="nama-kandidat">#<?= $kandidat['id_kandidat']; ?><br><?= $kandidat["nama"]; ?></span>
                    <img src="../assets/img/<?= $kandidat["gambar"]; ?>">
                </section>
            </a>
        <?php endwhile; ?>
    </main>
    <?php include '../layout/footer.php'; ?>
</body>

</html>

<?php
// Bebaskan memori hasil query
mysqli_free_result($result);
?>