<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perolehan Suara</title>
    <link rel="stylesheet" href="../assets/style/perolehan_suara.css">
    <link rel="stylesheet" href="../assets/style/logout.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php include '../layout/sidebar.php'; ?>
    <div class="container pt-5">
        <h1>PEROLEHAN SUARA</h1>
        <hr><br>
        <div class="chart-container" style="position: relative; height:40vh; width:80vw">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <div class="logout" id="logout">
        <a href="../control/logout.php">
            <i class="fa fa-sign-out"></i>
        </a>
    </div>
    <script>
        <?php
        include '../koneksi.php';

        $sql = "SELECT k.id_kandidat, k.nama AS nama_kandidat, COUNT(*) AS jumlah_suara 
                FROM voting v 
                JOIN kandidat k ON v.id_kandidat = k.id_kandidat 
                GROUP BY k.id_kandidat";
        $result = mysqli_query($conn, $sql);
        $labels = [];
        $jumlah_suara = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $labels[] = $row['nama_kandidat'];
            $jumlah_suara[] = $row['jumlah_suara'];
        }
        ?>

        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Jumlah Suara',
                    data: <?php echo json_encode($jumlah_suara); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 71, 1)',
                        'rgba(9, 31, 242, 0.8)',
                        'rgba(255, 128, 6, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 71, 1)',
                        'rgba(9, 31, 242, 0.8)',
                        'rgba(255, 128, 6, 0.8)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>