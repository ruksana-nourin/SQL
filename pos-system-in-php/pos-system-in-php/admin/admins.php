<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow shadow-sm">
        <div class="card_header">
            <h4>Admins/Staff
                <a href="admins-create.php" class="btn btn-primary float-end">Add Admin</a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertMessege(); ?>

            <?php

            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $limit = 2; // per page

            $offset = ($page - 1) * $limit;
            global $conn;
            $totalQuery = mysqli_query($conn, "SELECT COUNT(*) as total FROM admins");
            $totalResult = mysqli_fetch_assoc($totalQuery);

            $totalRecords = $totalResult['total'];
            $totalPages = ceil($totalRecords / $limit);

            $admins = mysqli_query(
                $conn,
                "SELECT * FROM admins ORDER BY id DESC LIMIT $limit OFFSET $offset"
            );
            if (!$admins) {
                echo '<h4>Something went wrong</h4>';
                return false;
            }


            if (mysqli_num_rows($admins) > 0) {
            ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Is_Ban</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php while ($adminItem = mysqli_fetch_assoc($admins)): ?>
                                <tr>
                                    <td><?= $adminItem['id'] ?></td>
                                    <td><?= $adminItem['name'] ?></td>
                                    <td><?= $adminItem['email'] ?></td>
                                    <td>
                                        <?php
                                        if ($adminItem['is_ban'] == 1) {
                                            echo '<span class="badge bg-danger">Banned</span>';
                                        } else {
                                            echo '<span class="badge bg-success">Active</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="admins-edit.php?id=<?= $adminItem['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                                        <a href="admins-delete.php?id=<?= $adminItem['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>

                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination justify-content-center">

                            <?php if ($page > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
                                </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?= $i ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($page < $totalPages): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </nav>

                
                </div>

            <?php
            } else {
            ?>
                <tr>
                    <h4 class="mb-0">No Record Found</h4>
                </tr>
            <?php
            }
            ?>
        </div>
    </div>
</div>



<?php include('includes/footer.php'); ?>