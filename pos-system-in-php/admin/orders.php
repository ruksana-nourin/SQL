<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow shadow-sm">
        <div class="card_header">
            <h4>Orders
                <a href="pos.php" class="btn btn-primary float-end">Create New Order</a>
            </h4>
        </div>
        <div class="card-body">

            <?php alertMessege(); ?>

            <?php
            $orders = getAll('orders');
            if (!$orders) {
                echo '<h4>Something went wrong</h4>';
                return false;
            }
            if (mysqli_num_rows($orders) > 0) {
            ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Invoice No.</th>
                                <th>Customer Name</th>
                                <th>Phone</th>
                                <th>Payment Mode</th>
                                <th>Total Amount</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($orders as $order) : ?>
                                <tr>
                                    <td><?= $order['id'] ?></td>
                                    <td><?= $order['invoice_no'] ?></td>
                                    <td><?= $order['customer_name'] ?></td>
                                    <td><?= $order['customer_phone'] ?></td>
                                    <td><?= $order['payment_mode'] ?></td>
                                    <td><?= number_format($order['total_amount'], 0) ?></td>
                                    <td><?= date('d M Y, h:i A', strtotime($order['created_at'])) ?></td>
                                    <td>
                                        <a href="order-details.php?id=<?= $order['id'] ?>" class="btn btn-success btn-sm">View</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            <?php
            } else {
            ?>
                <h4 class="mb-0">No Order Found</h4>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>