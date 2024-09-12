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
                <li class="breadcrumb-item active">Data Profile Admin</li>
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
            <!-- Button to Open "Tambah Admin" Modal -->
            <button class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahAdminModal">Tambah Admin</button>

            <!-- Data Table for Admin Profiles -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Data Profile Admin
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Admin Name</th>
                                    <th>Admin Password</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = fetch_admin_profiles();
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['ID'] . "</td>";
                                    echo "<td>" . $row['Adm_Name'] . "</td>";
                                    echo "<td>" . $row['Adm_Password'] . "</td>";
                                    echo "<td><button class='btn btn-primary' onclick='editAdmin(" . json_encode($row) . ")'>Edit</button></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- End of Data Table for Admin Profiles -->

            <!-- Edit Modal -->
            <div class="modal fade" id="editAdminModal" tabindex="-1" role="dialog" aria-labelledby="editAdminModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="editAdminForm" method="post" action="update_admin_profile.php">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editAdminModalLabel">Edit Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="admin_id" id="admin_id">
                                <div class="form-group">
                                    <label for="admin_name">Admin Name</label>
                                    <input type="text" class="form-control" id="admin_name" name="admin_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="admin_password">Password</label>
                                    <input type="password" class="form-control" id="admin_password" name="admin_password" required>
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

            <!-- Tambah Admin Modal -->
            <div class="modal fade" id="tambahAdminModal" tabindex="-1" role="dialog" aria-labelledby="tambahAdminModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="tambahAdminForm" method="post" action="add_admin_profile.php">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahAdminModalLabel">Tambah Admin</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="new_admin_name">Admin Name</label>
                                    <input type="text" class="form-control" id="new_admin_name" name="new_admin_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="new_admin_password">Password</label>
                                    <input type="password" class="form-control" id="new_admin_password" name="new_admin_password" required>
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
            <!-- End of Tambah Admin Modal -->

        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <?php include('footer.php'); ?>
    </div>
    <script>
        function editAdmin(admin) {
            document.getElementById('admin_id').value = admin.ID;
            document.getElementById('admin_name').value = admin.Adm_Name;
            document.getElementById('admin_password').value = admin.Adm_Password;
            $('#editAdminModal').modal('show');
        }
    </script>
</body>

</html>