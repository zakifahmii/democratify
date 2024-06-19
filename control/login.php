<?php

include "../koneksi.php";

$nis = $_POST['nis'];
$pw = $_POST['tgl_lahir'];

session_start();

$query_siswa = $conn->prepare("SELECT * FROM siswa WHERE nis = ? AND tgl_lahir = ?");
$query_siswa->bind_param("ss", $nis, $pw);
$query_siswa->execute();
$result_siswa = $query_siswa->get_result();
$cek_siswa = $result_siswa->num_rows;

if ($cek_siswa > 0) {
    $data = $result_siswa->fetch_assoc();
    $_SESSION['nis'] = $data['nis'];
    $_SESSION['nama'] = $data['nama'];
    header("location:../siswa/dashboard_voting.php");
} else {
    $username = $_POST['nis'];
    $query_admin = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
    $query_admin->bind_param("ss", $username, $pw);
    $query_admin->execute();
    $result_admin = $query_admin->get_result();
    $cek_admin = $result_admin->num_rows;

    if ($cek_admin > 0) {
        $data = $result_admin->fetch_assoc();
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];
        header("location:../admin/");
    } else {
        echo "<script type='text/javascript'>alert('Mohon maaf, sepertinya nis atau password mu salah'); window.location = '../';</script>";
    }
}

$query_siswa->close();
$query_admin->close();
$conn->close();