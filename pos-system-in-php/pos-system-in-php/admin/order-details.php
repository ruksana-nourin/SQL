<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow shadow-sm">
        <div class="card_header">
            <h4>Order Details
                <a href="orders.php" class="btn btn-danger float-end">Back to Orders</a>
            </h4>
        </div>
        <div class="card-body">

            <?php alertMessege(); ?>

            <?php
            $orderId = checkParamId('id');
            global $conn;

            $orderResult = getById('orders', $orderId);

            if ($orderResult['status'] != 200) {
                echo '<h4>' . $orderResult['message'] . '</h4>';
                return;
            }

            $order = $orderResult['data'];
            ?>

            <div class="row mb-4">
                <div class="col-md-6">
                    <p><strong>Order ID:</strong> <?= $order['id'] ?></p>
                    <p><strong>Invoice No.:</strong> <?= $order['invoice_no'] ?></p>
                    <p><strong>Date:</strong> <?= date('d M Y, h:i A', strtotime($order['created_at'])) ?></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Customer Name:</strong> <?= $order['customer_name'] ?></p>
                    <p><strong>Phone:</strong> <?= $order['customer_phone'] ?></p>
                    <p><strong>Payment Mode:</strong> <?= $order['payment_mode'] ?></p>
                </div>
            </div>

            <?php
            $itemsQuery = mysqli_query($conn, "SELECT * FROM order_items WHERE order_id = '" . mysqli_real_escape_string($conn, $orderId) . "'");
            ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($itemsQuery && mysqli_num_rows($itemsQuery) > 0) : ?>
                            <?php foreach ($itemsQuery as $item) : ?>
                                <tr>
                                    <td><?= $item['product_name'] ?></td>
                                    <td><?= number_format($item['price'], 0) ?></td>
                                    <td><?= $item['quantity'] ?></td>
                                    <td><?= number_format($item['price'] * $item['quantity'], 0) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4">No items found for this order</td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <td colspan="3" class="text-end fw-bold">Grand Total:</td>
                            <td class="fw-bold"><?= number_format($order['total_amount'], 0) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>