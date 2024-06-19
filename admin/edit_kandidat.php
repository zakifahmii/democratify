<?php
include '../koneksi.php';
include '../layout/sidebar.php';

session_start();

if (!isset($_SESSION["username"])) {
    echo "<script>
            alert('Anda telah logout');
            window.location.href = '../';
          </script>";
    exit;
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>
            alert('ID kandidat tidak valid');
            window.location.href = 'data_kandidat.php';
          </script>";
    exit;
}

$id_kandidat = $_GET['id'];
$query_kandidat = "SELECT * FROM kandidat WHERE id_kandidat = $id_kandidat";
$result_kandidat = mysqli_query($conn, $query_kandidat);

if (mysqli_num_rows($result_kandidat) == 0) {
    echo "<script>
            alert('ID kandidat tidak ditemukan');
            window.location.href = 'data_kandidat.php';
          </script>";
    exit;
}

$kandidat = mysqli_fetch_assoc($result_kandidat);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];

    $gambar = $_FILES['gambar']['name'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $gambar = $_FILES['gambar']['name'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $upload_ok = true;
    $path = "../assets/img/" . basename($gambar);

    if (!empty($gambar)) {
        $path = "../assets/img/" . $gambar;
        if (move_uploaded_file($tmp_file, $path)) {
            $query_update = "UPDATE kandidat SET 
                                nama = '$nama', 
                                kelas = '$kelas', 
                                visi = '$visi', 
                                misi = '$misi',
                                gambar = '" . mysqli_real_escape_string($conn, $gambar) . "'
                                WHERE id_kandidat = $id_kandidat";
            $result_update = mysqli_query($conn, $query_update);

            if ($result_update) {
                echo "<script>
                        alert('Data kandidat berhasil diperbarui');
                        window.location.href = 'data_kandidat.php';
                      </script>";
                exit;
            } else {
                echo "<script>
                        alert('Gagal memperbarui data kandidat');
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Gagal mengunggah gambar');
                  </script>";
        }
    } else {
        $query_update = "UPDATE kandidat SET 
                            nama = '$nama', 
                            kelas = '$kelas', 
                            visi = '$visi', 
                            misi = '$misi'
                            WHERE id_kandidat = $id_kandidat";
        $result_update = mysqli_query($conn, $query_update);

        if ($result_update) {
            echo "<script>
                    alert('Data kandidat berhasil diperbarui');
                    window.location.href = 'data_kandidat.php';
                  </script>";
            exit;
        } else {
            echo "<script>
                    alert('Gagal memperbarui data kandidat');
                  </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/form_kandidat.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
</head>

<body>
    <h1>Edit Kandidat</h1>
    <div class="card mb-3" style="max-width: 1000px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="../assets/img/<?= $kandidat["gambar"]; ?>" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_kandidat" value="<?= $kandidat['id_kandidat']; ?>">
                        <div>
                            <label for="nama">Nama:</label>
                            <input type="text" id="nama" name="nama" value="<?= $kandidat['nama']; ?>">
                        </div>
                        <div>
                            <label for="kelas">Kelas:</label>
                            <input type="text" id="kelas" name="kelas" value="<?= $kandidat['kelas']; ?>">
                        </div>
                        <div>
                            <label for="visi">Visi:</label>
                            <textarea id="visi" name="visi"><?= $kandidat['visi']; ?></textarea>
                        </div>
                        <div>
                            <label for="misi">Misi:</label>
                            <textarea id="misi" name="misi"><?= $kandidat['misi']; ?></textarea>
                        </div>
                        <!-- Pindahkan input file di sini -->
                        <label for="gambar">Gambar:</label>
                        <input type="file" id="gambar" name="gambar">
                        <button type="submit" class="btn">Simpan Perubahan</button>
                        <a class="btn" id="btn-back" href="javascript:history.back()" role="button">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>