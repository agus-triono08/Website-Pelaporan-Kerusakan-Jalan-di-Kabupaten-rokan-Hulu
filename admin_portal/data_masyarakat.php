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
                <li class="breadcrumb-item active">Data Masyarakat</li>
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

            <!-- Data Table for Masyarakat -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Data Masyarakat
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = fetch_masyarakat_data();
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id_masyarakat'] . "</td>";
                                    echo "<td>" . $row['username_masyarakat'] . "</td>";
                                    echo "<td>" . $row['nik_masyarakat'] . "</td>";
                                    echo "<td>" . $row['nama_masyarakat'] . "</td>";
                                    echo "<td>" . $row['alamat_masyarakat'] . "</td>";
                                    echo "<td>" . $row['notlpn_masyarakat'] . "</td>";
                                    echo "<td>" . $row['tgl_daftar'] . "</td>";
                                    echo "<td>
                                            <button class='btn btn-primary' onclick='editMasyarakat(" . json_encode($row) . ")'>Edit</button>
                                            <button class='btn btn-danger' onclick='deleteMasyarakat(" . $row['id_masyarakat'] . ")'>Delete</button>
                                          </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End of Data Table -->
            <!-- Edit Modal -->
            <div class="modal fade" id="editMasyarakatModal" tabindex="-1" role="dialog" aria-labelledby="editMasyarakatModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="editMasyarakatForm" method="post" action="update_masyarakat_data.php">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editMasyarakatModalLabel">Edit Data Masyarakat</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id_masyarakat" id="id_masyarakat">
                                <div class="form-group">
                                    <label for="username_masyarakat">Username</label>
                                    <input type="text" class="form-control" id="username_masyarakat" name="username_masyarakat" required>
                                </div>
                                <div class="form-group">
                                    <label for="nik_masyarakat">NIK</label>
                                    <input type="text" class="form-control" id="nik_masyarakat" name="nik_masyarakat" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_masyarakat">Nama</label>
                                    <input type="text" class="form-control" id="nama_masyarakat" name="nama_masyarakat" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_masyarakat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat_masyarakat" name="alamat_masyarakat" required>
                                </div>
                                <div class="form-group">
                                    <label for="notlpn_masyarakat">No Telepon</label>
                                    <input type="text" class="form-control" id="notlpn_masyarakat" name="notlpn_masyarakat" required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_daftar">Tanggal Daftar</label>
                                    <input type="date" class="form-control" id="tgl_daftar" name="tgl_daftar" required>
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
        function editMasyarakat(masyarakat) {
            document.getElementById('id_masyarakat').value = masyarakat.id_masyarakat;
            document.getElementById('username_masyarakat').value = masyarakat.username_masyarakat;
            document.getElementById('nik_masyarakat').value = masyarakat.nik_masyarakat;
            document.getElementById('nama_masyarakat').value = masyarakat.nama_masyarakat;
            document.getElementById('alamat_masyarakat').value = masyarakat.alamat_masyarakat;
            document.getElementById('notlpn_masyarakat').value = masyarakat.notlpn_masyarakat;
            document.getElementById('tgl_daftar').value = masyarakat.tgl_daftar;
            $('#editMasyarakatModal').modal('show');
        }

        function deleteMasyarakat(id_masyarakat) {
            if (confirm('Are you sure you want to delete this data?')) {
                window.location.href = 'delete_masyarakat.php?id_masyarakat=' + id_masyarakat;
            }
        }
    </script>

</body>

</html>