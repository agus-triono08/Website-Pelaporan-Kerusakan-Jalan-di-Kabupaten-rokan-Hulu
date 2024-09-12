<?php
include('_secure.php');
$title = 'Dashboard';
include('header.php');

include('include/db.php');
include('include/function.php'); ?>

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
                <li class="breadcrumb-item active">Data Laporan Kerusakan Jalan</li>
            </ol>
            <!-- Display Messages -->
            <?php
            if (isset($_SESSION['message'])) {
                echo '<div class="alert alert-' . $_SESSION['message_type'] . ' alert-dismissible fade show" role="alert">';
                echo $_SESSION['message'];
                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                echo '<span aria-hidden="true">&times;</span>';
                echo '</button>';
                echo '</div>';
                // Unset the message after displaying it
                unset($_SESSION['message']);
                unset($_SESSION['message_type']);
            }
            ?>
            <!-- Data Table for Laporan Kerusakan Jalan -->
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <i class="fa fa-table"></i> Laporan Kerusakan Jalan
                        </div>
                        <div class="col text-right">
                            <button class="btn btn-primary" onclick="printTable()">Cetak Tabel</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID Laporan</th>
                                    <th>Gambar Laporan</th>
                                    <th>Nama Pelapor</th>
                                    <th>Tingkat Kerusakan</th>
                                    <th>Catatan Laporan</th>
                                    <th>Lokasi Laporan</th>
                                    <th>Longitude</th>
                                    <th>Latitude</th>
                                    <th>Tanggal Laporan</th>
                                    <th>Status Laporan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = fetch_laporan_kerusakan_jalan_data();
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id_laporan'] . "</td>";
                                    echo "<td><img src='../api/" . $row['gambar_laporan'] . "' style='max-width: 100px; max-height: 100px;'></td>";
                                    echo "<td>" . $row['nama_pelapor'] . "</td>";
                                    echo "<td>" . $row['tingkat_kerusakan'] . "</td>";
                                    echo "<td>" . $row['catatan_laporan'] . "</td>";
                                    echo "<td>" . $row['lokasi_laporan'] . "</td>";
                                    echo "<td>" . $row['longitude'] . "</td>";
                                    echo "<td>" . $row['latitude'] . "</td>";
                                    echo "<td>" . $row['tgl_laporan'] . "</td>";
                                    echo "<td>" . $row['status_laporan'] . "</td>";
                                    echo "<td>
                                            <button class='btn btn-primary' onclick='editLaporan(" . json_encode($row) . ")'>Edit</button>
                                            <button class='btn btn-danger' onclick='deleteLaporan(" . $row['id_laporan'] . ")'>Delete</button>
                                          </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- End of Data Table for Laporan Kerusakan Jalan -->
            <!-- Edit Modal -->
            <div class="modal fade" id="editLaporanModal" tabindex="-1" role="dialog" aria-labelledby="editLaporanModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="editLaporanForm" method="post" action="update_laporan_data.php">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editLaporanModalLabel">Edit Laporan Kerusakan Jalan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id_laporan" id="id_laporan">
                                <div class="form-group">
                                    <label for="nama_pelapor">Nama Pelapor</label>
                                    <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" required>
                                </div>
                                <div class="form-group">
                                    <label for="tingkat_kerusakan">Tingkat Kerusakan</label>
                                    <input type="text" class="form-control" id="tingkat_kerusakan" name="tingkat_kerusakan" required>
                                </div>
                                <div class="form-group">
                                    <label for="catatan_laporan">Catatan Laporan</label>
                                    <input type="text" class="form-control" id="catatan_laporan" name="catatan_laporan" required>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi_laporan">Lokasi Laporan</label>
                                    <input type="text" class="form-control" id="lokasi_laporan" name="lokasi_laporan" required>
                                </div>
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude" required>
                                </div>
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude" required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_laporan">Tanggal Laporan</label>
                                    <input type="date" class="form-control" id="tgl_laporan" name="tgl_laporan" required>
                                </div>
                                <div class="form-group">
                                    <label for="status_laporan">Status Laporan</label>
                                    <input type="text" class="form-control" id="status_laporan" name="status_laporan" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <?php include('footer.php'); ?>
    </div>
    <script>
        function printTable() {
            window.print();
        }

        function editLaporan(laporan) {
            document.getElementById('id_laporan').value = laporan.id_laporan;
            document.getElementById('nama_pelapor').value = laporan.nama_pelapor;
            document.getElementById('tingkat_kerusakan').value = laporan.tingkat_kerusakan;
            document.getElementById('catatan_laporan').value = laporan.catatan_laporan;
            document.getElementById('lokasi_laporan').value = laporan.lokasi_laporan;
            document.getElementById('longitude').value = laporan.longitude;
            document.getElementById('latitude').value = laporan.latitude;
            document.getElementById('tgl_laporan').value = laporan.tgl_laporan;
            document.getElementById('status_laporan').value = laporan.status_laporan;
            $('#editLaporanModal').modal('show');
        }

        function deleteLaporan(id_laporan) {
            if (confirm('Are you sure you want to delete this data?')) {
                window.location.href = 'delete_laporan.php?id_laporan=' + id_laporan;
            }
        }
    </script>
</body>

</html>