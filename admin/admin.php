<?php

require '../application/config/connection.php';
require_once '../application/config/functions.php';
require '../application/controllers/admin/add-category.php';
if (isset($_POST['delete-admin'])) { // Change the condition here
    $data = ['id' => $_GET['id']];

    $query = "DELETE FROM admin WHERE id = :id"; // Ensure it deletes from the 'admin' table
    $function->delete($query, $data);
}
if (isset($_POST['edit-category'])) {
    $id = $_GET['id'];

    $data = [
        'id' => $id,
        'name' => $_POST['name']
    ];

    $query = "UPDATE category SET name = :name WHERE id = :id";
    $function->update($query, $data);
}

if (isset($_POST['add-admin'])) {
    $data = [
        'username' => $_POST['username'],
        'password' => hash("sha512", $_POST['password'])
    ];

    $query = "INSERT INTO admin (username, password) VALUES (:username, :password)";
    $function->insert($query, $data);
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Category | Admin</title>

    <!-- links -->
    <?php include 'sections/links.php'; ?>

</head>

<body class="theme-teal">
    <!-- Page Loader -->
    <?php include 'sections/page-loader.php'; ?>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <!-- Top Bar -->
    <?php include 'sections/top-bar.php'; ?>

    <!-- Left Side Bar -->
    <?php include 'sections/left-sidebar/leftsidebar.php'; ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ADMINS</h2>
            </div>

            <!-- #END# Exportable Table -->

            <!-- Exportable Table for Admin Users -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>List of Admin Users</h2>
                            <a href="#" class="header-dropdown m-r-5" data-toggle="modal" data-target="#addModal">
                                <i class="material-icons">add</i>
                            </a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        try {
                                            $query = "SELECT * FROM admin";
                                            $rows = $function->selectAll($query);
                                            foreach ($rows as $row) { ?>

                                                <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td class="text-center js-sweetalert">
                                                        <button type="button" class="btn btn-danger btn-xs waves-effect"
                                                            data-toggle="modal"
                                                            data-target="#deleteModal_<?php echo $row['id']; ?>">
                                                            <i class="material-icons" style="font-size:1.6rem;">delete</i>
                                                        </button>
                                                        <?php include 'admin-modal.php'; ?>


                                                    </td>
                                                </tr>

                                                <?php
                                            }
                                        } catch (PDOException $e) {
                                            echo "There is some problem in connection: " . $e->getMessage();
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table for Admin Users -->
        </div>
    </section>

    <!-- Add Admin Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Add Admin User</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="username" name="username" class="form-control" required>
                                <label class="form-label">Username</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" id="password" name="password" class="form-control" required>
                                <label class="form-label">Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        <button type="submit" name="add-admin" class="btn btn-info waves-effect">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- scripts -->
    <?php include 'sections/scripts.php'; ?>

</body>

</html>