<?php
include '../koneksi.php';
include '../layout/sidebar.php';

session_start();
// QUERY DATA TABEL SISWA
$query_siswa = "SELECT * FROM siswa";
$result_siswa = mysqli_query($conn, $query_siswa);
$jumlah_siswa = mysqli_num_rows($result_siswa);

// QUERY DATA TABEL ADMIN
$query_admin = "SELECT * FROM admin";
$result_admin = mysqli_query($conn, $query_admin);
$admin = mysqli_fetch_assoc($result_admin);

// QUERY DATA TABEL VOTING
$query_voting = "SELECT * FROM voting";
$result_voting = mysqli_query($conn, $query_voting);
$jumlah_voting = mysqli_num_rows($result_voting);

if (!isset($_SESSION["username"])) {
    echo "<script>
            alert('Anda telah logout');
            window.location.href = '../';
          </script>";
    exit;
}

// QUERY COUNTDOWN TIMER
$query_timer = "SELECT end_time FROM timer WHERE id_timer = 1";
$result = $conn->query($query_timer);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $end_time = $row['end_time'];
} else {
    echo "Tidak ada waktu yang diatur!";
    $end_time = ""; // default value to prevent JavaScript errors
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/logout.css">
    <link rel="stylesheet" href="../assets/style/admin-page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <h1>SELAMAT DATANG <?= $admin['nama']; ?></h1>
    <div class="card-perolehan">
        <div class="card-info">
            <h2 class="title">PEROLEHAN SUARA<br>MASUK</h2>
        </div>
        <div class="card-info ttl">
            <div class="total-siswa ttl-group">
                <img src="../assets/img/people-outline.png">
                <p><?php echo $jumlah_siswa; ?></p>
                <p>Total Siswa</p>
            </div>
            <div class="selected-siswa ttl-group">
                <img src="../assets/img/person-done-outline.png">
                <p><?php echo $jumlah_voting; ?></p>
                <p>Sudah Memilih</p>
            </div>
        </div>
    </div>

    <div class="logout" id="logout">
        <a href="../control/logout.php">
            <i class="fa fa-sign-out"></i>
        </a>
    </div>

    <div class="card-waktu">
        <div class="card-info">
            <h2 class="title">PEMUNGUTAN SUARA <br>BERLANGSUNG</h2>
        </div>
        <div class="card-info">
            <div class="time-section">
                <div id="hours"></div>
                <div class="label">Jam</div>
            </div>
            <div class="time-section">
                <div id="minutes"></div>
                <div class="label">Menit</div>
            </div>
            <div class="time-section">
                <div id="seconds"></div>
                <div class="label">Detik</div>
            </div>
        </div>
        <div class="image-time">
            <img src="../assets/img/Humaaans Phone.png" alt="">
        </div>
        <div class="set-timer" id="set-timer">
            <a href="set-timer.php">Atur Waktu</a>
        </div>
    </div>
</body>
<script>
    var countDownDate = new Date("<?php echo $end_time; ?>").getTime();

    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;

        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("hours").innerHTML = hours;
        document.getElementById("minutes").innerHTML = minutes;
        document.getElementById("seconds").innerHTML = seconds;

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("hours").innerHTML = "0";
            document.getElementById("minutes").innerHTML = "0";
            document.getElementById("seconds").innerHTML = "0";
        }
    }, 1000);
</script>

</html>