<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/Democratify-Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/style/login.css">
</head>

<body>
    <?php
    include "layout/header.php";
    ?>
    <main>
        <section class="judul">
            <h1>SELAMAT DATANG</h1>
            <h3>Salam kepada Siswa/Siswi kebanggaan Indonesia!<br>
                Masukkan NIS dan Password
                untuk melanjutkan.</h3>
        </section>
        <section class="form">
            <form action="control/login.php" method="post">
                <input type="text" class="input" name="nis" id="nis" placeholder="Masukkan NIS...">
                <input type="password" class="input" name="tgl_lahir" id="tgl_lahir" placeholder="Masukkan Password...">
                <small>*Untuk password (Gunakan Format Tanggal Lahir YY-MM-DD)</small>
                <button type="submit" name="login" class="btn">Masuk</button>
            </form>
        </section>
    </main>
    <?php
    include "layout/footer.php";
    ?>
</body>

</html>