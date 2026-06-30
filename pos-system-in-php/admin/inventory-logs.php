<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow shadow-sm">
        <div class="card_header">
            <h4>Inventory Logs
                <a href="inventory-log-create.php" class="btn btn-primary float-end">Add Inventory Log</a>
            </h4>
        </div>
        <div class="card-body">

            <?php alertMessege(); ?>

            <?php
            global $conn;
            $query = "SELECT inventory.*, products.name AS product_name, transaction_type.name AS transaction_type_name
                      FROM inventory
                      LEFT JOIN products ON products.id = inventory.product_id
                      LEFT JOIN transaction_type ON transaction_type.id = inventory.transaction_type_id
                      ORDER BY inventory.id DESC";
            $inventoryLogs = mysqli_query($conn, $query);

            if (!$inventoryLogs) {
                echo '<h4>Something went wrong</h4>';
                return false;
            }
            if (mysqli_num_rows($inventoryLogs) > 0) {
            ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Transaction Type</th>
                                <th>Qty</th>
                                <th>Balance</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($inventoryLogs as $log) : ?>
                                <tr>
                                    <td><?= $log['id'] ?></td>
                                    <td><?= $log['product_name'] ?? 'N/A' ?></td>
                                    <td>
                                        <?php
                                        $badgeClass = (in_array($log['transaction_type_name'], ['Purchase', 'Sales Return', 'Positive Adjustment']))
                                            ? 'bg-success' : 'bg-danger';
                                        ?>
                                        <span class="badge <?= $badgeClass ?>"><?= $log['transaction_type_name'] ?? 'N/A' ?></span>
                                    </td>
                                    <td><?= $log['qty'] ?></td>
                                    <td><?= $log['balance'] ?></td>
                                    <td><?= date('d M Y, h:i A', strtotime($log['transaction_date'])) ?></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            <?php
            } else {
            ?>
                <h4 class="mb-0">No Inventory Log Found</h4>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>