<?php
include('_secure.php');
$title = 'Dashboard';
include('header.php');

include('include/db.php');
include('include/function.php');
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <?php include('nav.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Lokasi Kerusakan Jalan</li>
            </ol>

            <!-- Map Container -->
            <div id="map" style="height: 500px;"></div>
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <?php include('footer.php'); ?>
    </div>

    <!-- Script to Initialize Leaflet Map -->
    <script>
        var map = L.map('map').setView([0.7856782, 100.1954562], 8); // Set initial map center and zoom level

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Fetch data from PHP function and add markers to the map
        <?php
        $result = fetch_laporan_kerusakan_jalan_data(); // Assuming this function retrieves data from your database

        while ($row = $result->fetch_assoc()) {
            echo "L.marker([" . $row['latitude'] . ", " . $row['longitude'] . "]).addTo(map)
                    .bindPopup('<b>ID Laporan:</b> " . $row['id_laporan'] . "<br><b>Nama Pelapor:</b> " . $row['nama_pelapor'] . "<br><b>Tingkat Kerusakan:</b> " . $row['tingkat_kerusakan'] . "');\n";
        }
        ?>
    </script>
</body>

</html>