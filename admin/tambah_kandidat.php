<?php
include '../koneksi.php';
include '../layout/sidebar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];

    $gambar = $_FILES['gambar']['name'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $upload_ok = true;
    $path = "../assets/img/" . basename($gambar);

    if (!empty($gambar)) {
        if ($_FILES["gambar"]["size"] > 5000000) {
            echo "<script>alert('Maaf, kualitas gambar terlalu besar, masukkan gambar maksimal 5MB');</script>";
            $upload_ok = false;
        }

        if ($upload_ok) {
            if (move_uploaded_file($tmp_file, $path)) {
                $gambar = mysqli_real_escape_string($conn, basename($gambar));
                $query_insert = "INSERT INTO kandidat (nama, kelas, visi, misi, gambar) VALUES (
                                    '" . mysqli_real_escape_string($conn, $nama) . "', 
                                    '" . mysqli_real_escape_string($conn, $kelas) . "', 
                                    '" . mysqli_real_escape_string($conn, $visi) . "', 
                                    '" . mysqli_real_escape_string($conn, $misi) . "', 
                                    '$gambar')";
                $result_insert = mysqli_query($conn, $query_insert);

                if ($result_insert) {
                    echo "<script>
                            alert('Data kandidat berhasil ditambahkan');
                            window.location.href = 'data_kandidat.php';
                          </script>";
                    exit;
                } else {
                    echo "<script>
                            alert('Gagal menambahkan data kandidat');
                          </script>";
                }
            } else {
                echo "<script>alert('Gagal mengunggah gambar');</script>";
            }
        }
    } else {
        $query_insert = "INSERT INTO kandidat (nama, kelas, visi, misi) VALUES (
                            '" . mysqli_real_escape_string($conn, $nama) . "', 
                            '" . mysqli_real_escape_string($conn, $kelas) . "', 
                            '" . mysqli_real_escape_string($conn, $visi) . "', 
                            '" . mysqli_real_escape_string($conn, $misi) . "')";
        $result_insert = mysqli_query($conn, $query_insert);

        if ($result_insert) {
            echo "<script>
                    alert('Data kandidat berhasil ditambahkan');
                    window.location.href = 'data_kandidat.php';
                  </script>";
            exit;
        } else {
            echo "<script>
                    alert('Gagal menambahkan data kandidat');
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
    <title>Tambah Kandidat</title>
</head>

<body>
    <h1>Tambah Kandidat Baru</h1>
    <div class="card mb-3" style="max-width: 1000px;">
        <div class="row g-0">
            <div class="col-md-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <label>Foto Kandidat</label>
                    <input type="file" name="gambar" class="form-control" required>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div>
                        <label for="nama">Nama:</label>
                        <input type="text" id="nama" name="nama" required>
                    </div>
                    <div>
                        <label for="kelas">Kelas:</label>
                        <input type="text" id="kelas" name="kelas" required>
                    </div>
                    <div>
                        <label for="visi">Visi:</label>
                        <textarea id="visi" name="visi" required></textarea>
                    </div>
                    <div>
                        <label for="misi">Misi:</label>
                        <textarea id="misi" name="misi" required></textarea>
                    </div>
                    <button type="submit" class="btn">Tambah Kandidat</button>
                    <a class="btn" id="btn-back" href="javascript:history.back()" role="button">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>