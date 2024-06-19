<?php

session_start();
include '../koneksi.php';
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
$query_kandidat = "DELETE FROM kandidat WHERE id_kandidat = $id_kandidat";
$result_kandidat = mysqli_query($conn, $query_kandidat);


if (mysqli_affected_rows($conn) > 0) {
  echo "<script>
            alert('Data kandidat berhasil dihapus');
            window.location.href = '../admin/data_kandidat.php';
          </script>";
} else {
  echo "<script>
            alert('ID kandidat tidak ditemukan');
            window.location.href = 'data_kandidat.php';
          </script>";
}
