<?php

require '../application/config/connection.php';
require_once '../application/config/functions.php';
require '../application/controllers/admin/add-category.php';

if (isset($_POST['delete-category'])) {

    $data = ['id' => $_GET['id']];

    $query = "DELETE FROM category WHERE id = :id";
    $function->delete($query, $data);

    $query = "UPDATE products SET category_id = 0 WHERE category_id = :id";
    $function->update($query, $data);
}

if (isset($_POST['enable-product'])) {

    $id = $_GET['id'];

    $data = [
        'id' => $id
    ];

    $query = "UPDATE products SET product_status = 1, date_deleted = null WHERE id = :id";
    $function->update($query, $data);
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
    <style>
        .dt-buttons {
            display: none;
        }
    </style>
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
                <h2>ARCHIVES</h2>
            </div>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>List of Deleted Products</h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Date Removed</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        try {
                                            $query = "SELECT * FROM products WHERE id != 0 AND product_status = 0";
                                            $rows = $function->selectAll($query);
                                            foreach ($rows as $row) { ?>

                                                <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['date_deleted']; ?></td>
                                                    <td class="text-center js-sweetalert">

                                                        <button type="button" class="btn btn-success btn-xs waves-effect" data-toggle="modal" data-target="#enableModal_<?php echo $row['id']; ?>">
                                                            <i class="material-icons" style="font-size:1.6rem;">arrow_upward</i>
                                                        </button>

                                                        <?php include 'archive-modal.php'; ?>
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
            <!-- #END# Exportable Table -->
        </div>
    </section>



    <!-- scripts -->
    <?php include 'sections/scripts.php'; ?>

</body>

</html>